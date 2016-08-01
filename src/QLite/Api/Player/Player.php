<?php

namespace Qlite\Api\Player;

class Player
{
    public $json;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getId()
    {
        return $this->json->id;
    }

    public function getProjectId()
    {
        return $this->json->projectid;
    }

    public function getName()
    {
        return $this->json->name;
    }

    public function getPlaylistId()
    {
        return $this->json->playlistid;
    }
}