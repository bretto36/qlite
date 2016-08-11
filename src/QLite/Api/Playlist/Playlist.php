<?php

namespace Qlite\Api\Playlist;

class Playlist
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

    public function getProjectId()
    {
        return $this->json->projectid;
    }

    public function getName()
    {
        return $this->json->name;
    }

    public function isAutoPublish()
    {
        return $this->json->autopublish;
    }
}