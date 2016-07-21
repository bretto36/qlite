<?php

namespace Qlite\Api\Project;

class Project
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

            if (isset($this->json->projects)) {
                foreach ($this->json->projects as $json) {
                    $this->projects[] = new Project($json);
                }
            }
        }
        return $this->projects;
    }

    public function getId()
    {
        return $this->json->id;
    }

    public function getName()
    {
        return $this->json->name;
    }
}