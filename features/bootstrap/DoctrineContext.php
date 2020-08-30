<?php

use Behat\Behat\Context\Context;
use App\DataFixtures\AppFixtures;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DoctrineContext implements Context
{
    private $entityManager;
    private $passwordEncoder;

    /**
     * DoctrineContext constructor.
     *
     * @param EntityManagerInterface       $entityManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @BeforeScenario
     *
     * @throws ToolsException
     */
    public function initDatabase()
    {
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->dropSchema($this->entityManager->getMetadataFactory()->getAllMetadata());
        $schemaTool->createSchema($this->entityManager->getMetadataFactory()->getAllMetadata());
        $this->loadFixtures();
    }

    protected function loadFixtures()
    {
        $appFixture = new AppFixtures($this->passwordEncoder);
        $appFixture->load($this->entityManager);
    }
}
