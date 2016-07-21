<?php

namespace Qlite\Api\Library;

use Qlite\Api\AbstractRequest;

class ListRequest extends AbstractRequest
{
    protected $apiKey;

    protected $projectId;

    protected $includeSubProjects;

    protected $sort;

    protected $pagination;

    public function __construct($apiKey, $projectId, $includeSubProjects = false, $sort = '', $pagination = '')
    {
        $this->apiKey             = $apiKey;
        $this->projectId          = $projectId;
        $this->includeSubProjects = $includeSubProjects;
        $this->sort               = $sort;
        $this->pagination         = $pagination;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/libraries/';
    }

    public function getParameters()
    {
        $parameters = [
            'api_key' => $this->apiKey,
        ];

        if ($this->includeSubProjects) {
            $parameters['include'] = 'all';
        }

        if ('' != $this->sort) {
            $parameters['sort'] = $this->sort;
        }

        if ('' != $this->pagination) {
            $parameters['pagination'] = $this->pagination;
        }

        return $parameters;
    }
}