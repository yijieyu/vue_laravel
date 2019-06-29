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
    return view('admin/index');
});

/**
 * api
 */
$api = app('Dingo\Api\Routing\Router');

Route::get('/admin/login', function () {
    return view('admin/index');
});

$api->version('v1',function ($api){
    /**
     * admin-api
     */
    $api->group(['namespace'=>'App\Http\Controllers\Admin','prefix'=>'admin'],function ($api){
        $api->post('/login','AuthController@login');
    });
    $api->group(['namespace' => 'App\Http\Controllers\Admin','prefix'=>'admin'/*,'middleware' => 'jwt.auth'*/],function ($api){
        //【菜单】列表
        $api->get('/menu-list','MenuController@getMenuList');
        //【系统用户】列表
        $api->get('/system/user-list','SystemUserController@listByPage');
        //【系统用户】获取一个用户
        $api->get('/system/get-user','SystemUserController@getOneUser');
        //【系统用户】修改
        $api->post('/system/save-user','SystemUserController@saveUser');
        //【系统用户】创建
        $api->post('/system/add-user','SystemUserController@create');
        $api->get('/me','AuthController@me');
    });
});
$api->version('v2',function ($api){

});