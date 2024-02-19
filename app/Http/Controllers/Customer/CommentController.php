<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\CommentRepository;
use App\Models\Comment;
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(Comment $comment){
        $this->comment             = new CommentRepository($comment);
    }

    public function get($id){
        $data = $this->comment->get_all($id);
        return $this->comment->send_response(200, $data, null);
    }
    public function create(Request $request){
        list($user_id, $token) = static::unpack_token($request); 
        $data = [
            "customer_id"   => $user_id,
            "product_id"    => $request->data_product,
            "rating"        => $request->data_rate,
            "comment"       => $request->data_comment,
        ];
        return($this->comment->create($data));
        return $this->comment->send_response(200, null, null);
    }
    public function get_rate($id){
        $data = $this->comment->get_rate($id);
        return $this->comment->send_response(200, $data, null);
    }

    // Kiểm tra token hợp lệ
    public function check_token(Request $request){
        $token = $request->cookie('_token_');
        list($user_id, $token) = explode('$', $token, 2); 
        $user = $this->customer->get_secret($user_id);
        if ($user) {
            return Hash::check($user_id . '$' . $user[0]->secret_key, $token);
        }else{
            return false;
        }
    }

    // Tách token
    public function unpack_token(Request $request){
        $token = $request->cookie('_token_');
        return explode('$', $token, 2); 
    }

}
