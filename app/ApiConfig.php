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
    protected $client_id ="5b6701c5e034f86e53f3628b";
    protected $url_auth = "http://127.0.0.1:8081/eshop-auth-1.0-SNAPSHOT/";
    protected $url_rest = "http://127.0.0.1:8081/eshoprest-1.0-SNAPSHOT/";


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