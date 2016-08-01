<?php

namespace Qlite\Api;

abstract class AbstractPostRequest extends AbstractRequest
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getHeaders()
    {
        return [];
    }

    abstract public function getBody();
}