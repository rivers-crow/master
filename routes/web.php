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

//Route::get('index','IndexController@index');
//Route::post('upload','IndexController@upload');
//::get('getphoto','IndexController@getphoto');

Route::group(['namespace'=>'Home'],function(){
    //登录注册
    Route::get('login','LoginController@login');
    Route::post('dologin','LoginController@dologin');
    Route::get('register','LoginController@register');
    Route::post('registeradd','LoginController@registeradd');
    Route::get('check','LoginController@check');
    //用户模块
    //主页模块
    Route::group(['middleware'=>'auth.login'],function(){
        Route::get('index','IndexController@index');
        Route::post('upload','IndexController@upload');
        Route::get('logout','LoginController@logout');
    });


});

