<?php

namespace App\Api\Artist;

use App\Api\MethodAbstractClass;
use App\Api\MethodContract;

class GetTopTracks extends MethodAbstractClass implements MethodContract
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