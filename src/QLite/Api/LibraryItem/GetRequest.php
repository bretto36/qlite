<?php

namespace Qlite\Api\LibraryItem;

use Qlite\Api\AbstractRequest;

class GetRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $libraryId;

    protected $libraryItemId;

    protected $includeSubProjects;

    public function __construct($apiKey, $projectId, $libraryId, $libraryItemId, $includeSubProjects = false)
    {
        $this->apiKey             = $apiKey;
        $this->projectId          = $projectId;
        $this->libraryId          = $libraryId;
        $this->includeSubProjects = $includeSubProjects;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/libraries/' . $this->libraryId . '/items/' . $this->libraryItemId . '/?' . http_build_query($this->getParameters());
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