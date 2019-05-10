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

Route::get('/products/{product}','HomeController@show');
Route::post('/product/ratings', 'ProductController@store');

Route::get('/products/submitRating','HomeController@submitRating');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
