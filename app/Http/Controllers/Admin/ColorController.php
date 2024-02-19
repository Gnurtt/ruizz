<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ColorRepository;
use App\Models\Color;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ColorController extends Controller
{
    protected $color; 

    public function __construct(Color $color ){
        $this->color             = new ColorRepository($color);  
    }
    public function index(){
        return view("admin.manager.color");
    }

    public function get(){
        $data = $this->color->get_all();
        return $this->color->send_response(201, $data, null);
    }

    public function get_one($id){
        $data = $this->color->get_one($id);
        return $this->color->send_response(200, $data, null);
    }
 
    public function store(Request $request){ 
        $data = [  
            "name"          => $request->data_name,  
            "hex"          => $request->data_color,   
        ];
        $data_create = $this->color->create($data); 
        return $this->color->send_response("Create successful", $data_create, 201);
    }

    public function update(Request $request){  
        $data = [ 
            "name"          => $request->data_name,  
            "hex"          => $request->data_color,  
        ]; 
        $data_update = $this->color->update($data, $request->data_id);
        return $this->color->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->color->delete($id); 
        return $this->color->send_response(200, "Delete successful", null);
    } 
}
