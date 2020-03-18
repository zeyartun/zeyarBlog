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
Route::get('/{postID}/PostShow', 'WebsiteControllerController@PostShow');

Auth::routes();

Route::get('/admin', 'HomeController@welcome');
Route::get('admin/home', 'HomeController@index');
Route::get('admin/{catID}/show', 'HomeController@show');
Route::get('admin/{postID}/PostShow', 'HomeController@PostShow');
Route::get('admin/{postID}/delete', 'HomeController@destory');
Route::get('/admin/{postID}/edit','HomeController@editPost');
Route::get('/admin/category/categoryEdit','HomeController@editCategory');

Route::get('/admin/post/new','HomeController@newPost');
Route::post('/admin/NewPost/','HomeController@PostNew');


