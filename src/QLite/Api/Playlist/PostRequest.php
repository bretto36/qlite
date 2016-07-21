<?php

namespace Qlite\Api\Playlist;

use Qlite\Api\AbstractPostRequest;

class PostRequest extends AbstractPostRequest
{
    protected $apiKey;

    protected $projectId;

    protected $name;

    protected $autoPublish;

    public function __construct($apiKey, $projectId, $name, $autoPublish = false)
    {
        $this->apiKey      = $apiKey;
        $this->projectId   = $projectId;
        $this->name        = $name;
        $this->autoPublish = $autoPublish;
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

    public function getBody()
    {
        return json_encode([
            'format' => 0,
            'playlist' => [
                'name' => $this->name,
                'autopublish' => $this->autoPublish,
            ],
        ]);
    }
}