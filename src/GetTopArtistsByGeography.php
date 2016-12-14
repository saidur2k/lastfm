<?php

namespace App;

use App\Api\Geo\GetTopArtists;
use App\Api\Request;
use App\Model\Artist;

class GetTopArtistsByGeography extends BaseController
{
    
    public function makeRequestBy($selection, $page)
    {
        $setParams = new GetTopArtists($selection, $page);
        $getRawData = $this->handle($setParams);
        $cleanData = $this->sanitizeArray($getRawData->getJSON());
        return $this->toJSON($cleanData);
    }

    protected function sanitizeArray($data)
    {
        $newData = array_reduce($data, function($highCarry, $item) use($data)
        {
            $highCarry = array_reduce($item, function($midCarry, $lowItem)
            {
                $carry = array_reduce($lowItem, function($lowCarry, $lowItem2) {
                    $newArtist = new Artist();
                    $newArtist->setFromApi($lowItem2);
                    if ($newArtist->isValid())
                    {
                        $lowCarry[] = $newArtist->toArray();
                    }
                    return $lowCarry;
                });

                if (!empty($carry))
                {
                    $midCarry = $carry;
                }
                return $midCarry;
            });
            return $highCarry;
        });

        return $newData;
    }
}