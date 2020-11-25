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
//category
Route::get('categories','Api\CategoryApiController@getCategories');
Route::get('category/{id}/products','Api\CategoryApiController@getCategoryProducts');

//product
Route::get('product/{id}','Api\ProductApiController@find');
Route::get('recently_added','Api\ProductApiController@recentlyAdded');
Route::get('most_paid','Api\ProductApiController@mostPaid');
Route::post('filter','Api\ProductApiController@filter');
Route::post('comment','Api\ProductApiController@comment');


//offers
Route::get('offers','Api\OfferApiController@getOffers');
Route::get('offer/{id}','Api\OfferApiController@offer');
Route::get('coupon/{code}','Api\ProductApiController@checkCoupon');