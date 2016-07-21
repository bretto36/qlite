<?php

namespace Qlite\Api\Project;

use Qlite\Api\AbstractResponse;

class ListResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Projects(json_decode($this->getResponse()));
    }
}