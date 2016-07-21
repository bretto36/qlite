<?php

namespace Qlite\Api\LibraryItem;

use Qlite\Api\AbstractResponse;

class ListResponse extends AbstractResponse
{
    public function getObject()
    {
        return new LibraryItems(json_decode($this->getResponse()));
    }
}