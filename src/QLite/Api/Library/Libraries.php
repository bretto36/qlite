<?php

namespace Qlite\Api\Library;

class Libraries
{
    protected $json;

    protected $libraries;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getLibraries()
    {
        // Create an array of project objects
        if (null === $this->libraries) {
            $this->libraries = [];
            foreach ($this->json->libraries as $json) {
                $this->libraries[] = new Library($json);
            }
        }
        return $this->libraries;
    }
}