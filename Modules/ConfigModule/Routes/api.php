<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('about','Api\ConfigApiController@getAbout');
Route::get('contact','Api\ConfigApiController@contact');
Route::get('slider/{type}','Api\ConfigApiController@slider');
Route::get('maintext','Api\ConfigApiController@maintext');
Route::post('reviewApp','Api\ConfigApiController@reviewApp');
Route::get('allReviews','Api\ConfigApiController@allReviews');
Route::get('config/{key}','Api\ConfigApiController@getPolicy');

