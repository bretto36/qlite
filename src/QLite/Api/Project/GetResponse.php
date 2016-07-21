<?php

namespace Qlite\Api\Project;

use Qlite\Api\AbstractResponse;

class GetResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Project(json_decode($this->getResponse())->project);
    }
}