<?php

use App\Api\Request;
use PHPUnit\Framework\TestCase as TestCase;

class RequestTest extends TestCase
{
    protected $config;
    protected $method;

    public function setUp()
    {
        // Create a stub for the Config class.
        $this->config = $this->createMock(App\Api\Config::class);

        // Configure the stub.
        $this->config->method('getApiKey')
            ->willReturn('YOUR_API_KEY');
        $this->config->method('getBaseUrl')
            ->willReturn('http://ws.audioscrobbler.com/2.0/');
        $this->config->method('getResultsPerPage')
            ->willReturn('5');

        $this->method = $this->createMock(App\Api\Artist\GetTopTracks::class);

        $this->method->method('methodName')
            ->willReturn('artist.getTopTracks');

        $this->method->method('parameters')
            ->willReturn([
                'method' => 'artist.getTopTracks',
                'mbid' => 'testParam',
                'page' => '1'
            ]);
    }

    /** @test */
    public function check_test_full_url()
    {
        $testUrl =
              'http://ws.audioscrobbler.com/2.0/'
            . "?&method=artist.getTopTracks"
            . '&mbid=testParam'
              . '&page=1'
            . "&limit=5"
            . "&api_key=YOUR_API_KEY"
            . "&format=json"
        ;

        $request = new Request($this->config, $this->method);

        $this->assertEquals($testUrl, $request->getFullUrl());
    }

}
