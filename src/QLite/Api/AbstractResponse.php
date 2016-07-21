<?php

namespace Qlite\Api;

abstract class AbstractResponse
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response->getBody();
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }
}