<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BlogRepository;
use App\Models\Blog;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class BlogController extends Controller
{
    protected $blog; 

    public function __construct(Blog $blog ){
        $this->blog             = new BlogRepository($blog);  
    }
    public function index(){
        return view("admin.manager.blog");
    }

    public function get(){
        $data = $this->blog->get_all();
        return $this->blog->send_response(201, $data, null);
    }

    public function get_one($id){
        $data = $this->blog->get_one($id);
        return $this->blog->send_response(200, $data, null);
    }
 
    public function store(Request $request){ 
        $data = [  
            "title"          => $request->data_name, 
            "slug"          => $this->blog->to_slug($request->data_name),  
            "detail"   => $request->data_description,  
            "status"   => 1,  
        ];
        if ($request->data_image != "null") {
            $data["banner"] = $this->blog->imageInventor('images', $request->data_image, 500);
        }
        $data_create = $this->blog->create($data); 
        return $this->blog->send_response("Create successful", $data_create, 201);
    }

    public function update(Request $request){  
        $data = [ 
            "name"          => $request->data_name,  
            "description"   => $request->data_description, 
        ]; 
        if ($request->data_image != "null") {
            $data["image"] = $this->blog->imageInventor('images', $request->data_image, 500);
        }
        $data_update = $this->blog->update($data, $request->data_id);
        return $this->blog->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->blog->delete($id); 
        return $this->blog->send_response(200, "Delete successful", null);
    } 
}
