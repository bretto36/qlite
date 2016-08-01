<?php

namespace Qlite\Api;

abstract class AbstractMultipartRequest extends AbstractRequest
{
    public function getMethod()
    {
        return 'POST';
    }

    public function isMultipart()
    {
        return true;
    }

    abstract public function getMultipart();
}