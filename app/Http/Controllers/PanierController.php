<?php

namespace App\Http\Controllers;

use App\ApiConfig;
use Illuminate\Http\Request ;
use \App\Utils\Net\RestRequest;
use \App\Utils\Net\RestRequestException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Cache ;

class PanierController extends BaseController
{
    protected $rest_endpoint ;

    public function __construct()
    {
        $this->rest_endpoint = new ApiConfig() ;
    }

    public function show()
    {
        /* Récuération des catégories dans le style de barry */
        $nom = [] ;
        if(!Cache::has("nomcategorie"))
        {
            $request = RestRequest::getInstance()->get("api/cetegories",
                [
                    "client_id"=>$this->rest_endpoint->getClientId(),
                    "access_token"=>RestRequest::getInstance()->getAccessToken()
                ]);
            $response = json_decode((string) $request->getBody(), TRUE) ;
            if($response["code"] == 2000)
            {
                $nom = json_decode($response["data"]) ;
                Cache::put('nomcategorie', $nom, 1440);
            }
        }
        else {$nom = Cache::get("nomcategorie");}

        // Récupération des produits du panier
        $items = null ;
        if(Session::has("basket"))
        {
            try
            {
                $basket = Session::get("basket") ;
                $path = "api/items/";
                $access_token = RestRequest::getInstance()->getAccessToken() ;
                $request = RestRequest::getInstance()->get($path.join(",", array_keys($basket)), [
                    "client_id"=>$this->rest_endpoint->getClientId($access_token),
                    "access_token"=>$access_token
                ]) ;
                $response = json_decode($request->getBody()->getContents(), TRUE) ;
                if($response["code"] === 2000)
                {
                    $items = json_decode($response["data"], TRUE) ;
                }
            }catch(RestRequestException $rre)
            {
                \Illuminate\Support\Facades\Log::critical($rre->getMessage()) ;
            }
        }

        return view('panier', compact("nom", "items", "basket"));
  }

    /**
     * <p>
     * Permet à un utilisateur d'ajouter des produits à un panier temporaire.<br>
     * Le panier est mis dans un cookies pour une durée de 24 h.
     * </p>
     * @param Request $post
     * @return array
     */
  public function createBasket(Request $post)
  {
      if(!Session::has("basket"))
      {
          Session::put("basket", null) ;
      }

      $item_id  = e(Input::get("item_id")) ;
      $item_quantity = e(Input::get("item_quantity")) ;
      $item_price = e(Input::get("item_price")) ;

      $basket = Session::get("basket") == null ? [] : Session::get("basket") ;


      if(key_exists($item_id, $basket))
      {
          if($basket[$item_id] != null && $basket[$item_id]["quantity"] != 0)
          {
              $basket[$item_id]["quantity"] = $item_quantity + $basket[$item_id]["quantity"] ;
          }
          else
          {
              $basket[$item_id]["quantity"] = $item_quantity ;
              $basket[$item_id]["total_price"] = $basket[$item_id]["quantity"]*$item_price;
          }
      }
      else
      {
          $basket[$item_id]["quantity"] = $item_quantity ;
          $basket[$item_id]["total_price"] = (double) $basket[$item_id]["quantity"]*$item_price;
      }
      // Calcul du total du panier
      $total_item = count($basket) ;
      $item_total_price = 0.0 ;
      foreach ($basket as $value)
      {
        $item_total_price += (double)$value["total_price"]*$value["quantity"] ;
      }

      Session::put("basket", $basket) ;
      return ["total_item"=>$total_item, "item_total_price"=>$item_total_price] ;
  }

  public function deleteOneInBasket(string $item_id)
  {
      if(Session::has("basket") && Session::get("basket") != null)
      {
          // suppression
          $basket = Session::get("basket") ;
          array_forget($basket, $item_id) ;
          // Calcul
          $total_item = count($basket) ;
          $item_total_price = 0.0 ;
          foreach ($basket as $value)
          {
              $item_total_price += (double)$value["total_price"]*$value["quantity"] ;
          }
          Session::put("basket", $basket) ;
          return ["total_item"=>$total_item, "item_total_price"=>$item_total_price] ;
      }
  }

  public function saveBasket()
  {
      if(!Session::has("user") || is_null(Session::get("user")) || !is_array(Session::get("user")))
      {
          return Response::make("Vous devez être connecté pour éffectuer cette action !", 401);
      }

      if(Session::has("basket") && Session::get("basket") != null)
      {
          $path = "api/baskets/".Session::get('user')['id'] ;

          try
          {
              $purchases = join(",", array_keys(Session::get("basket"))) ;
              $quantities_array= [] ;
              foreach (Session::get("basket") as $value)
              {
                  array_push($quantities_array, $value["quantity"]) ;
              }
              $quantities = join(",", $quantities_array) ;

              $data["quantities"] = $quantities ;
              $data["items"] = $purchases ;
              $access_token = RestRequest::getInstance()->getAccessToken() ;
              $request = RestRequest::getInstance()->post($path, "form_params", $data,
                  [
                      "access_token"=>$access_token, "client_id"=>$this->rest_endpoint->getClientId()
                  ]) ;
              $response = json_decode((string) $request->getBody(), TRUE) ;

              // En cas de non succès
              if($response["code"] != 2001)
              {
                  return Response::make("{$response["data"]["message"]} !", "500") ;
              }
              // En cas de succes
              return Response::make("Panier enregistré avec succès !", 200) ;
          }catch (RestRequestException $rre)
          {
              return Response::make($rre->getMessage(), "500") ;
          }
      }
      else
      {
          return Response::make("Panier vide !", "500") ;
      }
  }
}
