<?php

namespace Qlite\Api\Login;

use Qlite\Api\AbstractResponse;

class PostResponse extends AbstractResponse
{
    public function getObject()
    {
        return new Login(json_decode($this->getResponse()));
    }
}