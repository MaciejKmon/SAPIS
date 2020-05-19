<?php

namespace App\Tests\FunctionalTest\RepositoryTest;

use App\Entity\User;
use App\Repository\ApiTokenRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\ApiToken;

class ApiTokenRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $user;
    private $apiToken;

    protected function setUp()
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->user = $this->entityManager->getRepository(User::class)->findAll()[0];
        $this->apiToken = new ApiToken($this->user);

        $this->entityManager->persist($this->apiToken);
        $this->entityManager->flush();

        $currentDate = new \DateTime();

        if ($currentDate >= $this->apiToken->getExpiresAt()) {
            $this->fail('Text impossible to evaluate due to entry data being incorrect');
        }
    }

    public function testFindValidToken()
    {
        $returnedApiToken = $this->entityManager->getRepository(ApiToken::class)->findValidToken($this->apiToken->getToken());


        self::assertInstanceOf(ApiToken::class, $returnedApiToken);
    }

    protected function tearDown()
    {
        parent::tearDown();

        $entityToDelete = $this->entityManager->merge($this->apiToken);
        $this->entityManager->remove($entityToDelete);
        $this->entityManager->flush();
    }
}
