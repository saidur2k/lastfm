<?php
// Tell PHP that we're using UTF-8 strings until the end of the script
mb_internal_encoding('UTF-8');

// Tell PHP that we'll be outputting UTF-8 to the browser
mb_http_output('UTF-8');

require('vendor/autoload.php');
//use App\Api\Request;
//use App\Api\Geo\GetTopArtists;
//use App\Api\Artist\GetTopTracks;
//use App\Api\Config;
//$config = new Config();
////$getGetTopArtists = new GetTopArtists("Australia", "1");
////$request = new Request($config, $getGetTopArtists);
////$request->get();
//
//$getGetTopTracks = new GetTopTracks("a74b1b7f-71a5-4011-9441-d0b5e4122711", "1");
//$request = new Request($config, $getGetTopTracks);
//$request->get();