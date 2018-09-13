<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request ;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use MongoDB\BSON\ObjectID;

class PanierController extends BaseController
{

  public function show()
  {
    return view('panier');
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

}
