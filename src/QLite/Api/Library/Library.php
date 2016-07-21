<?php

namespace Qlite\Api\Library;

class Library
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
}