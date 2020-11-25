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
Route::post('register', 'UserApiController@register');
Route::post('login', 'UserApiController@authenticate');
Route::post('activate', 'UserApiController@activationCode');

Route::group(['middleware' => ['jwt']], function() {
    Route::get('user', 'UserApiController@getAuthenticatedUser');
    Route::post('editProfile', 'UserApiController@editProfile');
    Route::post('addAddress', 'UserApiController@addAdress');
    Route::post('addFavouriteAdress', 'UserApiController@addFavouriteAdress');
    Route::get('FavouriteAdress', 'UserApiController@FavouriteAdress');
    Route::get('addresses', 'UserApiController@addresses');
    Route::post('editAddress/{id}', 'UserApiController@editAddress');
    Route::get('deleteAddress/{id}', 'UserApiController@deleteAddress');
    Route::post('product_notification','UserApiController@productNotification');
    Route::get('notifications','UserApiController@getAllNotifications');
    
});

