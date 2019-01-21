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


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');



Route::get('/products/limit/{instock}', 'ProductsController@index');
Route::get('/checkout', 'ProductsController@checkout');

Route::get('/cart', 'ProductsController@cart');
Route::get('/add-to-cart/{id}', 'ProductsController@addToCart');
Route::patch('/update-cart', 'ProductsController@updateCart');
Route::delete('/remove-from-cart', 'ProductsController@removeFromCart');

Route::resource('products', 'ProductsController')->except(['create', 'store', 'destroy']);


Route::view('/thankyou', 'thankyou');

return view('pages.cart');