<?php

use App\Api\Request;
use App\Api\Geo\GetTopArtists;
use App\Api\Config;

class RequestGeoGetTopArtistsTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function request_australia_first_page()
    {
        $config = new Config();
        $getGetTopArtists = new GetTopArtists("Australia", "1");
        $request = new Request($config, $getGetTopArtists);
        $this->assertTrue($request->getJSON());
    }

//    /** @test */
//    public function request_invalidCountry_first_page()
//    {
//        $config = new Config();
//        $getGetTopArtists = new GetTopArtists("XXXAustraliaXXX", "1");
//        $request = new Request($config, $getGetTopArtists);
//        $this->assertTrue($request->get());
//    }
}