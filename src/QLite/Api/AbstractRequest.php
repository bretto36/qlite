<?php

namespace Qlite\Api;

abstract class AbstractRequest
{
    abstract public function getUrl();

    abstract public function getParameters();

    public function getMethod()
    {
        return 'GET';
    }

    public function getHeaders()
    {
        return [];
    }

    public function isMultipart()
    {
        return false;
    }

    public function getBaseUrl()
    {
        return 'https://dev2-cloud.q-lite.com/api/';
    }
}