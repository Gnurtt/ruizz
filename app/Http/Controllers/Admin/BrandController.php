<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BrandRepository;
use App\Models\Brand;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class BrandController extends Controller
{
    protected $brand; 

    public function __construct(Brand $brand ){
        $this->brand             = new BrandRepository($brand);  
    }
    public function index(){
        return view("admin.manager.brand");
    }

    public function get(){
        $data = $this->brand->get_all();
        return $this->brand->send_response(201, $data, null);
    }

    public function get_one($id){
        $data = $this->brand->get_one($id);
        return $this->brand->send_response(200, $data, null);
    }
 
    public function store(Request $request){ 
        $data = [  
            "name"          => $request->data_name,  
            "description"   => $request->data_description,  
        ];
        if ($request->data_image != "null") {
            $data["image"] = $this->brand->imageInventor('images', $request->data_image, 500);
        }
        $data_create = $this->brand->create($data); 
        return $this->brand->send_response("Create successful", $data_create, 201);
    }

    public function update(Request $request){  
        $data = [ 
            "name"          => $request->data_name,  
            "description"   => $request->data_description, 
        ]; 
        if ($request->data_image != "null") {
            $data["image"] = $this->brand->imageInventor('images', $request->data_image, 500);
        }
        $data_update = $this->brand->update($data, $request->data_id);
        return $this->brand->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->brand->delete($id); 
        return $this->brand->send_response(200, "Delete successful", null);
    } 
}
