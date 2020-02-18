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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    
    'prefix'=>'auth'
],function($router){
Route::post('login','Api\AuthController@login');
Route::post('logout', 'Api\AuthController@logout');
Route::post('refresh', 'Api\AuthController@refresh');
Route::get('me', 'Api\AuthController@me');
});
Route::get('products','Api\ProductsController@index');
Route::get('shoppingcart','Api\CartController@show');
Route::post('addcart/{id}','Api\CartController@addCart');
Route::get('orders','Api\OrdersController@index');
Route::get('adminProducts','Api\AdminProductsController@index');
Route::get('adminOrders','Api\AdminOrdersController@show');
Route::get('deleteitem/{id}','Api\CartController@deleteItem');
