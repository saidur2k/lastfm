<?php

namespace App\Api\Geo;

use App\Api\MethodAbstractClass;
use App\Api\MethodContract;

class GetTopArtists extends MethodAbstractClass implements MethodContract
{
    public function methodName()
    {
        return 'geo.getTopArtists';
    }

    public function parameters()
    {
        return [
            'method' => $this->methodName(),
            'country' => $this->selection,
            'page' => $this->page
        ];
    }
}