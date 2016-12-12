<?php

namespace App\Api\Artist;

use App\Api\MethodAbstractClass;

class GetTopTracks extends MethodAbstractClass
{
    public function methodName()
    {
        return 'artist.getTopTracks';
    }

    public function parameters()
    {
        return [
            'method' => $this->methodName(),
            'mbid' => $this->selection,
            'page' => $this->page
        ];
    }
}