<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
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
        $this->client->request('GET', '/tasks');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCompletedTaskListPage()
    {
        $this->client->request('GET', '/tasks/completed');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreatePage()
    {
        $this->client->request('GET', '/tasks/create');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreatePageSubmitForm()
    {
        $crawler = $this->client->request('GET', '/tasks/create');

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'Titre test';
        $form['task[content]'] = 'Contenu test';
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();
        $this->assertSame(1, $crawler->filter('div.alert.alert-success')->count());
    }

    public function testEditPage()
    {
        $this->client->request('GET', '/tasks/1/edit');

        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testEditPageSubmitPage()
    {
        $crawler = $this->client->request('GET', '/tasks/1/edit');

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Modification titre test';
        $form['task[content]'] = 'Modification contenu test';
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();
        $this->assertSame(1, $crawler->filter('div.alert.alert-success')->count());
    }

    public function testToggleTask()
    {
        $this->client->request('GET', '/tasks/1/toggle');

        $this->assertSame(302, $this->client->getResponse()->getStatusCode());
    }

    public function testDeleteTask()
    {
        $this->client->request('GET', '/tasks/1/delete');

        $this->assertSame(302, $this->client->getResponse()->getStatusCode());
    }

    public function testDeleteOwnerTask()
    {
        $this->client->request('GET', '/tasks/26/delete');

        $this->assertSame(302, $this->client->getResponse()->getStatusCode());
    }
}