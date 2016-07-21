<?php

namespace Qlite\Api\LibraryItem;

use Qlite\Api\AbstractResponse;

class GetResponse extends AbstractResponse
{
    public function getObject()
    {
        return new LibraryItem(json_decode($this->getResponse())->libraryitem);
    }
}