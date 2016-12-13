<?php

namespace App;

use App\Api\Artist\GetTopTracks;

class GetTopTracksByArtist extends BaseController
{
    public function makeRequestBy($selection, $page)
    {
        $setParams = new GetTopTracks($selection, $page);
        $getRawData = $this->handle($setParams);
        return $getRawData->sanitizeArray($getRawData);
    }

    protected  function sanitizeArray(Request $request)
    {
        array_reduce();
        return var_dump($request->getJSON());
    }
}