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
/////////////////////////////////////////////////////
/// Les Routes get /////////////////////////////////
/// ///////////////////////////////////////////////
Route::get('/', 'AcceuilController@show')->name('home');

Route::get('/deconnecter', 'AdminController@deconnect');

Route::get('/inscription', 'InscriptionController@show');

Route::get('/connection', 'ConnectionController@show');

Route::get('/produits','ProduitsController@show');

Route::get('/blog','BlogController@show');

Route::get('/panier','PanierController@show');

Route::get('/profile', 'AdminController@showProfile');

Route::get('/product', 'AdminController@showProduct');

Route::get('/bilan', 'AdminController@showBilan');

Route::get('/trader/{id}', 'AdminController@showTrader');

Route::get('/explore/{id}', 'ProduitsController@explore');

Route::get('/confirmationaccount/{id}', 'InscriptionController@confirmation')->name('confirmation');

Route::get('/admin','AdminController@show');

Route::get('/ecran', function () {
    $fichier = \Illuminate\Support\Facades\Input::get('fichier');
    $val = \Illuminate\Support\Facades\Input::get('val');
    $param = \Illuminate\Support\Facades\Input::get('param');

    return view($fichier, array('val' => $val, 'param' => $param));
});

// Renvoie le code HTML du formulaire de modification d'un produits
Route::get('/admin/items/{id}/update', function ($id)
{
    return view("administration/items/updateForm",
        [
            'id'=>$id,
            'categories'=>\App\Utils\Net\RestRequest::getInstance()->getCategories()
        ]) ;
}) ;

/////////////////////////////////////////////////////////////////////
/// Les Routes en post /////////////////////////////////////////////
/// ///////////////////////////////////////////////////////////////

Route::post('/connect', 'ConnectionController@connect');

Route::post('/inscription', 'InscriptionController@add');

Route::post('/confirmation', 'InscriptionController@validate');


// Pour les produits, coté panneau d'administration
Route::post('/admin/items/add', 'AdminController@addNewItem') ;

Route::post('/admin/items/update', 'AdminController@updateItem') ;

Route::post('/email', 'InscriptionController@resend');

//////////////////////////////////////////////////////////////////////
/// Les routes pour afficher des pages sans traitement ///////////////
/// //////////////////////////////////////////////////////////////////
Route::get("/errors/app_unauthorized", function (){
    return view("/errors/app_unauthorized") ;
}) ;

Route::get("/errors/unregistereduser", function (){
    return view("/errors/unregistered_user") ;
}) ;
