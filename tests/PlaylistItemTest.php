<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use Qlite\Qlite;

class PlaylistItemTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_playlist_items_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/playlist_items_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlaylistItems('apikey', 16, 103);

        $this->assertEquals(1, count($response->getPlaylistItems()));

        $playlistItems = $response->getPlaylistItems();

        $playlistItem = array_shift($playlistItems);

        $this->assertEquals(704, $playlistItem->getId());
        $this->assertEquals(30, $playlistItem->getDuration());
        $this->assertEquals('simpleimage', $playlistItem->getType());
        $this->assertTrue($playlistItem->isVisible());
    }

    public function test_get_playlist_item_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/playlist_item_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlaylistItem('apikey', 16, 103, 704);

        $this->assertEquals(704, $response->getId());
        $this->assertEquals(30, $response->getDuration());
        $this->assertEquals('simpleimage', $response->getType());
        $this->assertTrue($response->isVisible());
    }

    public function test_create_playlist_item_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/playlist_item_create_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->addLibraryItemToPlaylist('apikey', 16, 103, 65, 354, 30);

        $this->assertEquals(704, $response->getId());
        $this->assertEquals(30, $response->getDuration());
        $this->assertEquals('simpleimage', $response->getType());
        $this->assertTrue($response->isVisible());
    }
}
