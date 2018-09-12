<?php

namespace App\Http\Controllers;

use App\ApiConfig;
use App\Utils\Net\RestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Utils\Net\RestRequestException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProduitsController extends BaseController
{
    protected $rest_endpoint ;

    public function __construct()
    {
        $this->rest_endpoint = new ApiConfig() ;
    }

  public function show()
  {
      if(\Illuminate\Support\Facades\Cache::has('access_token') && \Illuminate\Support\Facades\Cache::has('nomcategorie') && \Illuminate\Support\Facades\Cache::has('produits')){

          $nom = \Illuminate\Support\Facades\Cache::get('nomcategorie');
          $produits =   \Illuminate\Support\Facades\Cache::get('produits');
          return view('produits',compact('nom','produits'));
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
          $items = file_get_contents($uri->getUrlRest().'api/items?client_id='.$uri->getClientId().'&access_token='.\Illuminate\Support\Facades\Cache::get('access_token'));
          $produit =  \GuzzleHttp\json_decode($items);
          $produits = \GuzzleHttp\json_decode($produit->data);
          \Illuminate\Support\Facades\Cache::put('produits', $produits, 10);
          return view('produits',compact('nom','produits'));
      }
  }

    public function explore($id)
    {

        if(\Illuminate\Support\Facades\Cache::has('access_token') && \Illuminate\Support\Facades\Cache::has('nomcategorie')){

            $nom = \Illuminate\Support\Facades\Cache::get('nomcategorie');
            $uri = new ApiConfig();
            $item = file_get_contents($uri->getUrlRest().'api/item/'.$id.'?client_id='.$uri->getClientId().'&access_token='.\Illuminate\Support\Facades\Cache::get('access_token'));
            $produit =  \GuzzleHttp\json_decode($item);
            $produits = \GuzzleHttp\json_decode($produit->data);

            return view('desproduit',compact('nom','produits'));
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
            $item = file_get_contents($uri->getUrlRest().'api/item/'.$id.'?client_id='.$uri->getClientId().'&access_token='.\Illuminate\Support\Facades\Cache::get('access_token'));
            $produit =  \GuzzleHttp\json_decode($item);
            $produits = \GuzzleHttp\json_decode($produit->data);

            return view('desproduit',compact('nom','produits'));
        }

    }

    public function search()
    {
        $keyword = e(Input::get("keyword")) ;
        $category = e(Input::get("category_id")) ;
        $items = null ;
        try
        {
            $access_token = RestRequest::getInstance()->getAccessToken() ;
            $path = ($category !== "..." && $category !== "") ? "api/category/{$category}/items" : "api/items";
            $request = RestRequest::getInstance()->get($path, [
                "client_id"=>$this->rest_endpoint->getClientId(),
                "access_token"=>$access_token,
                "limit"=>10,
                "keyword"=>$keyword
            ]) ;

            $response = json_decode((string) $request->getBody(), TRUE);

            if($response["code"] == 2000)
            {
                $items = json_decode($response["data"], TRUE) ;
            }

            $nom = \Illuminate\Support\Facades\Cache::get('nomcategorie');
            return view("search", compact("nom", "items")) ;

        }catch (RestRequestException $rre)
        {
            \Illuminate\Support\Facades\Cache::forget("access_token") ;
            return redirect("/search", 302)->withInput(["keyword"=>$keyword, "category_id"=>$category]) ;
        }
    }
}
