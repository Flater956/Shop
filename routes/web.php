<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'MainController@index')->name('index');

Route::get('/category/{category_id}', 'MainController@category')->name('category');

Route::get('/contact', 'MainController@contact')->name('contact');

Route::get('/about', 'MainController@about')->name('about');


Route::get('/basket', 'BasketController@basket')->name('basket');

Route::get('/basket/order', 'BasketController@order')->name('basket-order');

Route::post('/basket/confirm', 'BasketController@confirm')->name('basket-confirm');

Route::post('/basket/add/{product_id}', 'BasketController@basketAdd')->name('basket-add');

Route::post('/basket/remove/{product_id}', 'BasketController@basketRemove')->name('basket-remove');


Route::get('categories/{category}/{product_id}', 'MainController@product')->name('product');


Auth::routes();

Route::group([
    'middleware'=>['is_admin'],
    'prefix'=>'admin'
    ],function (){
    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::get('/order/{orderId}', 'Admin\HomeController@order')->name('order.show');
    Route::resource('categories','Admin\CategoryController');
    Route::resource('products','Admin\ProductController');
});
Route::group([
    'middleware'=>['auth','currentuser'],
],function (){
    Route::get('/order/{userId}','User\OrderController@index')->name('user.orders');
});




