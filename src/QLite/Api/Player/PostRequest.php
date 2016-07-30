<?php

namespace Qlite\Api\Player;

use Qlite\Api\AbstractPostRequest;

class PostRequest extends AbstractPostRequest
{
    protected $apiKey;

    protected $projectId;

    protected $values;

    public function __construct($apiKey, $projectId, $values)
    {
        $this->apiKey    = $apiKey;
        $this->projectId = $projectId;
        $this->values    = $values;

        // Possible values
        /*
        "active": true,
        "qliteserial": "string",
        "name": "string",
        "description": "string",
        "playlistid": "string",
        "ip": "string",
        "port": 0,
        "width": 0,
        "height": 0,
        "playertypeid": "string",
        "operatingon": "string",
        "operatingoff": "string",
        "encryptionkey": "string",
        "displayid": 0,
        "gpsavailable": true
        */
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/players/?' . http_build_query($this->getParameters());
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
            'player' => [],
        ];

        foreach ($this->values as $key => $value) {
            $parameters['player'][$key] = $value;
        }

        return $parameters;
    }
}