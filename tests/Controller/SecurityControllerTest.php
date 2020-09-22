<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient([], [
            'PHP_AUTH_USER' => 'User',
            'PHP_AUTH_PW' => 'admin'
        ]);
    }

    public function testLoginPage()
    {
        $this->client->request('GET', '/login');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testLogoutCheck()
    {
        $this->client->request('GET', '/logout');

        $this->assertSame(302, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginCheck()
    {
        $this->client->request('GET', '/login_check');
        $this->assertSame(500, $this->client->getResponse()->getStatusCode());
    }
}