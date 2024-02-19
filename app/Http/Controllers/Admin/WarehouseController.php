<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\WarehouseRepository;

use App\Models\Warehouse;
use App\Models\WarehouseHistory;
use App\Models\WarehouseHistoryDetail;

// use App\Repositories\Manager\OrderRepository;
// use App\Models\Product\FullOrder;
// use App\Models\Product\OrderDetail; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class WarehouseController extends Controller
{
    protected $warehouse;
    protected $warehouse_history;
    protected $warehouse_history_detail;
    protected $order;
    protected $order_detail;

    public function __construct(Warehouse $warehouse, WarehouseHistory $warehouse_history, WarehouseHistoryDetail $warehouse_history_detail){
        $this->warehouse                    = new WarehouseRepository($warehouse);
        $this->warehouse_history            = new WarehouseRepository($warehouse_history);
        $this->warehouse_history_detail     = new WarehouseRepository($warehouse_history_detail);
        // $this->order            = new OrderRepository($order);
        // $this->order_detail     = new OrderRepository($order_detail); 
    } 
    public function index(){
        return view("admin.manager.warehouse");
    }
    public function get_item(){
        $data = $this->warehouse_history->get_item_all();
        return  $this->warehouse_history->send_response(201, $data, null);;
    }
    public function get_history(){
        $data_full = $this->warehouse_history->get_history_all();
        $data = [];
        foreach ($data_full as $key => $value) {
            $history_detail = $this->warehouse_history->get_history_detail($value->id);
            $data_sub = [
                "history"           => $value,
                "history_detail"    => $history_detail,
            ];
            array_push($data, $data_sub);
        }
        return  $this->warehouse_history->send_response(201, $data, null);;
    }
    public function get_ware_one($id){
        $data = $this->warehouse_history->get_ware_one($id);
        return  $this->warehouse_history->send_response(201, $data, null);;
    }
    // public function get_order_fullfil(){
    //     $data = $this->order->get_all(2);
    //     return  $this->warehouse_history->send_response(201, $data, null);;
    // }
    // public function get_order_export(){
    //     $data = $this->order->get_all(3);
    //     return  $this->warehouse_history->send_response(201, $data, null);;
    // }
    // public function get_order_shipping(){
    //     $data = $this->order->get_all(4);
    //     return  $this->warehouse_history->send_response(201, $data, null);;
    // }

    public function store(Request $request){ 
        $warehouse_data = json_decode($request->data_metadata);
        $token = $request->cookie('_token__');
        list($user_id, $token) = explode('$', $token, 2); 
        $history_id   = $this->warehouse_history->create(["admin_id" => $user_id, "history_status" => 1])->id;

        foreach ($warehouse_data as $key => $data_item) {
            $input_detail = [
                "warehouse_history_id"  => $history_id,
                "product_id"            => $data_item->item,
                "prices"                => $data_item->price,
                "quantity"              => 0 + $data_item->quantity,
            ];

            $this->warehouse_history_detail->create($input_detail);
            $warehouse_item = $this->warehouse->warehouse_get_item($data_item->item); 
            if (count($warehouse_item) > 0) {
                $this->warehouse_history->update_item($data_item->item,$warehouse_item[0]->quantity += $data_item->quantity, $warehouse_item[0]->reserve);
            }else{
                $warehouse_create = [
                    "product_id"    => $data_item->item,
                    "quantity"      => $data_item->quantity,
                    "reserve"       => 0,
                ];
                $this->warehouse->create($warehouse_create);
            }
        }
        return $request;
    }
    
}
