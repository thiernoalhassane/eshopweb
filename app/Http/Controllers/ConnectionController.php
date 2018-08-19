<?php

namespace App\Http\Controllers;


use App\ApiConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;

class ConnectionController extends BaseController
{
    public function show()
    {
        return view("connection");
    }

    public function connect()
    {
        $login= e(Input::get('name'));
        $password = e(Input::get('password'));

        $client = new Client();
        if(\Illuminate\Support\Facades\Cache::has('access_token') ){
            $uri = new ApiConfig();
            //$message = file_get_contents($uri->getUrlRest().'aapi/user/signin?client_id='.$uri->getClientId().'&access_token='.\Illuminate\Support\Facades\Cache::get('access_token'));
            try{
                $response = $client->request('POST',$uri->getUrlRest().'api/user/signin?client_id='.$uri->getClientId().'&access_token='.\Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'form_params' =>[
                            'login' => $login,
                            'password' => $password,
                        ]
                    ]);

            }catch ( RequestException  $e){
                if ($e->hasResponse()) {
                    $exception = (string) $e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    return redirect('connection')->with('message',$exception->data->message)  ;
                }
            }

            return redirect('/')->with('bienvenue','Connection reussie')  ;


        } else {

            /*
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
            return view('acceuil',compact('nom','produits'));
            */
        }


    }
}
