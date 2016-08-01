<?php

namespace Qlite\Api\PlaylistItem;

use Qlite\Api\AbstractResponse;

class PostResponse extends AbstractResponse
{
    public function getObject()
    {
        return new PlaylistItem(json_decode($this->getResponse())->playlistitem);
    }
}