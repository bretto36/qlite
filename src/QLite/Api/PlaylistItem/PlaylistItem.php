<?php

namespace Qlite\Api\PlaylistItem;

class PlaylistItem
{
    protected $json;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getId()
    {
        return $this->json->id;
    }

    public function getType()
    {
        return $this->json->type;
    }

    public function getDuration()
    {
        return $this->json->duration;
    }

    public function isVisible()
    {
        return $this->json->visible;
    }
}