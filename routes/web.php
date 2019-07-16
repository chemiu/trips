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

Route::get('/','MainController@index');
Route::get('/main','MainController@index');

Route::post('/main/checklogin','MainController@checklogin');
Route::get('main/logout','MainController@logout');

Route::get('main/trips','MainController@trips');
Route::post('/main/newTrip','MainController@newTrip');
Route::post('/cancelTrip','AjaxController@cancelTrip');


