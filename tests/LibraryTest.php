<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use Qlite\Qlite;

class LibraryTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_libraries_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/libraries_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getLibraries('apikey', 10);

        $this->assertEquals(1, count($response->getLibraries()));

        $libraries = $response->getLibraries();

        $library = array_shift($libraries);

        $this->assertEquals(62, $library->getId());
        $this->assertEquals('Test_Library', $library->getName());
    }

    public function test_get_library_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/library_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getLibrary('apikey', 10, 62);

        $this->assertEquals(62, $response->getId());
        $this->assertEquals('Test_Library', $response->getName());
    }

    public function test_create_library_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/library_create_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->createLibrary('apikey', 10, 'Test Library Name');

        $this->assertEquals(63, $response->getId());
        $this->assertEquals(10, $response->getProjectId());
        $this->assertEquals('Test Library Name', $response->getName());
    }
}
