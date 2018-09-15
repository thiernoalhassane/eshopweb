<?php

namespace App\Http\Controllers;


use App\ApiConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class InscriptionController extends BaseController
{

    public function show()
    {
        return view('inscription');
    }

    public function add(Request $request)
    {



        $nom = e(Input::get('name'));
        $prenom = e(Input::get('surname'));
        $password = e(Input::get('password'));
        $email = e(Input::get('email'));
        $tel = e(Input::get('phone'));
        $adresse = e(Input::get('address'));
        $sexe = e(Input::get('sex'));


        if ($request->file('profil') == null) {
            $profile = "";
        } else {
            $profile = $request->file("profil");
        }




        $client = new Client();
        if (\Illuminate\Support\Facades\Cache::has('access_token')) {
            $uri = new ApiConfig();


            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/user/signup?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'multipart' => [
                            [
                                'name' => 'name',
                                'contents' => $nom
                            ],
                            [
                                'name' => 'surname',
                                'contents' => $prenom
                            ],
                            [
                                'name' => 'email',
                                'contents' => $email
                            ],
                            [
                                'name' => 'Phone',
                                'contents' => $tel
                            ],

                            [
                                'name' => 'sex',
                                'contents' => $sexe
                            ],
                            [
                                'name' => 'address',
                                'contents' => $adresse
                            ],

                            [
                                'name' => 'password',
                                'contents' => $password
                            ],
                            [
                                "name" => "profile",
                                "contents" => fopen($profile->getRealPath(), "r"),
                                "filename" => $profile->getClientOriginalName()
                            ],


                        ]

                    ]);


            } catch (ClientException $e) {

                if ($e->hasResponse()) {
                    if ($e->getCode() == 5005) {
                        return redirect()->route('confirmation', ['id' => $request->_token, 'donée' => $request->_token]);
                    }


                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    return redirect('inscription')->with('message', $exception->data->message)->withInput();
                }

            }
            $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $data = \GuzzleHttp\json_decode($jsonid->data);

            return redirect()->route('confirmation');


        } else {


            $uri = new ApiConfig();
            $json = file_get_contents($uri->getUrlAuth().'auth/authorization?client_id='.$uri->getClientId());
            $result = \GuzzleHttp\json_decode($json);
            \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);


            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/user/signup?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'multipart' => [
                            [
                                'name' => 'name',
                                'contents' => $nom
                            ],
                            [
                                'name' => 'surname',
                                'contents' => $prenom
                            ],
                            [
                                'name' => 'email',
                                'contents' => $email
                            ],
                            [
                                'name' => 'Phone',
                                'contents' => $tel
                            ],

                            [
                                'name' => 'sex',
                                'contents' => $sexe
                            ],
                            [
                                'name' => 'address',
                                'contents' => $adresse
                            ],

                            [
                                'name' => 'password',
                                'contents' => $password
                            ],
                            [
                                "name" => "profile",
                                "contents" => fopen($profile->getRealPath(), "r"),
                                "filename" => $profile->getClientOriginalName()
                            ],


                        ]

                    ]);


            } catch (ClientException $e) {

                if ($e->hasResponse()) {
                    if ($e->getCode() == 5005) {
                        return redirect()->route('confirmation', ['id' => $request->_token, 'donée' => $request->_token]);
                    }


                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    return redirect('inscription')->with('message', $exception->data->message)->withInput();
                }

            }
            $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $data = \GuzzleHttp\json_decode($jsonid->data);

            return redirect()->route('confirmation');

        }
    }

    public function confirmation()
    {

        return view('confirmationaccount');
    }

    public function validate(Request $request)
    {


        $token = e(Input::get('token'));


        $client = new Client();
        if (\Illuminate\Support\Facades\Cache::has('access_token')) {
            $uri = new ApiConfig();
            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/user/account/confirm?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'form_params' => [
                            'token' => $token
                        ]

                    ]);


                $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $data = \GuzzleHttp\json_decode($jsonid->data, true);
                $user = Session::put('user', $data);

                return redirect('/')->with('bienvenue', 'Vous etes inscrit au site bonne navigation');

            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);

                    return redirect()->route('confirmation', ['id' => $request->id, 'donée' => $request->_token])->with('message', $exception->data->message);
                }
            }




        } else {


            $uri = new ApiConfig();
            $json = file_get_contents($uri->getUrlAuth().'auth/authorization?client_id='.$uri->getClientId());
            $result = \GuzzleHttp\json_decode($json);
            \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);
            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/user/account/confirm?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'form_params' => [
                            'token' => $token
                        ]

                    ]);
                $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $data = \GuzzleHttp\json_decode($jsonid->data);

                $user = Session::put('user', $data);

                return redirect('/')->with('bienvenue', 'Vous etes inscrit au site bonne navigation');

            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    //return redirect()->route('confirmation',['id' => $request->id])->with('message',$exception)  ;
                    return redirect()->route('confirmation', ['id' => $request->id, 'donée' => $request->_token])->with('message', $exception->data->message);
                }
            }
        }
    }


    public function resend(Request $request){

        $email = e(Input::get('email'));


        $client = new Client();
        if (\Illuminate\Support\Facades\Cache::has('access_token')) {
            $uri = new ApiConfig();


            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/user/email/resend?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'form_params' => [
                            'email' => $email
                        ]

                    ]);


            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    //return redirect()->route('confirmation',['id' => $request->id])->with('message',$exception)  ;
                    return redirect()->route('confirmation')->with('message', $exception->data->message);
                }
            }
            $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $data = \GuzzleHttp\json_decode($jsonid->data);

            return redirect()->route('confirmation')->with('message', 'Clé de confirmation envoyé avec succès');


        } else {


            $uri = new ApiConfig();
            $json = file_get_contents($uri->getUrlAuth().'auth/authorization?client_id='.$uri->getClientId());
            $result = \GuzzleHttp\json_decode($json);
            \Illuminate\Support\Facades\Cache::put('access_token', $result->access_token, 60);
            try {
                $response = $client->request('POST', $uri->getUrlRest() . 'api/user/email/resend?client_id=' . $uri->getClientId() . '&access_token=' . \Illuminate\Support\Facades\Cache::get('access_token'),
                    [
                        'form_params' => [
                            'email' => $email
                        ]

                    ]);


            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    //return redirect()->route('confirmation',['id' => $request->id])->with('message',$exception)  ;
                    return redirect()->route('confirmation')->with('message', $exception->data->message);
                }
            }
            $jsonid = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $data = \GuzzleHttp\json_decode($jsonid->data);

            return redirect()->route('confirmation')->with('message', 'Clé de confirmation envoyé avec succès');
        }
    }
}


