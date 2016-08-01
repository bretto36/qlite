<?php

namespace Qlite\Api\Player;

use Qlite\Api\AbstractResponse;

class PutResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Player(json_decode($this->getResponse())->player);
    }
}