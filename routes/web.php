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

/**
 * api
 */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function ($api){
    /**
     * admin-api
     */
    $api->group(['namespace'=>'App\Http\Controllers\Admin','prefix'=>'admin'],function ($api){
        $api->post('/login','AuthController@login');
    });
});
$api->version('v2',function ($api){

});