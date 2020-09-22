<?php

namespace App\Tests\Form;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\Form\Test\TypeTestCase;

class UserTypeTest extends TypeTestCase
{
    public function testUserForm()
    {
        $formData = [
            'username' => 'TestName',
            'password' => ['first' => 'test', 'second' => 'test'],
            'email' => 'test@email.com',
            'roles' => ['ROLE_ADMIN']
        ];

        $model = new User();

        $form = $this->factory->create(UserType::class, $model);

        $expected = new User();
        $expected->setUsername('TestName');
        $expected->setPassword('test');
        $expected->setEmail('test@email.com');
        $expected->setRoles(['ROLE_ADMIN']);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($expected, $model);
    }
}
