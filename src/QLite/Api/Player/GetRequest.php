<?php

namespace Qlite\Api\Player;

use Qlite\Api\AbstractRequest;

class GetRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $playerId;

    public function __construct($apiKey, $projectId, $playerId)
    {
        $this->apiKey    = $apiKey;
        $this->projectId = $projectId;
        $this->playerId  = $playerId;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/players/' . $this->playerId . '/';
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }
}