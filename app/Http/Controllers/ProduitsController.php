<?php

namespace App\Http\Controllers;

use App\ApiConfig;

use App\Utils\Net\RestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Utils\Net\RestRequestException;

use GuzzleHttp\Client;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
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
      if (\Illuminate\Support\Facades\Cache::has('access_token') && \Illuminate\Support\Facades\Cache::has('nomcategorie')) {
          $uri = new ApiConfig();
          $limit = 10;
          $offset = 1;
          $nom = \Illuminate\Support\Facades\Cache::get('nomcategorie');
          $items = file_get_contents($uri->getUrlRest() . 'api/items?client_id=' . $uri->getClientId() . '&limit=' . $limit . '&offset=' . $offset . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
          $produit = \GuzzleHttp\json_decode($items);
          $produits = \GuzzleHttp\json_decode($produit->data);


          return view('produits',compact('nom','produits'));
      } else {

          $limit = 10;
          $offset = 1;
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
          $items = file_get_contents($uri->getUrlRest() . 'api/items?client_id=' . $uri->getClientId() . '&limit=' . $limit . '&offset=' . $offset . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'));
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

    public function addComment(Request $request)
    {
        $userid = $request->userid;
        $comment = $request->comment;
        $itemid = $request->itemid;
        $client = new Client();
        if (\Illuminate\Support\Facades\Cache::has('access_token')) {
            $uri = new ApiConfig();
            $access_token = \Illuminate\Support\Facades\Cache::get('access_token');

            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/comments/user/' . $userid . '?client_id=' . $uri->getClientId() . '&access_token=' . $access_token,
                    [
                        'form_params' => [
                            'item_id' => $itemid,
                            'comment_text' => $comment,
                        ]
                    ]);

            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    return back()->with('message', $exception->data->message);
                }
            }
            $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $data = \GuzzleHttp\json_decode($jsonid->data);


            return redirect()->route('explore', ['id' => $data->item->id])->with('message', 'Commentaire ajouter');

            // return redirect()->with('bienvenue','Connection reussie', compact('user'))  ;


        } else {


            $uri = new ApiConfig();
            $json = file_get_contents($uri->getUrlAuth() . 'auth/authorization?client_id=' . $uri->getClientId());
            $result = \GuzzleHttp\json_decode($json);
            \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);
            $access_token = \Illuminate\Support\Facades\Cache::get('access_token');
            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/comments/user/' . $userid . '?client_id=' . $uri->getClientId() . '&access_token=' . $access_token,
                    [
                        'form_params' => [
                            'item_id' => $itemid,
                            'comment_text' => $comment,
                        ]
                    ]);

            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    return back()->with('message', $exception->data->message);
                }
            }
            $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $data = \GuzzleHttp\json_decode($jsonid->data);
            return redirect()->route('explore', ['id' => $data->item->id])->with('message', 'Commentaire ajouter');

        }
    }


}
