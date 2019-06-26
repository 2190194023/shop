<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// 路由: 后台登录
Route::get('admin/login','Admin\LoginController@login');
// 路由: 执行后台登录
Route::post('admin/dologin','Admin\LoginController@dologin');
// 路由: 后台退出
Route::get('admin/outlogin','Admin\LoginController@outlogin');

Route::group(['middleware'=>'login'],function(){

	// 路由: 后台首页
	Route::get('admin','Admin\IndexController@index');

	//路由: 后台修改头像
	Route::get('admin/profile','Admin\LoginController@profile');
	Route::post('admin/upload','Admin\LoginController@upload');

	// 路由: 后台管理员用户
	Route::resource('admin/adminuser','Admin\AdminuserController');

	// 路由: 后台用户
	Route::resource('admin/users','Admin\UsersController');

	// 路由: 后台角色
	Route::resource('admin/roles','Admin\RolesController');

	// 路由: 后台权限
	Route::resource('admin/nodes','Admin\NodesController');

	
});







