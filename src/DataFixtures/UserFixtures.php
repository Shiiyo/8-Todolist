<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i=0; $i < 5; $i++) {
            $user = new User;
            $user->setUsername($faker->username());
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
            $user->setEmail($faker->email());

            $manager->persist($user);
        }

        //Admin for Tests
        $user = new User;
        $user->setUsername('Shiyo');
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        $user->setEmail($faker->email());

        $manager->persist($user);

    }
}
