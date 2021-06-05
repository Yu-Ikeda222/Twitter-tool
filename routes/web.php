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

//Top
Route::get('/' ,'TopController@index')->name('index');

//Twitter
Route::get('/show_twitter' ,'TwitterController@show')->name('twitter.show');
Route::post('/store_twitter','TwitterController@store')->name('twitter.store');
Route::get('/check','TwitterController@check')->name('check');
Route::get('/reverse','TwitterController@reverse')->name('reverse');





