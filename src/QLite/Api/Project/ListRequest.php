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
        return $this->getBaseUrl() . 'v0/projects/?' . http_build_query($this->getParameters());
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }
}