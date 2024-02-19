<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\AdminRepository;
use App\Models\Admin;
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class AuthController extends Controller
{
    protected $admin;

    public function __construct(Admin $admin){
        $this->admin        = new AdminRepository($admin);
    }

    public function login(Request $request){
        $admin_id     = $this->admin->checkEmailPassword($request);
        if ($admin_id) {
            $name_cookie = Cookie::queue('_token__', $this->admin->createTokenClient($admin_id), 2628000);
            return redirect()->back()->with('success', 'Đăng nhập thành công');  
        }else{
            return redirect()->back()->with('error', 'Tên tài khoản hoặc mật khẩu không chính xác'); 
        }

    }
    public function register(){
        // Contact to update Function
    }
    public function logout(){
        Cookie::queue(Cookie::forget('_token__'));
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');  
    }
}
