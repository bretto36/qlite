<?php

namespace Qlite\Api\Library;

use Qlite\Api\AbstractResponse;

class ListResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Libraries(json_decode($this->getResponse()));
    }
}