<?php

namespace Qlite\Api\Project;

use Qlite\Api\AbstractRequest;

class GetRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $includeSubProjects;

    public function __construct($apiKey, $projectId, $includeSubProjects = false)
    {
        $this->apiKey             = $apiKey;
        $this->projectId          = $projectId;
        $this->includeSubProjects = $includeSubProjects;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/';
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