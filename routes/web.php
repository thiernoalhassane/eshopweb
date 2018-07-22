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

Route::get('/inscription', 'InscriptionController@show');

Route::get('/acceuil','AcceuilController@show');

Route::get('/connection', 'ConnectionController@show');

Route::get('/produits','ProduitsController@show');

Route::get('/blog','BlogController@show');

Route::get('/panier','PanierController@show');

Route::get('/profile', 'AdminController@showProfile');

Route::get('/product', 'AdminController@showProduct');

Route::get('/bilan', 'AdminController@showBilan');

Route::get('/admin','AdminController@show');