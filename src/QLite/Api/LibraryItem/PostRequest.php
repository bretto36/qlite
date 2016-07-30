<?php

namespace Qlite\Api\LibraryItem;

use Qlite\Api\AbstractPostRequest;

class PostRequest extends AbstractPostRequest
{
    protected $apiKey;

    protected $projectId;

    protected $libraryId;

    protected $name;

    protected $file;

    protected $tags;

    public function __construct($apiKey, $projectId, $libraryId, $name, $file, $tags)
    {
        $this->apiKey    = $apiKey;
        $this->projectId = $projectId;
        $this->libraryId = $libraryId;
        $this->name      = $name;
        $this->file      = $file;
        $this->tags      = $tags;
    }

    public function getUrl()
    {
        return $this->getBaseUrl() . 'v0/projects/' . $this->projectId . '/libraries/' . $this->libraryId . '/items/?' . http_build_query($this->getParameters());
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }

    public function getBody()
    {
        return [
            'format' => 0,
            'libraryitem' => [
                'name' => $this->name,
                'file' => $this->file,
                'tags' => $this->tags,
            ],
        ];
    }
}