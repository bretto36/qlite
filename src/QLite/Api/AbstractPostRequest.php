<?php

namespace Qlite\Api;

abstract class AbstractPostRequest extends AbstractRequest
{
    public function getMethod()
    {
        return 'POST';
    }

    abstract public function getBody();
}