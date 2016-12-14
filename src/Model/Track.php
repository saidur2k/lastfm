<?php

namespace App\Model;

use App\Model\Artist;

class Track
{
    private $artist;
    private $songName;

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist)
    {
        $this->artist = $artist;
    }

    public function getSongName()
    {
        return $this->songName;
    }

    public function setSongName($songName)
    {
        $this->songName = $songName;
    }

    public function setFromApi($data)
    {
        $artist = new Artist();
        $artist->setFromApi($data);
        if (isset($data['artist']['name']))
        {
            $artist->setName($data['artist']['name']); // overwrite;
        }
        if ($artist->isValid())
        {
            $this->setArtist($artist);
        }

        if (isset($data['name']))
        {
            $this->songName = $data['name'];
        }



    }

    public function isValid()
    {
        if (is_null($this->artist))
        {
            return false;
        }

        if (($this->artist->isValid() == false))
        {
            return false;
        }

        if (is_null($this->songName))
        {
            return false;
        }

        return true;
    }

    public function toArray()
    {
        return array(
            'name' => $this->artist->getName(),
            'mbid' => $this->artist->getMbid(),
            'image' => $this->artist->getImage(),
            'songName' => $this->songName
        );
    }

}