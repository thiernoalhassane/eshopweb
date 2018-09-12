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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{

    protected $rest_endpoint ;

    protected $user_profil ;

    public function __construct()
    {
        $this->rest_endpoint = new ApiConfig() ;
        $this->user_profil = [
            "name"=>Session::get("user")["name"],
            "surname"=>Session::get("user")["surname"],
            "profil"=>Session::get("user")["profil"],
            "email"=>Session::get("user")["email"],
            "phone"=>Session::get("user")["phone"],
            "address"=>Session::get("user")["address"]
        ] ;
    }

    public function show()
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $user_profil = [
            "name"=>Session::get("user")["name"],
            "surname"=>Session::get("user")["surname"],
            "profil"=>Session::get("user")["profil"],
            "email"=>Session::get("user")["email"],
            "phone"=>Session::get("user")["phone"],
            "address"=>Session::get("user")["address"]
        ] ;

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

        return view('administration/administration', ["categories"=>$categories, "user_profil"=>$user_profil]);
    }

    /**
     * Traite le formulaire de modification d'un produit.
     * @param Request $post
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * <p>
     *  En cas de succès redirige vers la page d'administration avec un tableau associatif.<br/>
     *  Les deux clé sont:
     *  <ul>
     *      <li>succes_while_update_item: le message de succès</li>
     * </ul>
     * </p>
     */
    public function updateItem(Request $post)
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $validator = $this->validateItemForm($post) ;
        if($validator->fails())
        {
            return redirect("/product", 302)->withErrors($validator) ;
        }
        $data = [
            "wording"=>e(Input::get("wording")),
            "description"=>e(Input::get("description")),
            "price"=>(double)e(Input::get("price")),
            "quantity"=>(int)e(Input::get("quantity")),
            "category"=>["id"=>e(Input::get("category_id"))],
            "tags"=>explode(",", e(Input::get("tags")))
        ] ;

        if($post->file("picture") != null)
        {
            $data["picture"] = "data:image/{$post->file('picture')->extension()};base64,".base64_encode(file_get_contents($post->file('picture')->getRealPath())) ;
        }

        try
        {
            // Le requête vers le web service
            $request = RestRequest::getInstance()->put(
                "api/items/user/5b809c6d6f9db627c638e57c/".e(Input::get("id")),
                "json",
                $data, [
                "client_id"=>$this->rest_endpoint->getClientId(),
                "access_token"=>RestRequest::getInstance()->getAccessToken(),
            ]);
            $json_response = json_decode((string) $request->getBody(), TRUE) ;

            if($json_response['status'] == "success")
            {
                Cache::forget("user:5b809c6d6f9db627c638e57c:items") ;

                // Retour vers la page précédente
                return redirect()->back(302)->with(["succes_while_update_item"=> "Produit modifié avec succès !"]);
            }

            switch ((int)$json_response["code"])
            {
                case 4001:
                    if(Session::has("retry") AND Session::has("retry") != null)
                    {
                        Session::forget(["retry"]) ;
                        return redirect("/errors/app_unauthorized", 302) ;
                    }
                    Cache::forget("access_token") ;

                    // Cette redirection provoque une grave exception
                    return redirect("/admin/items/update", 302)->withInput()->with(["retry"=>1]) ;
                    break;
                case 4004:
                    return redirect("/errors/unregistereduser", 302);
                default:
                    return redirect()->back()->with(["error_while_update_item"=>$json_response['data']['message']]) ;
                    break;
            }
        }catch (RestRequestException $rre)
        {
            if(Session::has("retry") AND Session::has("retry") != null)
            {
                Session::forget(["retry"]) ;
                return redirect("/errors/app_unauthorized", 302) ;
            }
            Cache::forget("access_token") ;

            // Cette redirection provoque une grave exception
            return redirect("/admin/items/update", 302)->withInput()->with(["retry"=>1]) ;
        }
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
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $validator = $this->validateItemForm($post);
        if($validator->fails())
        {
            $errors = $validator->errors() ;
            return redirect("/admin")->withInput()->withErrors($validator) ;
        }
        // Requête vers le web service
        $multipart = [
            [
                "name"=>"wording",
                "contents"=>e(Input::get("wording"))
            ],[
                "name"=>"description",
                "contents"=>e(Input::get("description"))
            ],[
                "name"=>"price",
                "contents"=>e(Input::get("price"))
            ],[
                "name"=>"quantity",
                "contents"=>e(Input::get("quantity"))
            ],[
                "name"=>"tags",
                "contents"=>e(Input::get("tags"))
            ],[
                "name"=>"category",
                "contents"=>e(Input::get("category_id"))
            ]
        ] ;

        // Ajout de l'image dans le tableau
        if ($post->file('picture') != null) {
            array_push($multipart, [
                "name"=>"picture",
                "contents"=>fopen($post->file("picture")->getRealPath(), "r"),
                "filename"=>$post->file("picture")->getClientOriginalName()
            ]) ;
        }

        // Tentative d'ajout d'un produit
        try
        {
            $user_id = Session::get("user")['id'] ;
            $access_token = RestRequest::getInstance()->getAccessToken() ;
            $new_item = RestRequest::getInstance()
                ->postMultipart("api/items/user/{$user_id}",
                    $multipart,
                    ["client_id"=>$this->rest_endpoint->getClientId(),"access_token"=>$access_token]) ;

            // Mise à jour du cache ///////////////////////////////////////////////////////////
            $new_item["trader"] = null ;
            $new_item["category"] = null ;
            $user_items = RestRequest::getInstance()->getItemsByUserId("5b809c6d6f9db627c638e57c"
                , [
                    "client_id"=>$this->rest_endpoint->getClientId(),
                    "access_token"=>RestRequest::getInstance()->getAccessToken(),
                    "limit"=>100
                ]) ;
            array_push($user_items, $new_item) ;
            Cache::put("user:5b809c6d6f9db627c638e57c:items", $user_items, 60) ;
            ////////////////////////////////////////////////////////////////////////////////////

            return redirect()->back(302)->with(["succes_while_add_item"=> "Produit ajouter avec succès !"]);
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

    public function deconnect(Request $request)
    {
        $user = Session::forget('user');
        return redirect('/')->with('bienvenue', 'Vous etes déconnectés');
    }

    public function showProfile()
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $user_profil = [
            "name"=>Session::get("user")["name"],
            "surname"=>Session::get("user")["surname"],
            "profil"=>Session::get("user")["profil"],
            "email"=>Session::get("user")["email"],
            "phone"=>Session::get("user")["phone"],
            "address"=>Session::get("user")["address"]
        ] ;

        return view('administration/profile', ["user_profil"=>$user_profil]);
    }

    public function showProduct()
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $user_items = null ;
        $user_id = Session::get("user")['id'] ;
        $user_profil = [
            "name"=>Session::get("user")["name"],
            "surname"=>Session::get("user")["surname"],
            "profil"=>Session::get("user")["profil"],
            "email"=>Session::get("user")["email"],
            "phone"=>Session::get("user")["phone"],
            "address"=>Session::get("user")["address"]
        ] ;

        try
        {
            $user_items = RestRequest::getInstance()->getItemsByUserId($user_id
                , [
                    "client_id"=>$this->rest_endpoint->getClientId(),
                    "access_token"=>RestRequest::getInstance()->getAccessToken(),
                    "limit"=>100
                ]) ;
        }catch (RestRequestException $rre)
        {
            try
            {
                Cache::forget("access_token"); Cache::forget("user:5b34e9635390fd229c90b3d6:items");
                $user_items = RestRequest::getInstance()->getItemsByUserId("5b34e9635390fd229c90b3d6"
                    , [
                        "client_id"=>$this->rest_endpoint->getClientId(),
                        "access_token"=>RestRequest::getInstance()->getAccessToken()
                    ]) ;
            }catch (RestRequestException $rre)
            {
                return view("errors/app_unauthorized")  ;
            }
        }

        return view('administration/listeproduit', ["user_items"=>$user_items, "user_profil"=>$user_profil]);
    }

    public function showBilan()
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $user_profil = [
            "name"=>Session::get("user")["name"],
            "surname"=>Session::get("user")["surname"],
            "profil"=>Session::get("user")["profil"],
            "email"=>Session::get("user")["email"],
            "phone"=>Session::get("user")["phone"],
            "address"=>Session::get("user")["address"]
        ] ;


        return view('administration/bilan', ["user_profil"=>$user_profil]);
    }

    public function showTrader($id)
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

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

    /**
     * Valide le formulaire d'ajout ou de modification d'un produit.
     * @param Request $post
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validateItemForm(Request $post)
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        // validation du formulaire
        return Validator::make($post->all(),
            [
                "wording"=>"required|not_regex:/^[ \\._@!?,;\\d]+$/",
                "description"=>"nullable|not_regex:/^[ \\._@!?,;\\d]+$/",
                "price"=>"required|min:1",
                "quantity"=>"required|min:1",
                "picture"=>"nullable|mimetypes:image/png,image/jpeg,image/jpg",
                "category_id"=>"required"
                ,[
                "required"=>"Le champ :attribute est obligatoire !",
                "mimetypes"=>"Les images doivent être de ce type :mimtypes",
                "not_regex"=>"Veullez saisir seulement des caractères alphanumériques"
            ]
            ]) ;
    }

    /**
     * Traite le formulaire de modification du mot de passe.
     * @param Request $post
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $post)
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $validation = Validator::make($post->all(),
            [
                "current_pass"=>"required",
                "new_pass"=>"required",
                "new_pass_bis"=>"required"
            ],[
                "required"=>"Le champ :attribute est obligatoire"
            ]) ;

        if($validation->fails())
        {
            return redirect()->back(302)->withErrors($validation) ;
        }

        $data = [
            "old_pass"=>e(Input::get("current_pass")),
            "new_pass"=>e(Input::get("new_pass")),
            "new_pass_bis"=>e(Input::get("new_pass_bis"))
        ] ;

        try
        {
            $access_token = RestRequest::getInstance()->getAccessToken() ;
            $user_id = Session::get("user")['id'] ;
            $request = RestRequest::getInstance()->put("api/user/{$user_id}/password", "form_params", $data,
            [
                "access_token"=>$access_token,
                "client_id"=>$this->rest_endpoint->getClientId()
            ]) ;

            $response = json_decode((string) $request->getBody(), TRUE) ;

            if($response["status"] == "success")
            {
                return redirect()->back(302)->with(
                    ["success_while_submit_form"=>$response["data"]["message"]]) ;
            }

            return redirect()->back(302)->with(
                ["error_while_submit_form"=>$response["data"]["message"]]) ;

        }catch (RestRequestException $rre)
        {
            Cache::forget("access_token") ;
            return redirect()->back(302)->with(
                ["error_while_submit_form"=>$rre->getMessage()]) ;
        }
    }

    public function updateProfile(Request $post)
    {
        if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
        {
            return redirect("/connection", 302)->with(["error_while_access_to_backend"=>"Vous devez être connecté pour accéder à tout le site"]) ;
        }

        $validator= Validator::make($post->all(),[
            "name"=>"required|regex:/^[a-zA-Z -]+$/",
            "surname"=>"nullable|regex:/^[a-zA-Z -]+$/",
            "phone"=>"required|regex:/^\\+228 [0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/",
            "email"=>"required|email"
        ], ["required"=>"Le champ :attribute est obligatoire", "email"=>"Veuillez saisir un email valide"]) ;

        if($validator->fails())
        {
            return redirect()->back(302)->withErrors($validator) ;
        }

        $put_data = [
            "name"=>e(Input::get("name")),
            "surname"=>e(Input::get("surname")),
            "phone"=>e(Input::get("phone")),
            "email"=>e(Input::get("email")),
        ] ;

        try
        {
            $access_token = RestRequest::getInstance()->getAccessToken() ;
            $user_id = Session::get("user")['id'] ;

            $request = RestRequest::getInstance()->put("api/user/{$user_id}", "json", $put_data,
            [
                "access_token"=>$access_token,
                "client_id"=>$this->rest_endpoint->getClientId()
            ]);
            $response = json_decode((string)$request->getBody(), TRUE) ;

            if($response["status"] == "success")
            {
                $user = Session::get("user") ;
                Session::forget("user") ;
                $user["name"] = $put_data["name"] ;
                $user["surname"] = $put_data["surname"] ;
                $user["phone"] = $put_data["phone"] ;
                $user["email"] = $put_data["email"] ;
                Session::put("user", $user) ;

                return redirect()->back(302)->with(
                    ["success_while_submit_form"=>"Profil modifié avec succès"]) ;
            }

            return redirect()->back(302)->with(
                ["error_while_submit_form"=>$response["data"]["message"]]) ;

        }catch (RestRequestException $rre)
        {
            Cache::forget("access_token") ;
            return redirect()->back(302)->with(
                ["error_while_submit_form"=>$rre->getMessage()]) ;
        }
    }
}
