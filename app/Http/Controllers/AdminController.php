<?php

namespace App\Http\Controllers;

use App\ApiConfig;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Illuminate\Support\Facades\Cache as Cache;
use \App\Utils\Net\RestRequest as RestRequest ;
use \App\Utils\Net\RestRequestException as RestRequestException ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{

    public function show()
    {
        $categories = Cache::get("nomcategorie") ;
        if(!Cache::has("nomcategorie"))
        {
            $rest_endpoint = new ApiConfig() ;
            try
            {
                $access_token = RestRequest::getInstance()->getAccessToken() ;
                // Récupération des catégories
                $get_categories_reponse = RestRequest::getInstance()->simpleGet(
                    $rest_endpoint->getUrlRest(),
                    "api/categories",
                    ["client_id"=>$rest_endpoint->getClientId(), "access_token"=>$access_token]) ;
                Log::info("Récupération et mise en cache du jetton d'accès !");

                $json = json_decode((string)$get_categories_reponse->getBody(), TRUE) ;

                if($json["code"]==2000)
                {
                    $categories = json_decode($json["data"]) ;
                    Cache::add("nomcategorie", $categories, 1440);
                    Log::info("Récupération et mise en cache des catégories !");
                }
                elseif ($json["code"] == 4001)
                {
                    Log::critical("Erreur d'authentification de l'application !") ;
                    return view("errors/app_unauthorized") ;
                }
            }catch (RestRequestException $rre)
            {
                Log::critical("Erreur d'authentification de l'application !") ;
                return view("errors/app_unauthorized") ;
            }
        }

        return view('administration/administration', ["categories"=>$categories]);
    }

    public function showProfile()
    {
        return view('administration/profile ');
    }

    public function showProduct()
    {
        return view('administration/listeproduit');
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
