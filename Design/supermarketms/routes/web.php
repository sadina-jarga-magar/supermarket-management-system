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
Route::get('/product', function(){
    return view('product');
});//->middleware('auth'); //restrict page without login.
Route::get('/cart', function(){
    return view('cart');
});
Route::get('/about', function(){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::get('/help', function(){
    return view('help');
});
Route::get('/insertp', function(){
    return view('product.insertp');
});
Route::get('/order', function(){
    return view('order');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('product/insertpt','ProductController@create');
//Route::get('product', 'ProductController@index'); //index
//Route::post('product', 'ProductController@store'); //store


//Route::get('/home', 'HomeController@index')->name('home');
//for edit profile
Route::get('/editprofile','EditProfileController@index');
Route::get('/editprofile/{id}','EditProfileController@edit');
Route::put('/updateprofile/{id}','EditProfileController@update');

//for adding product type
Route::get('/addproducttype',function(){
    return view('product/insertpt');
});
Route::get('/addproducttype','ProductTypeController@index');
Route::post('/insertpt','ProductTypeController@store');

//for adding product
Route::get('/productadd','ProductController@create');
Route::post('/product','ProductController@store');
Route::get('/insertpindex', 'ProductController@index');

Route::get('/editproduct/{id}','ProductController@edit'); //edit
Route::put('/updateproduct/{id}','ProductController@update'); //update

//for admin dashboard
Route:: group(['middleware'=>'admin'],function(){
        Route::get('/admindash','AdminController@admindash');
});
