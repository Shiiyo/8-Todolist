<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp() :void
    {
        $this->user = new User();
    }

    public function testUsername()
    {
        $this->user->setUsername('Test');
        $this->assertSame('Test', $this->user->getUsername());
    }

    public function testRoles()
    {
        $this->assertSame(array('ROLE_USER'), $this->user->getRoles());
    }

    public function testPassword()
    {
        $this->user->setPassword('Test');
        $this->assertSame('Test', $this->user->getPassword());
    }

    public function testEmail()
    {
        $this->user->setEmail('Test');
        $this->assertSame('Test', $this->user->getEmail());
    }

    public function testAddTask()
    {
        $task = new Task;
        $this->user->addTask($task);
        $this->assertSame($task, $this->user->getTasks()[0]);
    }

    public function testRemoveTask()
    {
        $task = new Task;
        $this->user->addTask($task);
        $this->user->removeTask($task);
        $this->assertSame(null, $this->user->getTasks()[0]);
    }
}
