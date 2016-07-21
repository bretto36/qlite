<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use Qlite\Qlite;

class PlaylistTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_playlists_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/playlists_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlaylists('apikey', 9);

        $this->assertEquals(1, count($response->getPlaylists()));

        $playlists = $response->getPlaylists();

        $playlist = array_shift($playlists);

        $this->assertEquals(99, $playlist->getId());
        $this->assertEquals('Test_Playlist', $playlist->getName());
    }

    public function test_get_playlist_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/playlist_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlaylist('apikey', 9, 99);

        $this->assertEquals(99, $response->getId());
        $this->assertEquals('Test_Playlist', $response->getName());
    }

    public function test_create_playlist_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/playlist_create_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->createPlaylist('apikey', 99, 'Test Playlist Name');

        $this->assertEquals(101, $response->getId());
        $this->assertEquals(10, $response->getProjectId());
        $this->assertEquals('Test Playlist Name', $response->getName());
    }
}
