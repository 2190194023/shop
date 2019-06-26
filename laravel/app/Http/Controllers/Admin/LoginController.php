<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash; 

class LoginController extends Controller
{
    // 显示登录页面
    public function login()
    {
    	// 加载登录页面
    	return view('admin.login');
    }

    // 执行登录
    public function dologin(Request $request)
    {
    	$uname = $request->input('uname','');
    	$password = $request->input('password','');

    	$admin_user_data = DB::table('admin_users')->where('uname',$uname)->first();

        if (!$admin_user_data) {
            return back()->with('error','用户名或密码错误');
        }

        // 验证密码
        if (!Hash::check($password, $admin_user_data->password)) {
             return back()->with('error','用户名或密码错误');
        }

        // 执行登录
        session(['admin_login'=>true]);
        session(['admin_user'=>$admin_user_data]);

        // 跳转
        return redirect('admin');
    }
    
    // 退出
    public function outlogin()
    {
        session(['admin_login'=>false]);
        session(['admin_user'=>null]);

        return redirect('admin/login');
    }
}
