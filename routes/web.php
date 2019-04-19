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
Route::group(['prefix' => 'basket'], function() {
    Route::get('/', 'BasketController@index')->name('basket');
    Route::post('/add', 'BasketController@add')->name('basket.add');
    Route::delete('/delete/{rowId}', 'BasketController@delete')->name('basket.delete');
    Route::delete('/clear', 'BasketController@clear')->name('basket.clear');
});
Route::get('/payment', 'PaymentController@index')->name('payment');
Route::post('/payment', 'PaymentController@pay')->name('pay');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/orders', 'OrdersController@index')->name('orders');
    Route::get('/orders/{id}', 'OrdersController@detail')->name('order');
});
Route::group(['prefix' => 'user'], function() {
    Route::get('/signin', 'UserController@signin_form')->name('user.signin');
    Route::post('/signin', 'UserController@signin');
    Route::get('/signup', 'UserController@signup_form')->name('user.signup');
    Route::post('/signup', 'UserController@signup');
    Route::post('/logout', 'UserController@logout')->name('user.logout');
    Route::get('/active/{key}', 'UserController@active')->name('active');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
   Route::get('/', function () {
     return "Admin";
   });
   Route::get('/signin', 'UserController@signin')->name('admin.signin');
});

