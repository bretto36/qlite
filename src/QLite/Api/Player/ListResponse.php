<?php

namespace Qlite\Api\Player;

use Qlite\Api\AbstractResponse;

class ListResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Players(json_decode($this->getResponse()));
    }
}