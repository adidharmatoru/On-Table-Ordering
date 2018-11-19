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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/home/fetch_data', 'HomeController@fetch_data');

Route::get('/home/action', 'HomeController@action')->name('live_search.action');

Route::get('/home/special', 'HomeController@special')->name('special');

Route::get('/home/remove', 'HomeController@removemenu')->name('remove_menu');

Route::post('/home', 'HomeController@addmenu')->name('add_menu');

Route::get('/home/categories', 'HomeController@categories');

Route::get('/home/delete', 'HomeController@deletefromcart')->name('deletefromcart');

Route::get('/home/add', 'HomeController@addtocart')->name('addtocart');

Route::get('/menu', 'MenuController@index')->name('menu');

Route::get('/gallery', 'GalleryController@index')->name('gallery');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/chekout', 'CheckoutController@index')->name('checkout');


