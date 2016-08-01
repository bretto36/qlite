<?php

namespace Qlite\Api\PlaylistItem;

class PlaylistItems
{
    protected $json;

    protected $playlistItems;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getPlaylistItems()
    {
        // Create an array of project objects
        if (null === $this->playlistItems) {
            $this->playlistItems = [];
            foreach ($this->json->playlistitems as $json) {
                $this->playlistItems[] = new PlaylistItem($json);
            }
        }
        return $this->playlistItems;
    }
}