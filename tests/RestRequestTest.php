<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/08/18
 * Time: 16:17
 */

namespace Tests;


class RestRequestTest extends TestCase
{
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
}