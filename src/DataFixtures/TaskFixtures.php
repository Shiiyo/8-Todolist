<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TaskFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        $users = $manager->getRepository('App\Entity\User')->findAll();
        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                $task = new Task;
                $task->setUser($user);
                $task->setCreatedAt(new \DateTime());
                $task->setTitle($faker->words(3, true));
                $task->setContent($faker->paragraph());
                $task->setIsDone($faker->boolean());

                $manager->persist($task);
            }
        }

        //Create Task with Anonymous User
        for ($i=0; $i < 2; $i++) {
            $task->setUser(null);
            $task->setCreatedAt(new \DateTime());
            $task->setTitle($faker->sentence());
            $task->setContent($faker->paragraph());
            $task->setIsDone($faker->boolean());

            $manager->persist($task);
        }
    }
}
