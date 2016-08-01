<?php

namespace Qlite\Api;

abstract class AbstractPutRequest extends AbstractRequest
{
    public function getMethod()
    {
        return 'PUT';
    }

    abstract public function getBody();
}