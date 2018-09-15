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

Route::get('/explore/{id}', 'ProduitsController@explore')->name('explore');


Route::get('/confirmationaccount', 'InscriptionController@confirmation')->name('confirmation');

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

Route::get('/admin/baskets', "AdminController@showBaskets") ;

// Pages des résultats d'un recherche
Route::get("/search", "ProduitsController@search") ;
// Résultat de pagination
Route::get("/search/more", function ()
{
    $keyword = e(\Illuminate\Support\Facades\Input::get("keyword")) ;
    $category = e(\Illuminate\Support\Facades\Input::get("category_id")) ;
    $offset= e(\Illuminate\Support\Facades\Input::get('offset')) ;
    $items = null ;
    try
    {
        $access_token = \App\Utils\Net\RestRequest::getInstance()->getAccessToken() ;
        $path = ($category !== "..." && $category !== "") ? "api/category{$category}/items" : "api/items";
        $request = \App\Utils\Net\RestRequest::getInstance()->get($path, [
            "client_id"=>(new \App\ApiConfig())->getClientId(),
            "access_token"=>$access_token,
            "limit"=>10,
            "offset"=>$offset,
            "keyword"=>$keyword
        ]) ;

        $response = json_decode((string) $request->getBody(), TRUE);

        if($response["code"] == 2000)
        {
            $items = json_decode($response["data"], TRUE) ;
        }


        return view("items/bodypart/items",["items"=>$items]) ;

    }catch (\App\Utils\Net\RestRequestException $rre)
    {
        \Illuminate\Support\Facades\Cache::forget("access_token") ;
        return redirect("/search", 302)->withInput(["keyword"=>$keyword, "category_id"=>$category]) ;
    }
}) ;

Route::get("/search/moreItems", function () {

    $offset = e(\Illuminate\Support\Facades\Input::get('offset'));
    $items = null;
    try {
        $access_token = \App\Utils\Net\RestRequest::getInstance()->getAccessToken();
        $path = "api/items";
        $request = \App\Utils\Net\RestRequest::getInstance()->get($path, [
            "client_id" => (new \App\ApiConfig())->getClientId(),
            "access_token" => $access_token,
            "limit" => 10,
            "offset" => $offset,

        ]);

        $response = json_decode((string)$request->getBody(), TRUE);


        if ($response["code"] == 2000) {
            $items = json_decode($response["data"], TRUE);
        }


        return view("items/bodypart/items", ["items" => $items]);

    } catch (\App\Utils\Net\RestRequestException $rre) {
        \Illuminate\Support\Facades\Cache::forget("access_token");
        return redirect()->route('home');
    }
});

// Enregistrer un panier temporaire
Route::get('/basket/save', 'PanierController@saveBasket') ;

/////////////////////////////////////////////////////////////////////
/// Les Routes en post /////////////////////////////////////////////
/// ///////////////////////////////////////////////////////////////

Route::post('/connect', 'ConnectionController@connect');

Route::post('/inscription', 'InscriptionController@add');

Route::post('/confirmation', 'InscriptionController@validate');

Route::post('/addcomment', 'ProduitsController@addComment');

// Pour les produits, coté panneau d'administration
Route::post('/admin/items/add', 'AdminController@addNewItem') ;

Route::post('/admin/items/update', 'AdminController@updateItem') ;

// Pour les infos de l'utilisateir
Route::post("/admin/profile/password", "AdminController@changePassword") ;

Route::post("/admin/profile/update", "AdminController@updateProfile") ;

Route::post('/email', 'InscriptionController@resend');

Route::post('/basket/create', 'PanierController@createBasket') ;

//////////////////////////////////////////////////////////////////////
/// Les routes pour afficher des pages sans traitement ///////////////
/// //////////////////////////////////////////////////////////////////
Route::get("/errors/app_unauthorized", function (){
    return view("/errors/app_unauthorized") ;
}) ;

Route::get("/errors/unregistereduser", function (){
    return view("/errors/unregistered_user") ;
}) ;

///////////////////////////////////////////////////////////////////////
/// Les Routes delete /////////////////////////////////////////////////
/// ///////////////////////////////////////////////////////////////////

// Supprimer un produit à l'intérieur d'un panier temporaire
Route::delete("/baskets/item/{item_id}", "PanierController@deleteOneInBasket") ;
