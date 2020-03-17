<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','WebsiteControllerController@index');
Route::get('/home','WebsiteControllerController@index');
Route::get('/{catID}/show','WebsiteControllerController@show');

Auth::routes();


Route::get('/admin', 'HomeController@welcome');
Route::get('admin/home', 'HomeController@index');
Route::get('admin/{catID}/show', 'HomeController@show');
Route::get('admin/{catID}/{postID}/show', 'HomeController@PostShow');
Route::get('admin/{postID}/delete', 'HomeController@destory');



