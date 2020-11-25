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
Route::get('login','UserModuleController@showLogin')->name('login');
Route::post('login','UserModuleController@doLogin')->name('doLogin');
Route::get('logout','UserModuleController@logout')->middleware('auth')->name('logout');