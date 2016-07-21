<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractRequest;

class GetRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $playlistId;

    public function __construct($apiKey, $projectId, $playlistId)
    {
        $this->apiKey     = $apiKey;
        $this->projectId  = $projectId;
        $this->playlistId = $playlistId;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/playlists/' . $this->playlistId . '/';
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }
}