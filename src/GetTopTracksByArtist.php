<?php

namespace App;

use App\Api\Artist\GetTopTracks;
use App\Model\Artist;
use App\Model\Track;

class GetTopTracksByArtist extends BaseController
{
    public function makeRequestBy($selection, $page)
    {
        $setParams = new GetTopTracks($selection, $page);
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
                    $newTrack = new Track();
                    $newTrack->setFromApi($lowItem2);

                    if ($newTrack->isValid())
                    {
                        $lowCarry[] = $newTrack->toArray();
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