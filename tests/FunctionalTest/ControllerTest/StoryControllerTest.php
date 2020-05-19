<?php

namespace Tests\FunctionalTest\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StoryControllerTest extends WebTestCase
{
    const STORY_ID = 1;
    public function testCanGet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/stories/' . self::STORY_ID);

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('Hello World', $crawler->filter('h1')->text());
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
