<?php

namespace App;

use App\Api\Artist\GetTopTracks;

class GetTopTracksByArtist extends BaseController
{
    protected function makeRequestBy($selection, $page)
    {
        return new GetTopTracks($selection, $page);
    }
}