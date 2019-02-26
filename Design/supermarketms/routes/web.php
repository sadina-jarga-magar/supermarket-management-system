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

Route::get('/welcome', 'ProductController@openhome');
Route::get('/product', 'ProductController@openproduct');
Route::get('/cart', 'ProductController@opencart');
Route::get('/about', 'ProductController@openabout');
Route::get('/contact', 'ProductController@opencontact');
Route::get('/help', 'ProductController@openhelp');
Route::get('/login', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
