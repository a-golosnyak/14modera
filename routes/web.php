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

Route::get('/', 			'CategoryController@getValues');
Route::get('/set', 			'CategoryController@setValues');
Route::get('/clear', 		'CategoryController@clearDb');
Route::post('/get', 		'CategoryController@getSubvalues');
Route::post('/load', 		'CategoryController@loadValues');