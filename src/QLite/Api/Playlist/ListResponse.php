<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractResponse;

class ListResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Playlists(json_decode($this->getResponse()));
    }
}