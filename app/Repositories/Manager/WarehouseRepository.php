<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class WarehouseRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function get_item_all(){
        $sql = "SELECT warehouse.*, 
                    product.name, 
                    product.prices
                FROM warehouse
                LEFT JOIN product
                ON product.id = warehouse.product_id;";
        return DB::select($sql);
    }
    public function get_history_all(){
        $sql_getall =   "SELECT warehouse_history.id, 
                                warehouse_history.history_status, 
                                admin.email, 
                                sum(quantity) as quantities, 
                                sum(prices) as prices, 
                                warehouse_history.created_at
                            FROM warehouse_history_detail
                            LEFT JOIN warehouse_history
                            ON warehouse_history.id = warehouse_history_detail.warehouse_history_id
                            LEFT JOIN admin
                            ON admin.id = warehouse_history.admin_id
                            GROUP BY warehouse_history_detail.warehouse_history_id, 
                                    warehouse_history.id, 
                                    warehouse_history.history_status, 
                                    admin.email, 
                                    warehouse_history.created_at
                            ORDER BY warehouse_history.created_at DESC";
        return DB::select($sql_getall);
    }
    public function get_ware_one($id){
        $sql = "SELECT warehouse_history_detail.* , product.name, product.images
                    FROM warehouse_history_detail 
                    LEFT JOIN product
                    ON product.id = warehouse_history_detail.product_id
                    WHERE warehouse_history_id = ".$id;
        return DB::select($sql);

    }

    public function get_history_detail($id){
        $sql_getall =   "SELECT *
                            FROM warehouse_history_detail
                            WHERE warehouse_history_id = ".$id;
        return DB::select($sql_getall);
    }

    public function warehouse_get_item($item_id){
        $sql_checkitem = "SELECT * FROM warehouse WHERE product_id = ".$item_id;
        return DB::select($sql_checkitem);
    }

    public function update_item($item_id, $quantity, $reserve){
        $sql_checkitem = "UPDATE warehouse
                            SET quantity =".$quantity." ,  reserve =".$reserve." 
                            WHERE product_id = ".$item_id;
        DB::select($sql_checkitem);
    }


}
