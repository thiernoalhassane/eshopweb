<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 25/08/18
 * Time: 01:36
 */

namespace App\Utils\Net;
use GuzzleHttp\Exception\RequestException;
use Throwable;
use \Illuminate\Support\Facades\Cache as Cache ;

/**
 * Class RestRequest
 * Cette classe à pour rôle de faciliter les appels vers eshoprest, en
 * fournissant un ensemble de fonctions simples au dessus de GuzzleHttp.
 * @package App\Utils\Net
 */
class RestRequest
{
    private static $singleton ;
    protected $appConfig ;

    private function __construct()
    {
        $this->appConfig = new \App\ApiConfig() ;
    }

    public static function getInstance()
    {
        if(is_null(self::$singleton))
        {
            self::$singleton = new RestRequest();
        }
        return self::$singleton ;
    }

    /**
     * Cette fonction permet de faire une requête Http::GET et c'est tout.
     * @param string $base_uri L'url de base. ex: https://toto.com/
     * @param strin $path Le chemin par rapport à $base_uri, sans / au début
     * @param array $query Les query parameters de l'url
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function simpleGet(string $base_uri, string $path, array $query = [])
    {
        $params["http_errors"]=false ;
        $params["query"]=$query;
        $client = new \GuzzleHttp\Client(["base_uri"=>$base_uri]) ;
        $response = $client->request("GET", $path, $params) ;
        return $response ;
    }

    /**
     * Récupérer le jetton d'accès à l'api REST.</br>
     * Soit depuis le cache ou en faisant une requête Http::GET.
     * @return mixed Le jetton d'acces.
     * @throws RestRequestException Si il est impossible de récupérer l'access_token.
     */
    public function getAccessToken()
    {
        //echo $this->appConfig->getUrlAuth();
        // Vérification dans le cache
        if(!Cache::has('access_token'))
        {
            $response = $this->simpleGet($this->appConfig->getUrlAuth(),"auth/authorization", ["client_id"=>$this->appConfig->getClientId()]) ;
            if($response->getStatusCode() != 200)
            {
                throw new RestRequestException($response->getBody()->getContents()) ;
            }
            $access_token = json_decode((string) $response->getBody(), TRUE)["access_token"] ;
            Cache::add("access_token", $access_token, 60) ;
        }
        return Cache::get("access_token") ;
        // Mise en cache
    }
}

/**
 * Exception représantant une erreur grave survenue lors de l'utilisation
 * du web service.<br/>
 * Comme par exemple, l'impossibilité de récupérer un jetton d'accès.
 * @package App\Utils\Net
 */
class RestRequestException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}