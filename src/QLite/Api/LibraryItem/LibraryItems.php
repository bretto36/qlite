<?php

namespace Qlite\Api\LibraryItem;

class LibraryItems
{
    protected $json;

    protected $libraryItems;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getLibraries()
    {
        // Create an array of project objects
        if (null === $this->libraryItems) {
            $this->libraryItems = [];
            foreach ($this->json->libraryitems as $json) {
                $this->libraryItems[] = new LibraryItem($json);
            }
        }
        return $this->libraryItems;
    }
}