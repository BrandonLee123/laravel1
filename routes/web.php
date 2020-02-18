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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/products', 'ProductsController@index')->name('Products');
Route::get('/products/{id}','ProductsController@show')->name('products.show');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{id}','UsersController@showProfile')->name('profile');
Route::get('/profile/edit/{id}','UsersController@editProfile')->name('profile.edit');
Route::post('/profile/save/{id}','UsersController@saveProfile')->name('profile.save');

Route::get('/error', 'ErrorController@index')->name('errorpage');
Route::get('/update/{id}','ProductsController@update')->name('products.update');





Route::get('/dltproduct/{id}','ProductsController@delete')->name('products.delete');
Route::get('/addproduct','ProductsController@add')->name('products.add');
Route::group(['middleware'=>'isAdmin'],function(){
Route::get('/admin/product/edit/{id}','AdminProductsController@edit')->name('admin.products.edit');
Route::post('/admin/product/save/{id}','AdminProductsController@save')->name('admin.products.save');
Route::get('/admin/product/delete/{id}','AdminProductsController@delete')->name('admin.products.delete');
Route::get('/admin/products','AdminProductsController@index')->name('admin.products');
Route::get('/admin/ordersstatus','AdminOrdersController@show')->name('admin.ordersstatus');
Route::post('/admin/updatestatus','AdminOrdersController@update')->name('admin.update');
});

Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/checkout','OrdersController@index')->name('checkout');
    Route::post('/payment','OrdersController@addOrder')->name('payment');
});
Route::get('/blank','CartController@show')->name('blank');
Route::get('/shoppingcart','CartController@show')->name('cartitem');
Route::post('/shoppingcart/update','CartController@update')->name('cartitem.update');
Route::post('/addtocart/{id}','CartController@addCart')->name('addcart');
Route::get('/deleteitem/{id}','CartController@deleteItem')->name('deleteitem');


Route::post('/search','ProductsController@search')->name('search');