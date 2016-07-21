<?php

namespace Qlite\Api\LibraryItem;

class LibraryItem
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

    public function getName()
    {
        return $this->json->name;
    }

    public function getFilePath()
    {
        return $this->json->filepath;
    }

    public function getFileMd5()
    {
        return $this->json->filemd5;
    }

    public function getTags()
    {
        return $this->json->tags;
    }

    public function getWidth()
    {
        return $this->json->width;
    }

    public function getHeight()
    {
        return $this->json->height;
    }

    public function getFilesize()
    {
        return $this->json->filesize;
    }

    public function getDuration()
    {
        return $this->json->duration;
    }
}