<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testUsername()
    {
        $this->user->setUsername('Test');
        $this->assertSame('Test', $this->user->getUsername());
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

    public function testSalt()
    {
        $this->assertSame(null, $this->user->getSalt());
    }

    public function testRoles()
    {
        $this->assertSame(array('ROLE_USER'), $this->user->getRoles());
    }
}