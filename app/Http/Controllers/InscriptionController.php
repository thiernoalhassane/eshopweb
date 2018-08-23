<?php

namespace App\Http\Controllers;


use App\ApiConfig;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class InscriptionController extends BaseController
{

    public function show()
    {
        return view('inscription');
    }

    public function add(Request $request)
    {
        $nom = e(Input::get('name'));
        $prenom = e(Input::get('usurname'));
        $pseudo = e(Input::get('surname'));
        $password = e(Input::get('password'));
        $email = e(Input::get('email'));
        $tel = e(Input::get('phone'));
        $adresse = e(Input::get('address'));
        $sexe = e(Input::get('sex'));
        $flooz = e(Input::get('flooz'));
        $tmoney = e(Input::get('tmoney'));

        if ($request->file('profil') == null) {
            $profile = "";
        } else {
            $profile = $request->file('profil')->store('profile_user');
        }


        if ($flooz == "" && $tmoney == "")
            return back()->with('erreur', 'Remplissez soit Tmoney soit Flooz');


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
                                'contents' => $pseudo
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
                                'name' => 'profil',
                                'contents' => $profile
                            ],
                            [
                                'name' => 'flooz',
                                'contents' => $flooz
                            ],
                            [
                                'name' => 'tmoney',
                                'contents' => $tmoney
                            ],

                        ]

                    ]);


            } catch (RequestException  $e) {
                if ($e->hasResponse()) {
                    $exception = (string)$e->getResponse()->getBody();
                    $exception = json_decode($exception);
                    return redirect('inscription')->with('message', $exception->data->message);
                }
            }

            return redirect('/')->with('bienvenue', 'Premiere etape validé');


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

                             'name'  => $nom,
                            'surname' => $pseudo,
                            'email' => $email,
                            'sex' => $sexe,
                            'flooz' => $flooz,
                            'phone' => $tel,
                            'address' => $adresse,
                            'password' => $password,
                            'profile' => $profile
            */
        }
    }

    public function confirmation()
    {
        return view('confirmationaccount');
    }
}
