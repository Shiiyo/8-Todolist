<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private $task;

    protected function setUp(): void
    {
        $this->task = new Task();
    }

    public function testCratedAt()
    {
        $date = new \DateTime();
        $this->task->setCreatedAt($date);
        $this->assertSame($date, $this->task->getCreatedAt());
    }

    public function testTitle()
    {
        $this->task->setTitle('Test');
        $this->assertSame('Test', $this->task->getTitle());
    }

    public function testContent()
    {
        $this->task->setContent('Test');
        $this->assertSame('Test', $this->task->getContent());
    }

    public function testIsDone()
    {
        $this->task->setIsDone(true);
        $this->assertSame(true, $this->task->getIsDone());
    }

    public function testUser()
    {
        $user = new User;
        $this->task->setUser($user);
        $this->assertSame($user, $this->task->getUser());
    }
}