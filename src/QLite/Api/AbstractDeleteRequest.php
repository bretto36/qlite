<?php

namespace Qlite\Api;

abstract class AbstractDeleteRequest extends AbstractRequest
{
    public function getMethod()
    {
        return 'DELETE';
    }
}