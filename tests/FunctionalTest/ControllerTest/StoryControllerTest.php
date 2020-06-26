<?php

namespace Tests\FunctionalTest\ControllerTest;

use App\Entity\Story;
use http\Env;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManager;

class StoryControllerTest extends WebTestCase
{
    /**
     * @var Story
     */
    private $firstStory;

    /**
     * @var
     */
    private $accessToken;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function setUp()
    {
        parent::setUp();

        $this->firstStory = $this->entityManager->getRepository(Story::class)->findAll()[0];
        $client = static::createClient();
        $this->accessToken = $client->request('POST', '/login', [
            'username' => getenv('FIXTURES_USER_USERNAME'),
            'password' => getenv('FIXTURES_USER_USERNAME')
        ]);

    }

    public function testCanGet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/stories/' . $this->firstStory->getId());

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame($this->firstStory->getTitle(), $client->getResponse()->getContent());
    }

    public function testGetAll()
    {

    }

    public function testPostNew()
    {

    }

    public function testUpdate()
    {

    }

    public function testDelete()
    {

    }
}
