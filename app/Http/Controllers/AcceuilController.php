<?php

namespace App\Http\Controllers;

use App\ApiConfig;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AcceuilController extends BaseController
{

  public function show()
  {


      if (\Illuminate\Support\Facades\Cache::has('access_token') && \Illuminate\Support\Facades\Cache::has('nomcategorie')) {
          $uri = new ApiConfig();
          $limit = 10;
          $offset = 1;
          $nom = \Illuminate\Support\Facades\Cache::get('nomcategorie');
          $items = file_get_contents($uri->getUrlRest() . 'api/items?client_id=' . $uri->getClientId() . '&limit=' . $limit . '&offset=' . $offset . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
          $produit = \GuzzleHttp\json_decode($items);
          $produits = \GuzzleHttp\json_decode($produit->data);


          if (Session::has('user')) {
              $user = Session::get('user');
              return view('acceuil', compact('nom', 'produits', 'user'));
          }
          return view('acceuil',compact('nom','produits'));
      } else {


          $uri = new ApiConfig();
          $json = file_get_contents($uri->getUrlAuth().'auth/authorization?client_id='.$uri->getClientId());
          $result = \GuzzleHttp\json_decode($json);
          \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);
          $value = \Illuminate\Support\Facades\Cache::get('access_token');
          $donnees = file_get_contents($uri->getUrlRest().'api/categories?client_id='.$uri->getClientId().'&access_token='.\Illuminate\Support\Facades\Cache::get('access_token'));
          $categoriejson = \GuzzleHttp\json_decode($donnees);
          $categorie = $categoriejson->data;
          $nom = \GuzzleHttp\json_decode($categorie);
          \Illuminate\Support\Facades\Cache::put('nomcategorie', $nom, 1440);
          $limit = 10;
          $offset = 1;
          $items = file_get_contents($uri->getUrlRest() . 'api/items?client_id=' . $uri->getClientId() . '&limit=' . $limit . '&offset=' . $offset . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
          $produit =  \GuzzleHttp\json_decode($items);
          $produits = \GuzzleHttp\json_decode($produit->data);

          if (Session::has('user')) {
              $user = Session::get('user');
              return view('acceuil', compact('nom', 'produits', 'user'));
          }
          return view('acceuil',compact('nom','produits'));
     }



  }



}
