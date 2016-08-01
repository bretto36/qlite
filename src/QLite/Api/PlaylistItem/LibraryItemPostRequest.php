<?php

namespace Qlite\Api\PlaylistItem;

class LibraryItemPostRequest extends PostRequest
{
    protected $libraryId;

    protected $libraryItemId;

    protected $duration;

    public function __construct($apiKey, $projectId, $playlistId, $libraryId, $libraryItemId, $duration)
    {
        $this->apiKey        = $apiKey;
        $this->projectId     = $projectId;
        $this->playlistId    = $playlistId;
        $this->libraryId     = $libraryId;
        $this->libraryItemId = $libraryItemId;
        $this->duration      = $duration;
    }

    public function getBody()
    {
        return [
            'format' => 0,
            'playlistitem' => [
                'visible' => true,
                'duration' => $this->duration,
                'type' => 'simpleimage',
                'simpleimage' => [
                    'libraryid' => $this->libraryId,
                    'libraryitemid' => $this->libraryItemId,
                ]
            ]
        ];
    }
}