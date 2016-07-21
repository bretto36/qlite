<?php

namespace Qlite\Api\Project;

class Projects
{
    protected $json;

    protected $projects;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getProjects()
    {
        // Create an array of project objects
        if (null === $this->projects) {
            $this->projects = [];
            foreach ($this->json->projects as $projectJson) {
                $this->projects[] = new Project($projectJson);
            }
        }
        return $this->projects;
    }
}