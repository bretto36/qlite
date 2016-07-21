<?php

namespace Qlite\Api\Login;

use Qlite\Api\AbstractPostRequest;

class PostRequest extends AbstractPostRequest
{
    protected $username;

    protected $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/login/';
    }

    public function getParameters()
    {
        return [];
    }

    public function getBody()
    {
        return json_encode([
            'format' => 0,
            'login' => [
                'username' => $this->username,
                'password' => $this->password,
            ],
        ]);
    }
}