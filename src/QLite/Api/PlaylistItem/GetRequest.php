<?php

namespace Qlite\Api\PlaylistItem;

use Qlite\Api\AbstractRequest;

class GetRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $playlistId;

    protected $playlistItemId;

    protected $includeSubProjects;

    public function __construct($apiKey, $projectId, $playlistId, $playlistItemId, $includeSubProjects = false)
    {
        $this->apiKey             = $apiKey;
        $this->projectId          = $projectId;
        $this->playlistId         = $playlistId;
        $this->includeSubProjects = $includeSubProjects;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/playlists/' . $this->playlistId . '/items/' . $this->playlistItemId . '/?' . http_build_query($this->getParameters());
    }

    public function getParameters()
    {
        $parameters = array(
            'api_key' => $this->apiKey,
        );

        if ($this->includeSubProjects) {
            $parameters['include'] = 'all';
        }

        return $parameters;
    }
}