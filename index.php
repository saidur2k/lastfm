<?php

header('Access-Control-Allow-Origin: *');
// Tell PHP that we're using UTF-8 strings until the end of the script
//mb_internal_encoding('UTF-8');
//
//// Tell PHP that we'll be outputting UTF-8 to the browser
//mb_http_output('UTF-8');

require('vendor/autoload.php');



use App\Router;
use App\Api\Config;
use App\GetTopArtistsByGeography;
use App\GetTopTracksByArtist;

$config = new Config();

Router::route('geo/gettopartist/:country/:page',
    function($segment, $method, $country, $page = 1) use ($config)
    {
        return (new GetTopArtistsByGeography($config))->makeRequestBy($country, $page);
    }
);


Router::route('artist/gettoptrack/:artist/:page',
    function($segment, $method, $artist, $page = 1) use ($config)
    {
        return (new GetTopTracksByArtist($config))->makeRequestBy($artist, $page);
    }
);

Router::execute($_SERVER['REQUEST_URI']);

