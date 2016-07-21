<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractRequest;

class ListRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    public function __construct($apiKey, $projectId)
    {
        $this->apiKey    = $apiKey;
        $this->projectId = $projectId;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/playlists/';
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }
}