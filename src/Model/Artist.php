<?php

namespace App\Model;


class Artist
{
    private $name;
    private $mbid;
    private $image;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMbid()
    {
        return $this->mbid;
    }

    public function setMbid($mbid)
    {
        $this->mbid = $mbid;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setFromApi($data)
    {
        if (isset($data['name']))
        {
            $this->setName($data['name']);
        }

        if (isset($data['image'][2]['#text']))
        {
            $this->setImage($data['image'][2]['#text']);
        }

        if (isset($data['mbid']))
        {
            $this->setMbid($data['mbid']);
        }

    }

    public function isValid()
    {
        if (is_null($this->name))
        {
            return false;
        }

        if (is_null($this->mbid))
        {
            return false;
        }

        if (is_null($this->image))
        {
            return false;
        }

        return true;
    }

    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'mbid' => $this->getMbid(),
            'image' => $this->getImage(),
        );
    }
}