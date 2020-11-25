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

Route::middleware('auth:api')->get('/ordermodule', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['jwt']], function() {
    Route::post('checkout', 'Api\OrderApiController@checkout');   
    Route::get('orders', 'Api\OrderApiController@orders'); 
    Route::get('singleOrder/{id}', 'Api\OrderApiController@singleOrder');   
});
Route::post('cart','Api\CartController@checkCart');