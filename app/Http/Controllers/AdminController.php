<?php

namespace App\Http\Controllers;

use App\ApiConfig;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{

    public function show()
    {
        return view('administration/administration ');
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
