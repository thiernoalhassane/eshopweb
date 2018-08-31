<?php

namespace App\Http\Controllers;

use App\ApiConfig;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Support\Facades\Cache as Cache;
use \App\Utils\Net\RestRequest as RestRequest ;
use \App\Utils\Net\RestRequestException as RestRequestException ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{

    protected $rest_endpoint ;

    public function __construct()
    {
        $this->rest_endpoint = new ApiConfig() ;
    }

    public function show()
    {
        $categories = null ;
        try
        {
            $categories = RestRequest::getInstance()->getCategories() ;
        }catch (RestRequestException $rre)
        {
            try
            {
                Cache::forget("access_token"); Cache::forget("categories");
                $categories = RestRequest::getInstance()->getCategories() ;
            }catch (RestRequestException $rre)
            {
                return view("errors/app_unauthorized")  ;
            }
        }

        return view('administration/administration', ["categories"=>$categories]);
    }

    /**
     * Traite le formulaire d'ajout d'un produit.
     * @param Request $post
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * <p>
     *  En cas de succès redirige vers la page d'administration avec un tableau associatif.<br/>
     *  Les deux clé sont:
     *  <ul>
     *      <li>succes_while_add_item: le message de succès</li>
     *      <li>new_item: le produit sous la forme d'un tableau associatif</li>
     * </ul>
     * </p>
     */
    public function addNewItem(Request $post)
    {
        // validation du formulaire
        $messages = [
            "required"=>"Le champ :attribute est obligatoire !",
            "mimetypes"=>"Les images doivent être de ce type :mimtypes",
            "not_regex"=>"Veullez saisir seulement des caractères alphanumériques"
        ] ;

        $validator = Validator::make($post->all(),[
            "wording"=>"required|not_regex:/^[ \\._@!?,;\\d]+$/|",
            "description"=>"nullable|not_regex:/^[ \\._@!?,;\\d]+$/",
            "price"=>"required|min:1",
            "quantity"=>"required|min:1",
            "picture"=>"nullable|mimetypes:image/png,image/jpeg,image/jpg",
            "category_id"=>"required"
        , $messages]) ;
        if($validator->fails())
        {
            $errors = $validator->errors() ;
            return redirect("/admin")->withInput()->withErrors($validator) ;
        }
        // Requête vers le web service
        $multipart = [
            [
                "name"=>"wording",
                "contents"=>strip_tags(trim(e(Input::get("wording"))))
            ],[
                "name"=>"description",
                "contents"=>strip_tags(trim(e(Input::get("description"))))
            ],[
                "name"=>"price",
                "contents"=>strip_tags(trim(e(Input::get("price"))))
            ],[
                "name"=>"quantity",
                "contents"=>strip_tags(trim(e(Input::get("quantity"))))
            ],[
                "name"=>"tags",
                "contents"=>strip_tags(trim(e(Input::get("tags"))))
            ],[
                "name"=>"category",
                "contents"=>strip_tags(trim(e(Input::get("category_id"))))
            ]
        ] ;

        // Ajout de l'image dans le tableau
        if ($post->file('picture') != null) {
            array_push($multipart, [
                "name"=>"picture",
                "contents"=>$post->file("picture")->store("picture"),
                "filename"=>$post->file("picture")->getClientOriginalName()
            ]) ;
        }

        // Tentative d'ajout d'un produit
        try
        {
            $access_token = RestRequest::getInstance()->getAccessToken() ;
            $new_item = RestRequest::getInstance()
                ->postMultipart("api/items/user/5b809c6d6f9db627c638e57c",
                    $multipart,
                    ["client_id"=>$this->rest_endpoint->getClientId(),"access_token"=>$access_token]) ;
            //var_dump($reponse);
            return redirect()->back(302)->with(
                [
                    "succes_while_add_item"=> "Produit ajouter avec succès !",
                    "new_item"=>$new_item
                ]);
        }catch (RestRequestException $rre)
        {
            switch ($rre->getCode())
            {
                case 4001:
                    // Si on a déjà essayer de retraiter le formulaire on affiche la page d'erreur.
                    if(e(Input::get("retry")) != null)
                    {
                        return view("errors/app_unauthorized") ;
                    }
                    // Nouvelle tentative d'envoie
                    Cache::forget("access_token"); Cache::forget("categories");
                    return redirect("/items/add?retry=1", 302)->withInput($multipart) ;
                    break;
                case 4004:
                    break;
                    return view("errors/non_registered_user") ;
                default:
                    return redirect("/items/add")->with("error_while_add_item", $rre->getMessage())->withInput($multipart) ;
                    break;
            }
        }
    }

    public function showProfile()
    {
        return view('administration/profile ');
    }

    public function showProduct()
    {
        $user_items = null ;
        try
        {
            $user_items = RestRequest::getInstance()->getItemsByUserId("5b809c6d6f9db627c638e57c"
                , [
                    "client_id"=>$this->rest_endpoint->getClientId(),
                    "access_token"=>RestRequest::getInstance()->getAccessToken()
                ]) ;
        }catch (RestRequestException $rre)
        {
            try
            {
                Cache::forget("access_token"); Cache::forget("user:5b809c6d6f9db627c638e57c:items");
                $user_items = RestRequest::getInstance()->getItemsByUserId("5b809c6d6f9db627c638e57c"
                    , [
                        "client_id"=>$this->rest_endpoint->getClientId(),
                        "access_token"=>RestRequest::getInstance()->getAccessToken()
                    ]) ;
            }catch (RestRequestException $rre)
            {
                return view("errors/app_unauthorized")  ;
            }
        }

        return view('administration/listeproduit', ["user_items"=>$user_items]);
    }

    public function showBilan()
    {
        return view('administration/bilan');
    }

    public function showTrader($id)
    {
        if (\Illuminate\Support\Facades\Cache::has('access_token') && \Illuminate\Support\Facades\Cache::has('nomcategorie')) {

            $nom = \Illuminate\Support\Facades\Cache::get('nomcategorie');
            $uri = new ApiConfig();
            $produittrader = file_get_contents($uri->getUrlRest() . 'api/items/user/' . $id . '?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
            $trade = \GuzzleHttp\json_decode($produittrader);
            $trader = $trade->data;
            $vendeur = \GuzzleHttp\json_decode($trader);

            return view('administration/vendeur', compact('nom', 'vendeur'));
        } else {
            $uri = new ApiConfig();
            $json = file_get_contents($uri->getUrlAuth() . 'auth/authorization?client_id=' . $uri->getClientId());
            $result = \GuzzleHttp\json_decode($json);
            \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);
            $donnees = file_get_contents($uri->getUrlRest() . 'api/categories?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
            $categoriejson = \GuzzleHttp\json_decode($donnees);
            $categorie = $categoriejson->data;
            $nom = \GuzzleHttp\json_decode($categorie);
            \Illuminate\Support\Facades\Cache::put('nomcategorie', $nom, 1440);
            $produittrader = file_get_contents($uri->getUrlRest() . 'api/items/user/' . $id . '?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
            $trade = \GuzzleHttp\json_decode($produittrader);
            $trader = $trade->data;
            $vendeur = \GuzzleHttp\json_decode($trader);

            return view('administration/vendeur', compact('nom', 'vendeur'));

        }
    }


}
