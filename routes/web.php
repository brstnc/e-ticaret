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

Route::post('/search', 'ProductController@search')->name('search');
Route::get('/search', 'ProductController@search')->name('search');


Route::get('/basket', 'BasketController@index')->name('basket');

Route::get('/payment', 'PaymentController@index')->name('payment');

Route::get('/orders', 'OrdersController@index')->name('orders');

Route::get('/orders/{id}', 'OrdersController@detail')->name('order');

Route::group(['prefix' => 'user'], function() {

    Route::get('/signin', 'UserController@signin_form')->name('user.signin');
    Route::post('/signin', 'UserController@signin');

    Route::get('/signup', 'UserController@signup_form')->name('user.signup');
    Route::post('/signup', 'UserController@signup');

    Route::get('/active/{key}', 'UserController@active')->name('active');

});



