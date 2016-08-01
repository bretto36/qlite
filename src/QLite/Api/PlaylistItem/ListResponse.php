<?php

namespace Qlite\Api\PlaylistItem;

use Qlite\Api\AbstractResponse;

class ListResponse extends AbstractResponse
{
    public function getObject()
    {
        return new PlaylistItems(json_decode($this->getResponse()));
    }
}