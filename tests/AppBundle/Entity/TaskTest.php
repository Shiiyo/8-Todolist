<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private $task;

    public function setUp()
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

    public function testIsNotDone()
    {
        $this->assertSame(false, $this->task->isDone());
    }

    public function testIsDone()
    {
        $this->task->toggle(true);
        $this->assertSame(true, $this->task->isDone());
    }
}