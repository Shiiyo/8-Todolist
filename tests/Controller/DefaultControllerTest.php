<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndexPage()
    {
        $client = static::createClient([], []);
        $client->request('GET', '/');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}