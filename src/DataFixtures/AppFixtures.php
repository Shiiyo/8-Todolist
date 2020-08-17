<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        //Create Users
        $userFixture = new UserFixtures($this->passwordEncoder);
        $userFixture->load($manager);
        $manager->flush();

        //Create Tasks
        $mobileFixture = new TaskFixtures();
        $mobileFixture->load($manager);

        $manager->flush();
    }
}
