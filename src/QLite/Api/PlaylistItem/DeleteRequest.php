<?php

namespace Qlite\Api\PlaylistItem;

use Qlite\Api\AbstractDeleteRequest;

class DeleteRequest extends AbstractDeleteRequest
{
    protected $apiKey;

    protected $projectId;

    protected $playlistId;

    protected $playlistItemId;

    public function __construct($apiKey, $projectId, $playlistId, $playlistItemId)
    {
        $this->apiKey             = $apiKey;
        $this->projectId          = $projectId;
        $this->playlistId         = $playlistId;
        $this->playlistItemId     = $playlistItemId;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/playlists/' . $this->playlistId . '/items/' . $this->playlistItemId . '/?' . http_build_query($this->getParameters());
    }

    public function getParameters()
    {
        return array(
            'api_key' => $this->apiKey,
        );
    }
}