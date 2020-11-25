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

Route::prefix('configmodule')->group(function() {
    Route::get('/', 'ConfigModuleController@index');
   
});

Route::middleware('auth:admin')->prefix('dashboard')->group(function() {
    Route::resource('slider', 'SliderController');
    Route::resource('sliderTmour', 'SliderTmourController');
    Route::resource('config', 'ConfigModuleController');
    Route::resource('review', 'ReviewController');
    Route::resource('text', 'TextController');
    Route::resource('city', 'CityController');
    Route::resource('zone', 'ZoneController');
});


