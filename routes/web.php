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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/orders', 'OrdersController@index')->name('orders');
    Route::get('/orders/{id}', 'OrdersController@detail')->name('order');
    Route::get('/payment', 'PaymentController@index')->name('payment');
    Route::post('/payment', 'PaymentController@pay')->name('pay');
    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::get('/update/{id}', 'ProfileController@form')->name('profile.update');
    Route::post('/save/{id}', 'ProfileController@save')->name('profile.save');
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
   Route::redirect('/', 'admin/signin');
   Route::match(['get','post'],'/signin', 'AuthController@signin')->name('admin.signin');
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/homepage', 'HomePageController@index')->name('admin.homepage');

        Route::group(['prefix' => 'user'], function () {
            Route::match(['get', 'post'], '/', 'UserController@index')->name('admin.user');
            Route::get('/update/{id}', 'UserController@form')->name('admin.user.update');
            Route::post('/save/{id}', 'UserController@save')->name('admin.user.save');
            Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
        });
        Route::group(['prefix' => 'category'], function () {
            Route::match(['get', 'post'], '/', 'CategoryController@index')->name('admin.category');
            Route::get('/new', 'CategoryController@form')->name('admin.category.new');
            Route::get('/update/{id}', 'CategoryController@form')->name('admin.category.update');
            Route::post('/save/{id?}', 'CategoryController@save')->name('admin.category.save');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::match(['get', 'post'], '/', 'ProductController@index')->name('admin.product');
            Route::get('/new', 'ProductController@form')->name('admin.product.new');
            Route::get('/update/{id}', 'ProductController@form')->name('admin.product.update');
            Route::post('/save/{id?}', 'ProductController@save')->name('admin.product.save');
            Route::get('/delete/{id}', 'ProductController@delete')->name('admin.product.delete');
        });
        Route::group(['prefix' => 'order'], function () {
            Route::match(['get', 'post'], '/', 'OrderController@index')->name('admin.order');
            Route::get('/new', 'OrderController@form')->name('admin.order.new');
            Route::get('/update/{id}', 'OrderController@form')->name('admin.order.update');
            Route::post('/save/{id}', 'OrderController@save')->name('admin.order.save');
            Route::get('/delete/{id}', 'OrderController@delete')->name('admin.order.delete');
        });
    });
});

