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

// 路由: 后台首页
Route::get('admin','Admin\IndexController@index');

//路由： 后台分类
Route::resource('admin/cates','Admin\CatesController');

//路由：后台商品
Route::resource('admin/goods','Admin\GoodsController');

//路由：后台商品图片管理
Route::resource('admin/goodsimg','Admin\GoodsimgController');

//路由：后台秒杀商品管理
Route::resource('admin/miao','Admin\MiaoController');

//路由：后台活动管理
Route::resource('admin/dong','Admin\HuodongController');
