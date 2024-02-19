<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Manager\ProductRepository; 
use App\Models\Product;
use App\Repositories\Manager\BlogRepository;
use App\Models\Blog;  
use Session;
use Hash;
use DB;  

class DisplayController extends Controller
{
    protected $product; 
    protected $blog; 

    public function __construct(Product $product, Blog $blog ){
        $this->product    = new ProductRepository($product); 
        $this->blog       = new BlogRepository($blog);  
    }

    public function index(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.index', compact("customer_data"));
    }
    public function about(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.about', compact("customer_data"));
    }
    public function product(Request $request, $slug){
        $customer_data = static::generate_logined($request); 
        $data = $this->product->get_one_slug($slug);
        $comment = $this->product->can_comment($customer_data, $data->id);
        
        $color = $this->product->get_color($data->id);
        $data_response = [
            "data" => $data,
            "color" => $color,
            "comment" => $comment
        ];
        return view('customer.product', compact("data_response", "customer_data"));
    }
    public function category(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.category', compact("customer_data"));
    }
    public function cart(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.cart', compact("customer_data"));
    }
    public function checkout(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.checkout', compact("customer_data"));
    }
    public function order_success(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.order-success', compact("customer_data"));
    }
    public function login(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.login', compact("customer_data"));
    }
    public function register(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.register', compact("customer_data"));
    }
    public function forgot(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.forgot', compact("customer_data"));
    }
    public function reset(Request $request){
        $customer_data = static::generate_logined($request); 
        return view('customer.reset', compact("customer_data"));
    }
    public function profile(Request $request){
        $customer_data = static::generate_logined($request);    
        return view("customer.profile", compact("customer_data"));
    }
    public function contact(Request $request){
        $customer_data = static::generate_logined($request);    
        return view("customer.contact", compact("customer_data"));
    }
    public function blog(Request $request){
        $customer_data = static::generate_logined($request);    
        return view("customer.blog", compact("customer_data"));
    }
    public function blog_detail(Request $request, $slug){
        $customer_data = static::generate_logined($request);    
        $data = $this->blog->get_one($slug); 
        return view("customer.blog-detail", compact("customer_data", "data"));
    }

    

    // Generate user detail
    public function generate_logined($request){
        $user_login = [
            'id'        => null,
            'email'     => null,
            'name'      => null,
            'phone'     => null,
            'avatar'    => null,
            'address'   => null,
            'is_login'  => false
        ];
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $request->cookie('_token_'), 2);
            $sql_getAuth    = 'SELECT   customer_auth.id,
                                        customer_auth.view_type,
                                        customer_auth.email,
                                        customer_detail.username,
                                        customer_detail.telephone,
                                        customer_detail.avatar,
                                        customer_detail.identity,
                                        customer_detail.address
                                FROM customer_auth 
                                LEFT JOIN customer_detail
                                ON customer_auth.id = customer_detail.customer_auth_id
                                WHERE customer_auth.id = "'.$user_id.'"';
            $hasAuth    = DB::select($sql_getAuth);
            if (count($hasAuth) != 0) {
                $user_login['id']           = $hasAuth[0]->id;
                $user_login['view_type']    = $hasAuth[0]->view_type;
                $user_login['email']        = $hasAuth[0]->email;
                $user_login['name']         = $hasAuth[0]->username;
                $user_login['avatar']       = $hasAuth[0]->avatar;
                $user_login['phone']        = $hasAuth[0]->telephone;
                $user_login['identity']     = $hasAuth[0]->identity;
                $user_login['address']      = $hasAuth[0]->address;
                $user_login['is_login']     = true;
            }
        }
        return $user_login;
    }
}
