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

    /**
     * Executes the request
     *
     * @param AbstractRequest
     * @return mixed
     */
    public function call(AbstractRequest $requestObject)
    {
        $client = $this->getClient();

        $response = $client->request($requestObject->getMethod(), $requestObject->getUrl(), [
            'form_params' => $requestObject->getParameters(),
        ]);

        return $response;
    }
} // End of API class