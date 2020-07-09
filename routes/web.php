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

Auth::routes();

/*
|--------------------------------------------------------------------------
| User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/',function(){ return redirect('/home'); });

/*
|--------------------------------------------------------------------------
| User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

/*
|--------------------------------------------------------------------------
| Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function(){ return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

/*
|---------------------------------------------------------------------------
| Admin ログイン後
|---------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'],function() {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('diary/create', 'User\PostController@add')->middleware('auth');
    Route::post('diary/create','User\PostController@create')->middleware('auth');
    Route::get('diary','User\PostController@index')->middleware('auth');
    Route::get('diary/edit', 'User\PostController@edit')->middleware('auth');
    Route::post('diary/edit','User\PostController@update')->middleware('auth');
    Route::get('diary/delete','User\PostController@delete')->middleware('auth');
});
