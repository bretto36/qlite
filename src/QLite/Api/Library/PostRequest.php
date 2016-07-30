<?php

namespace Qlite\Api\Library;

use Qlite\Api\AbstractPostRequest;

class PostRequest extends AbstractPostRequest
{
    protected $apiKey;

    protected $projectId;

    protected $name;

    public function __construct($apiKey, $projectId, $name)
    {
        $this->apiKey    = $apiKey;
        $this->projectId = $projectId;
        $this->name      = $name;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/libraries/?' . http_build_query($this->getParameters());
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }

    public function getBody()
    {
        return [
            'format' => 0,
            'library' => [
                'name' => $this->name,
            ],
        ];
    }
}