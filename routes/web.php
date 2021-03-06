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

// Route::get('/', function () {
//     return view('welcome');
// });






// Route::get('/{locale}', function ($locale) {
//     App::setLocale($locale);
//     return view('home');
//     //
// });  


// Route::get('/sample', function () {
//     return view('layouts.app');
// });



// Route::get('/', function () {
//     return view('home');
// });

Route::get('/','HomeController@index');
Route::get('/about','AboutController@index');
Route::get('/contact','ContactController@index');

Route::get('/product/{product}','HomeController@productDetails');
Route::post('/product/ratings', 'ProductController@store');

Route::post('/product/submitRating','HomeController@submitRating');

// cart items
Route::post('/add-to-cart','CartController@addToCart');
Route::get('/mycart','CartController@myCart');
Route::post('/update-cart','CartController@updateCart');

Route::any('/cartItemDelete/{temp_order_row_id}','CartController@cartItemDelete');
Route::any('/cartItemDeleteAll','CartController@cartItemDeleteAll');

// Checkout
Route::get('/checkoutPage','CartController@checkOut');
Route::get('/confirm-order','CartController@confirmOrder');


Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {           
    Route::get('/admin', 'LoginController@login');
    Route::post('/postAdminLogin', 'LoginController@postAdminLogin'); 
    Route::get('/admin/logout', 'LoginController@logout');        
    Route::get('/admin/dashboard', 'DashboardController@index');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
