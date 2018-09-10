<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/08/18
 * Time: 16:17
 */

namespace Tests;


use App\Utils\Net\RestRequest;

class RestRequestTest extends TestCase
{

    protected $appConfig ;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->appConfig = new \App\ApiConfig() ;
    }

    public function testGetAccessToken()
    {
        try
        {
            $access_token = \App\Utils\Net\RestRequest::getInstance()->getAccessToken() ;
            $this->assertTrue(strlen($access_token) > 0);
            echo $access_token ;
        }catch (\Exception $e)
        {
            $this->fail($e->getMessage()) ;
        }
    }

    public function testGetCategories()
    {
        try
        {
            $categories = \App\Utils\Net\RestRequest::getInstance()->getCategories() ;
            $this->assertTrue($categories != null);
            var_dump($categories) ;
        }catch (\Exception $e)
        {
            $this->fail($e->getMessage()) ;
        }
    }

    public function testGetItemsByUserId()
    {
        try
        {
            $items = \App\Utils\Net\RestRequest::getInstance()->getItemsByUserId("5b809c6d6f9db627c638e57c"
            , [
                    "client_id"=>$this->appConfig->getClientId(),
                    "access_token"=>RestRequest::getInstance()->getAccessToken()
                ]) ;
            $this->assertTrue($items!= null);
            var_dump($items) ;
        }catch (\Exception $e)
        {
            $this->fail($e->getMessage()) ;
        }
    }
}