<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Middleware;

use Qlite\Qlite;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    public function test_login_is_successful()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/login_success.json')),
        ]);

        $container = [];

        $history = Middleware::history($container);

        $handler = HandlerStack::create($mock);

        $handler->push($history);

        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->login('username', 'password');

        foreach ($container as $transaction) {
            $this->assertEquals('POST', $transaction['request']->getMethod());
        }

        $this->assertTrue($response->isAuthenticated());
        $this->assertEquals('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6InRlc3RfaWQifQ.eyJpc3MiOiJodHRwczpcL1wvZGV2Mi1jbG91ZC5xLWxpdGUuY29tIiwiYXVkIjoiaHR0cHM6XC9cL2RldjItY2xvdWQucS1saXRlLmNvbSIsImp0aSI6InRlc3RfaWQiLCJpYXQiOjE0NjkwMTk0ODEsIm5iZiI6MTQ2OTAxOTQ4MSwiZXhwIjoxNDY5MDIxMjgxLCJ1c2VyIjp7ImlkIjoiOTY0IiwidXNlcm5hbWUiOiJhZHN1cF9hZG1pbiIsInByb2plY3RpZCI6IjkiLCJkZWZhdWx0cHJvamVjdGlkIjoiOSIsImRlZmF1bHRwYWdlIjpudWxsLCJwciI6W3siaWQiOiI5Iiwic2MiOltbMSwxLDEsMCwxXSxbMSwxLDEsMCwxXSxbMSwxLDAsMCwxXSxbMSwxLDEsMCwxXSxbMSwxLDEsMCwxXSxbMCwwLDAsMCwxXSxbMCwwLDAsMCwxXV0sInByIjpbeyJpZCI6IjEwIiwic2MiOltbMSwxLDEsMCwxXSxbMSwxLDEsMCwxXSxbMSwxLDAsMCwxXSxbMSwxLDEsMCwxXSxbMSwxLDEsMCwxXSxbMCwwLDAsMCwxXSxbMCwwLDAsMCwxXV19XX1dfX0.2Gj9BO9drfuPYoNAGLuwb8Cg12IgqKbXktDfTmJ1QM4', $response->getApiKey());
    }
}
