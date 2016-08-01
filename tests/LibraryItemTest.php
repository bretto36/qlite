<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use Qlite\Qlite;

class LibraryItemTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_library_items_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/library_items_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getLibraryItems('apikey', 10, 62);

        $this->assertEquals(3, count($response->getLibraryItems()));

        $libraryItems = $response->getLibraryItems();

        $libraryItem = array_shift($libraryItems);

        $this->assertEquals(351, $libraryItem->getId());
        $this->assertEquals('Image 1', $libraryItem->getName());

        $libraryItem = array_shift($libraryItems);

        $this->assertEquals(352, $libraryItem->getId());
        $this->assertEquals('Image 2', $libraryItem->getName());

        $libraryItem = array_shift($libraryItems);

        $this->assertEquals(346, $libraryItem->getId());
        $this->assertEquals('Image 3', $libraryItem->getName());
        // TODO: Add file path
    }

    public function test_get_library_item_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/library_item_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getLibraryItem('apikey', 10, 62, 101);

        $this->assertEquals(351, $response->getId());
        $this->assertEquals('Image 1', $response->getName());
    }

    public function test_create_library_item_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/library_item_create_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->createLibraryItem('apikey', 10, 62, 'Test Item Name', 'tests/image/example.jpg', 'tag tag2');

        $this->assertEquals(352, $response->getId());
        $this->assertEquals('Test Item Name', $response->getName());
    }
}
