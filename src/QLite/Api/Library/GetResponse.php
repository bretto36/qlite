<?php

namespace Qlite\Api\Library;

use Qlite\Api\AbstractResponse;

class GetResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Library(json_decode($this->getResponse())->library);
    }
}