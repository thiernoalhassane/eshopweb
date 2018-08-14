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
    protected $client_id ="5b26340139e44b2a9bd4ee30";
    protected $url_auth = "https://nameless-tor-45908.herokuapp.com/";
    protected $url_rest = "https://desolate-castle-82146.herokuapp.com/";


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