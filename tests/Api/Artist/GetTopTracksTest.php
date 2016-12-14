<?php
use App\Api\Artist\GetTopTracks;

class GetTopTracksTest extends PHPUnit_Framework_TestCase
{
    protected $getTopTracks;

    public function setUp()
    {
        $this->getTopTracks = new GetTopTracks('a74b1b7f-71a5-4011-9441-d0b5e4122711','1');
    }

    /** @test */
    public function method_name_is_getTopTracks()
    {
        $this->assertEquals('artist.getTopTracks', $this->getTopTracks->methodName());
    }

    public function parameters_return_is_consistent()
    {
        $this->assertEquals([
            'method' => 'artist.getTopTracks',
            'mbid' => 'a74b1b7f-71a5-4011-9441-d0b5e4122711',
            'page' => '1'
        ], $this->getTopTracks->parameters());
    }
}