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

        $currentDate = new \DateTime();

        if ($currentDate >= $this->apiToken->getExpiresAt()) {
            $this->fail('Text impossible to evaluate due to entry data being incorrect');
        }
    }

    public function testFindValidToken()
    {
        $currentDate = new \DateTime();
        $returnedApiToken = $this->entityManager->getRepository(ApiToken::class)->findValidToken($this->apiToken->getToken());
    }
}
