<?php

namespace Qlite\Api\Project;

use Qlite\Api\AbstractRequest;

class ListRequest extends AbstractRequest
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/';
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }
}