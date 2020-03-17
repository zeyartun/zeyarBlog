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

Auth::routes();


Route::get('/admin', 'HomeController@welcome');

Route::get('admin/home', 'HomeController@index')->name('home');