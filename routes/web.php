<?php

require 'admin.php';

use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
header('Access-Control-Allow-Headers: Accept, Content-Type, X-Auth-Token, Origin, Authorization');

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');

Route::get('/product/{slug}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');

Route::post('/product/add/cart', 'App\Http\Controllers\Site\ProductController@addToCart')->name('product.add.cart');

Route::get('/cart', 'App\Http\Controllers\Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'App\Http\Controllers\Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'App\Http\Controllers\Site\CartController@clearCart')->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'App\Http\Controllers\Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'App\Http\Controllers\Site\CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('checkout/payment/complete', 'App\Http\Controllers\Site\CheckoutController@complete')->name('checkout.payment.complete');
    Route::get('account/orders', 'App\Http\Controllers\Site\AccountController@getOrders')->name('account.orders');
});
