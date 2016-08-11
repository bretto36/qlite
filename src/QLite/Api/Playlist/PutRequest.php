<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractPutRequest;

class PutRequest extends AbstractPutRequest
{
    protected $apiKey;

    protected $projectId;

    protected $playlistId;

    protected $values;

    public function __construct($apiKey, $projectId, $playlistId, $values)
    {
        $this->apiKey     = $apiKey;
        $this->projectId  = $projectId;
        $this->playlistId = $playlistId;
        $this->values     = $values;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/playlists/' . $this->playlistId . '?' . http_build_query($this->getParameters());
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }

    public function getBody()
    {
        $parameters = [
            'format' => 0,
            'playlist' => [],
        ];

        foreach ($this->values as $key => $value) {
            $parameters['playlist'][$key] = $value;
        }

        return $parameters;
    }
}