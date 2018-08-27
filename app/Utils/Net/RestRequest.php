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
use \Illuminate\Support\Facades\Log as Log ;

/**
 * Class RestRequest
 * Cette classe à pour rôle de faciliter les appels vers eshoprest, en
 * fournissant un ensemble de fonctions simples au dessus de GuzzleHttp.
 * @package App\Utils\Net
 */
class RestRequest
{
    private static $singleton ;

    /**
     * Configuration de l'API REST.
     * @var \App\ApiConfig
     */
    protected $appConfig ;

    /**
     * Client HTTP custom.
     * <p>Il ne lance pas d'exception en cas de réponses négatives du serveur.</p>
     * @var \GuzzleHttp\Client
     */
    protected $httpClient ;

    private function __construct()
    {
        $this->appConfig = new \App\ApiConfig() ;
        $this->httpClient = new \GuzzleHttp\Client(["base_uri"=>$this->appConfig->getUrlRest(), "http_errors"=>FALSE]) ;
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
     * @param string $path Le chemin par rapport à $base_uri, sans / au début
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
     * @param string $path Chemin depuis l'url de base de l'API Open Trade.
     * @param array $query Les parametres de l'URL.
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(string $path, array $query = [])
    {
        $params["query"] = $query ;
        return $this->httpClient->request("GET", $path, $params) ;
    }

    /**
     * Récupérer les catégories de l'API REST de Open Trade.
     * @return mixed|null
     * <p>
     *   Renvoie null si le code du message est différent de 2000.<br/>
     *   Renvoie les catégories sous forme de tableaux associatif si le code est 2000.
     * </p>
     * @throws RestRequestException Si le code du message est 4001.
     */
    public function getCategories()
    {
        $access_token = $this->getAccessToken() ;
        if(!Cache::has("categories"))
        {
            Log::info("tentative de récupération des catégories") ;
            $response = $this->get("api/categories",[
                "client_id"=>$this->appConfig->getClientId(),
                "access_token"=>$access_token
            ]);
            $categories = json_decode((string) $response->getBody()) ;

            if($categories->code == 4001)
            {
                $msg = json_decode($categories->data, TRUE) ;
                Log::critical("impossible de récupérer les catégories: message REST: {$msg['message']}");
                throw new RestRequestException($msg["message"]) ;
            }
            elseif ($categories->code == 2000)
            {
                Log::info("mise en cache des catégories") ;
                Cache::add("categories", json_decode($categories->data, TRUE), 1440) ;
            }
            else
            {
                Log::critical("impossible de récupérer les catégories: code REST: {$categories->code}");
                return null ;
            }
        }
        return Cache::get("categories") ;
    }

    /**
     * @param string $base_uri L'url de base. ex: https://toto.com/
     * @param string $path Le chemin par rapport à $base_uri, sans / au début
     * @param array $multipart_data
     * @param array $query Les query parameters de l'url. ex: ["client_id"=>"toto"]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function postMultipart(string $base_uri, string $path, array $multipart_data, array $query = [])
    {
        $params["multipart"]=$multipart_data;
        $params["query"]=$query;
        $params["http_errors"] = false ;
        $client = new \GuzzleHttp\Client(["base_uri"=>$base_uri]) ;

        $response = $client->request("POST", $path, $params);
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