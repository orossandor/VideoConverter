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

Route::get('/','IndexController@index');
Route::post('/video/upload','VideoUploadController@index');
Route::get('/video','VideoController@creatlink');
Route::get('/video/{quality}/{id}','VideoController@showvideo')->middleware('APIkey');

Route::delete('/video', 'DeleteVideo@delete');
Route::post('/video/upload','VideoUploadController@upload');
