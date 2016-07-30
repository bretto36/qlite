<?php

namespace Qlite\Api\Library;

use Qlite\Api\AbstractRequest;

class GetRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $libraryId;

    protected $includeSubProjects;

    public function __construct($apiKey, $projectId, $libraryId, $includeSubProjects = false)
    {
        $this->apiKey             = $apiKey;
        $this->projectId          = $projectId;
        $this->libraryId          = $libraryId;
        $this->includeSubProjects = $includeSubProjects;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/libraries/' . $this->libraryId . '/?' . http_build_query($this->getParameters());
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