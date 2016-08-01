<?php

namespace Qlite\Api\LibraryItem;

use Qlite\Api\AbstractMultipartRequest;

class PostRequest extends AbstractMultipartRequest
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

    public function getHeaders()
    {
        return [];
    }

    public function getParameters()
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }

    public function getMultipart()
    {
        return [
            [
                'name' => 'name',
                'contents' => $this->name,
            ],
            [
                'name' => 'file',
                'contents' => fopen($this->file, 'r'),
            ],
            [
                'name' => 'tags',
                'contents' => $this->tags,
            ],
        ];
    }
}