<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Middleware;

use Qlite\Qlite;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_players_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/players_success.json')),
        ]);

        $container = [];

        $history = Middleware::history($container);

        $handler = HandlerStack::create($mock);

        $handler->push($history);

        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlayers('apikey', 9);

        foreach ($container as $transaction) {
            $this->assertEquals('GET', $transaction['request']->getMethod());
        }

        $this->assertEquals(1, count($response->getPlayers()));

        $players = $response->getPlayers();

        $player = array_shift($players);

        $this->assertEquals(123, $player->getId());
        $this->assertEquals('Test-Display', $player->getName());
    }

    public function test_get_player_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/player_success.json')),
        ]);

        $container = [];

        $history = Middleware::history($container);

        $handler = HandlerStack::create($mock);

        $handler->push($history);

        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlayer('apikey', 9, 123);

        foreach ($container as $transaction) {
            $this->assertEquals('GET', $transaction['request']->getMethod());
        }

        $this->assertEquals(123, $response->getId());
        $this->assertEquals('Test-Display', $response->getName());
    }

    public function test_create_player_returns_results()
    {
        // Don't have access rights to create player - must be handled by qlite
    }

    public function test_update_player_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/player_update_success.json')),
        ]);

        $container = [];

        $history = Middleware::history($container);

        $handler = HandlerStack::create($mock);

        $handler->push($history);

        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->updatePlayer('apikey', 16, 124, [
            'playlistid' => 103,
        ]);

        foreach ($container as $transaction) {
            $this->assertEquals('PUT', $transaction['request']->getMethod());
        }

        $this->assertEquals(124, $response->getId());
        $this->assertEquals(103, $response->getPlaylistId());
    }
}
