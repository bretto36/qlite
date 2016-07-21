<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use Qlite\Qlite;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_players_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/players_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlayers('apikey', 9);

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

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getPlayer('apikey', 9, 123);

        $this->assertEquals(123, $response->getId());
        $this->assertEquals('Test-Display', $response->getName());
    }

    public function test_create_player_returns_results()
    {
        // Don't have access rights to create player - must be handled by qlite
    }
}
