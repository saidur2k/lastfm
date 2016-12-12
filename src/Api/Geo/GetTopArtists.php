<?php

namespace App\Api\Geo;

use App\Api\MethodAbstractClass;

class GetTopArtists extends MethodAbstractClass
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