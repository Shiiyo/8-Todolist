<?php 

namespace App\Tests\Form;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Component\Form\Test\TypeTestCase;

class TaskTypeTest extends TypeTestCase
{
    public function testTaskForm()
    {
        $formData = [
            'title' => 'Test title',
            'content' => 'Test content'
        ];

        $model = new Task();

        $form = $this->factory->create(TaskType::class, $model);

        $expected = new Task();
        $expected->setContent('Test content');
        $expected->setTitle('Test title');

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());

        $this->assertEquals($expected, $model);
    }
}