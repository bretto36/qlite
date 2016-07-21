<?php

namespace Qlite\Api\Player;

use Qlite\Api\AbstractResponse;

class PostResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Player(json_decode($this->getResponse())->player);
    }
}