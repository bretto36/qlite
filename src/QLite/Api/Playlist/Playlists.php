<?php

namespace Qlite\Api\Playlist;

class Playlists
{
    protected $json;

    protected $playlists;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getPlaylists()
    {
        // Create an array of project objects
        if (null === $this->playlists) {
            $this->playlists = [];
            foreach ($this->json->playlists as $playlistJson) {
                $this->playlists[] = new Playlist($playlistJson);
            }
        }
        return $this->playlists;
    }
}