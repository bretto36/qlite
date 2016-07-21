<?php

namespace Qlite\Api\Player;

class Players
{
    public $json;

    public $players;

    public function __construct($jsonObject = null)
    {
        $this->json = $jsonObject;
    }

    public function getPlayers()
    {
        // Create an array of project objects
        if (null === $this->players) {
            $this->players = [];
            foreach ($this->json->players as $playerJson) {
                $this->players[] = new Player($playerJson);
            }
        }
        return $this->players;
    }
}