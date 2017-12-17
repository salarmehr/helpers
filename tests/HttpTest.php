<?php

require __DIR__ . '/../src/http.php';

class HttpTest extends PHPUnit\Framework\TestCase
{

	/**
    * @dataProvider httpMessageProvider
    */
    public function testHttpHeaderFor($original, $expected)
    {
        $this->assertEquals('HTTP/1.1 ' . $expected, f\http::httpHeaderFor($original));
    }

	/**
    * @dataProvider httpMessageProvider
    */
    public function testGetMessageForCode($original, $expected)
    {
        $this->assertEquals($expected, f\http::getMessageForCode($original));
    }


    public function httpMessageProvider()
    {
        return [
            [100, '100 Continue'],
            [404, '404 Not Found'],
            [505, '505 HTTP Version Not Supported']
        ];
    }





    /**
    * @dataProvider isErrorProvider
    */
    public function testIsError($original, $expected)
    {
        $this->assertEquals($expected, f\http::isError($original));
    }


    public function isErrorProvider()
    {
        return [
            [100, 0],
            [400, 1],
            [417, 1],
            [505, 1]
        ];
    }




    /**
    * @dataProvider canHaveBodyProvider
    */
    public function testCanHaveBody($original, $expected)
    {
        $this->assertEquals($expected, f\http::canHaveBody($original));
    }


    public function canHaveBodyProvider()
    {
        return [
            [204, 0],
            [304, 0],
            [99, 1],
            [200, 1],
            [300, 1],
            [400, 1],
            [500, 1],
            [5000, 1]            
        ];
    }


}

