<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractResponse;

class PutResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Playlist(json_decode($this->getResponse())->playlist);
    }
}