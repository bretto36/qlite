<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractResponse;

class PostResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Playlist(json_decode($this->getResponse())->playlist);
    }
}