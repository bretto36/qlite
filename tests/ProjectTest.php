<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use Qlite\Qlite;

class ProjectTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_projects_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/projects_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getProjects('apikey');

        $this->assertEquals(1, count($response->getProjects()));

        $projects = $response->getProjects();

        $project = array_shift($projects);

        $this->assertEquals(9, $project->getId());
        $this->assertEquals('Project Name', $project->getName());

        $this->assertEquals(1, count($project->getProjects()));

        $childProjects = $project->getProjects();

        $childProject = array_shift($childProjects);

        $this->assertEquals(10, $childProject->getId());
        $this->assertEquals('Displays 216x384', $childProject->getName());
    }

    public function test_get_project_returns_results()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/project_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getProject('apikey', 9);

        $this->assertEquals(9, $response->getId());
        $this->assertEquals('Project Name', $response->getName());
    }

    public function test_get_project_with_sub_projects_returns_results()
    {
        return;

        // Add this later
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/json/project_success.json')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $api = new Qlite(['client' => $client]);

        $response = $api->getProject('apikey', 9);

        $this->assertEquals(9, $response->getId());
        $this->assertEquals('Project Name', $response->getName());

        $this->assertEquals(1, count($response->getProjects()));

        $childProjects = $response->getProjects();

        $childProject = array_shift($childProjects);

        $this->assertEquals(10, $childProject->getId());
        $this->assertEquals('Displays 216x384', $childProject->getName());
    }
}
