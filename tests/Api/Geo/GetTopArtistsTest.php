<?php
use App\Api\Geo\GetTopArtists;

class GetTopArtistsTest extends PHPUnit_Framework_TestCase
{
    protected $getTopTracks;

    public function setUp()
    {
        $this->getTopTracks = new GetTopArtists('Australia','1');
    }

    /** @test */
    public function method_name_is_getTopTracks()
    {
        $this->assertEquals('geo.getTopArtists', $this->getTopTracks->methodName());
    }

    /** @test */
    public function parameters_return_is_consistent()
    {
        $this->assertEquals([
            'method' => 'geo.getTopArtists',
            'country' => 'Australia',
            'page' => '1'
        ], $this->getTopTracks->parameters());
    }
}