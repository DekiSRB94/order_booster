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
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');
Route::post('/post-client', 'HomeController@postClient');

Route::get('/live_search/action', 'HomeController@mySearch')->name('live_search.action');

Route::get('/klijenti', 'ClientController@show_client');


