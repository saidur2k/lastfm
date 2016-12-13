<?php

namespace App;

use App\Api\Geo\GetTopArtists;

class GetTopArtistsByGeography extends BaseController
{
    protected function makeRequestBy($selection, $page)
    {
        return new GetTopArtists($selection, $page);
    }
}