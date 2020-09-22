<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient([], [
            'PHP_AUTH_USER' => 'Shiyo',
            'PHP_AUTH_PW' => 'admin'
        ]);
    }

    public function testListPage()
    {
        $this->client->request('GET', '/users/list');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreatePage()
    {
        $this->client->request('GET', '/users/create');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreatePageSubmitForm()
    {
        $crawler = $this->client->request('GET', '/users/create');

        $form = $crawler->selectButton('Ajouter')->form();

        $form['user[username]'] = 'Test';
        $form['user[password][first]'] = 'mdp';
        $form['user[password][second]'] = 'mdp';
        $form['user[email]'] = 'test@email.fr';
        $form['user[roles]'] = ["ROLE_USER"];

        $this->client->submit($form);
        $crawler = $this->client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-success')->count());
    }

    public function testEditPage()
    {
        $this->client->request('GET', '/users/1/edit');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testEditPageSubmitForm()
    {
        $crawler = $this->client->request('GET', '/users/3/edit');

        $form = $crawler->selectButton('Modifier')->form();

        $form['user[username]'] = 'TestModif';
        $form['user[password][first]'] = 'mdp23';
        $form['user[password][second]'] = 'mdp23';

        $this->client->submit($form);
        $crawler = $this->client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-success')->count());
    }
}