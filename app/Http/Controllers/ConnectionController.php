<?php

namespace App\Http\Controllers;


use App\ApiConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;

class ConnectionController extends BaseController
{
    public function show()
    {
        $data["tel_regex"] = "^\\+228 [0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$" ;
        return view("connection", $data);
    }

    public function connect()
    {
        $login= e(Input::get('name'));
        $password = e(Input::get('password'));

        $client = new Client();
        if(\Illuminate\Support\Facades\Cache::has('access_token') ){
            $uri = new ApiConfig();
            $access_token = \Illuminate\Support\Facades\Cache::get('access_token') ;
            try{
                $response = $client->request('POST',$uri->getUrlRest().'api/user/signin?client_id='.$uri->getClientId().'&access_token='.$access_token,
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


            $uri = new ApiConfig();
            $json = file_get_contents($uri->getUrlAuth().'auth/authorization?client_id='.$uri->getClientId());
            $result = \GuzzleHttp\json_decode($json);
            \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);
            $access_token = \Illuminate\Support\Facades\Cache::get('access_token') ;
            try{
                $response = $client->request('POST',$uri->getUrlRest().'api/user/signin?client_id='.$uri->getClientId().'&access_token='.$access_token,
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

        }


    }
}
