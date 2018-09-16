<?php
/**
 * Created by IntelliJ IDEA.
 * User: hacker
 * Date: 09/08/18
 * Time: 14:09
 */

namespace App;


class ApiConfig
{


    protected $client_id = "5b26340139e44b2a9bd4ee30";
    protected $url_auth = "https://nameless-tor-45908.herokuapp.com/api/o";
    protected $url_rest = "https://nameless-tor-45908.herokuapp.com/";

    /* protected $client_id = "5b26340139e44b2a9bd4ee30";
     protected $url_auth = "https://eshopdocker-opentrade.193b.starter-ca-central-1.openshiftapps.com/eshoprest/api/o";
     protected $url_rest = "https://eshopdocker-opentrade.193b.starter-ca-central-1.openshiftapps.com/eshoprest/";

 protected $client_id = "5b26340139e44b2a9bd4ee30";
 protected $url_auth = "https://nameless-tor-45908.herokuapp.com/";
 protected $url_rest = "https://desolate-castle-82146.herokuapp.com/";
    protected $client_id = "5b6701c5e034f86e53f3628b";
    protected $url_auth = "http://127.0.0.1:8081/eshoprest-2.0.0/api/o";
    protected $url_rest = "http://localhost:8081/eshoprest-2.0.0/";
    /**
     * @return string
     */
    public function getUrlAuth()
    {
        return $this->url_auth;
    }

    /**
     * @return string
     */
    public function getUrlRest()
    {
        return $this->url_rest;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }
    public function url($url){
        return $url;

    }
}