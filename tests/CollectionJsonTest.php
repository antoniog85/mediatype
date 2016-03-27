<?php

namespace Antoniog85\MediaType;

class CollectionJsonTest extends \PHPUnit_Framework_TestCase
{
    public function testSetVersion()
    {
        $collectionJson = new CollectionJson();
        $collectionJson->setVersion('test');
        
    }
}