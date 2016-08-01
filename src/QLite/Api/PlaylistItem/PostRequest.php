<?php

namespace Qlite\Api\PlaylistItem;

use Qlite\Api\AbstractPostRequest;

class PostRequest extends AbstractPostRequest
{
    protected $apiKey;

    protected $projectId;

    protected $playlistId;

    public function __construct($apiKey, $projectId, $playlistId)
    {
        $this->apiKey    = $apiKey;
        $this->projectId = $projectId;
        $this->playlistId = $playlistId;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/playlists/' . $this->playlistId . '/items/?' . http_build_query($this->getParameters());
    }

    public function getHeaders()
    {
        return [];
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }

    public function getBody()
    {
        // TODO: Add Simple Text addition
    }
}