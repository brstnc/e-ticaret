<?php

/*
 --------------------------------------------------------------------------
 Web Routes
 --------------------------------------------------------------------------

  Here is where you can register web routes for your application. These
  routes are loaded by the RouteServiceProvider within a group which
  contains the "web" middleware group. Now create something great!

*/

Route::get('/', 'HomePageController@index')->name('homepage');

Route::get('/category/{slug_category_name}', 'CategoryController@index')->name('category');

Route::get('/product/{slug_product_name}', 'ProductController@index')->name('product');

Route::get('/basket', 'BasketController@index')->name('basket');

Route::get('/payment', 'PaymentController@index')->name('payment');

Route::get('/orders', 'OrdersController@index')->name('orders');

Route::get('/orders/{id}', 'OrdersController@detail')->name('order');

Route::group(['prefix' => 'user'], function() {
    Route::get('/signin', 'UserController@signin')->name('user.signin');
    Route::get('/signup', 'UserController@signup')->name('user.signup');
});



