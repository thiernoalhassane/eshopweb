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
    protected $url_auth = "http://192.168.41.1:8081/eshop-auth-1.0-SNAPSHOT/";
    protected $url_rest = "http://192.168.41.1:8081/eshoprest/";

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