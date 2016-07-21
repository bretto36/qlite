<?php

namespace Qlite\Api\Login;

class Login
{
    public $json;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getApiKey()
    {
        return $this->json->auth->token;
    }

    public function isAuthenticated()
    {
        return $this->json->auth->authenticated;
    }
}