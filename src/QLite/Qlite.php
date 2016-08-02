<?php


namespace Qlite;

use GuzzleHttp\Client;

use Qlite\Api\AbstractRequest;

/**
 * Class API
 *
 * @package Qlite
 */
class Qlite
{
    public $client = null;

    /**
     * Checks for presence of setup $data array and loads
     *
     * @param bool $data
     */
    public function __construct($parameters = array())
    {
        if (isset($parameters['client'])) {
            $this->client = $parameters['client'];
        }
    }

    public function getClient()
    {
        if (null === $this->client) {
            $this->client = new Client();
        }

        return $this->client;
    }

    public function login($username, $password)
    {
        $requestObject = new \Qlite\Api\Login\PostRequest($username, $password);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Login\PostResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getProjects($apiKey)
    {
        $requestObject = new \Qlite\Api\Project\ListRequest($apiKey);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Project\ListResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getProject($apiKey, $projectId)
    {
        $requestObject = new \Qlite\Api\Project\GetRequest($apiKey, $projectId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Project\GetResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getPlaylists($apiKey, $projectId)
    {
        $requestObject = new \Qlite\Api\Playlist\ListRequest($apiKey, $projectId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Playlist\ListResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getPlaylist($apiKey, $projectId, $playlistId)
    {
        $requestObject = new \Qlite\Api\Playlist\GetRequest($apiKey, $projectId, $playlistId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Playlist\GetResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function createPlaylist($apiKey, $projectId, $name, $autoPublish = false)
    {
        $requestObject = new \Qlite\Api\Playlist\PostRequest($apiKey, $projectId, $name, $autoPublish);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Playlist\PostResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getPlaylistItems($apiKey, $projectId, $playlistId)
    {
        $requestObject = new \Qlite\Api\PlaylistItem\ListRequest($apiKey, $projectId, $playlistId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\PlaylistItem\ListResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getPlaylistItem($apiKey, $projectId, $playlistId, $playlistItemId)
    {
        $requestObject = new \Qlite\Api\PlaylistItem\GetRequest($apiKey, $projectId, $playlistId, $playlistItemId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\PlaylistItem\GetResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function addLibraryItemToPlaylist($apiKey, $projectId, $playlistId, $libraryId, $libraryItemId, $duration)
    {
        $requestObject = new \Qlite\Api\PlaylistItem\LibraryItemPostRequest($apiKey, $projectId, $playlistId, $libraryId, $libraryItemId, $duration);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\PlaylistItem\PostResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function deletePlaylistItem($apiKey, $projectId, $playlistId, $playlistItemId)
    {
        $requestObject = new \Qlite\Api\PlaylistItem\DeleteRequest($apiKey, $projectId, $playlistId, $playlistItemId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\PlaylistItem\DeleteResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getPlayers($apiKey, $projectId)
    {
        $requestObject = new \Qlite\Api\Player\ListRequest($apiKey, $projectId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Player\ListResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getPlayer($apiKey, $projectId, $playerId)
    {
        $requestObject = new \Qlite\Api\Player\GetRequest($apiKey, $projectId, $playerId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Player\GetResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function updatePlayer($apiKey, $projectId, $playerId, $newDetails)
    {
        $requestObject = new \Qlite\Api\Player\PutRequest($apiKey, $projectId, $playerId, $newDetails);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Player\PutResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getLibraries($apiKey, $projectId)
    {
        $requestObject = new \Qlite\Api\Library\ListRequest($apiKey, $projectId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Library\ListResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getLibrary($apiKey, $projectId, $libraryId)
    {
        $requestObject = new \Qlite\Api\Library\GetRequest($apiKey, $projectId, $libraryId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Library\GetResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function createLibrary($apiKey, $projectId, $name)
    {
        $requestObject = new \Qlite\Api\Library\PostRequest($apiKey, $projectId, $name);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\Library\PostResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getLibraryItems($apiKey, $projectId, $libraryId)
    {
        $requestObject = new \Qlite\Api\LibraryItem\ListRequest($apiKey, $projectId, $libraryId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\LibraryItem\ListResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function getLibraryItem($apiKey, $projectId, $libraryId, $libraryItemId)
    {
        $requestObject = new \Qlite\Api\LibraryItem\GetRequest($apiKey, $projectId, $libraryId, $libraryItemId);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\LibraryItem\GetResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    public function createLibraryItem($apiKey, $projectId, $libraryId, $name, $file, $tags = '')
    {
        $requestObject = new \Qlite\Api\LibraryItem\PostRequest($apiKey, $projectId, $libraryId, $name, $file, $tags);

        $response = $this->call($requestObject);

        $responseObject = new \Qlite\Api\LibraryItem\PostResponse($response);

        if ($responseObject->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) {
            return $responseObject->getObject();
        }

        return false;
    }

    /**
     * Executes the request
     *
     * @param AbstractRequest
     * @return mixed
     */
    public function call(AbstractRequest $requestObject)
    {
        $client = $this->getClient();

        if ($requestObject->isMultipart()) {
            if ($requestObject->getMethod() == 'POST') {
                $response = $client->request($requestObject->getMethod(), $requestObject->getUrl(), [
                    'multipart' => $requestObject->getMultipart(),
                ]);
            }
        } else {
            if ($requestObject->getMethod() == 'POST' || $requestObject->getMethod() == 'PUT') {
                $response = $client->request($requestObject->getMethod(), $requestObject->getUrl(), [
                    'json' => $requestObject->getBody(),
                ]);
            } else {
                $response = $client->request($requestObject->getMethod(), $requestObject->getUrl(), [
                    'form_params' => $requestObject->getParameters(),
                ]);
            }
        }

        return $response;
    }
} // End of API class