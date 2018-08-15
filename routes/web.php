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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', 'AcceuilController@show');

Route::get('/inscription', 'InscriptionController@show');

Route::get('/connection', 'ConnectionController@show');

Route::get('/produits','ProduitsController@show');

Route::get('/blog','BlogController@show');

Route::get('/panier','PanierController@show');

Route::get('/profile', 'AdminController@showProfile');

Route::get('/product', 'AdminController@showProduct');

Route::get('/bilan', 'AdminController@showBilan');

Route::get(' /trader', 'AdminController@showTrader');

Route::get(' /explore/{id}', 'ProduitsController@explore');

Route::get('/admin','AdminController@show');