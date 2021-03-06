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

Route::middleware('auth:admin')->prefix('dashboard')->group(function() {
    Route::resource('category', 'CategoryController');
    Route::resource('products', 'ProductModuleController');
    Route::resource('offers', 'OfferModuleController');
    Route::resource('comments', 'CommentController');
});