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

Route::prefix('ordermodule')->group(function() {
    Route::get('/', 'OrderModuleController@index');
});
Route::middleware('auth:admin')->prefix('dashboard')->group(function() {
    Route::resource('coupon', 'CouponController');
    Route::resource('orders', 'OrderModuleController');
    Route::resource('order_status','OrderStatusController');
    Route::post('update_order_status','OrderModuleController@updateOrderStatus');

    Route::get('print/{id}','OrderModuleController@print')->name('print');
 
});