<?php

namespace Test\ModelTest;

use Entity\Comment;
use Entity\Profile;
use Entity\Story;
use PHPUnit\Framework\TestCase;
use Entity\User;

class UserTest extends TestCase
{
    /**
     * @var User[]
     */
    private $users;

    public function setUp()
    {
        $this->users = [];
        array_push($this->users, new User('Eoin', 'Eoin23password'), new User('Nati', 'Natasha78password'));
    }

    public function testGetSet()
    {
        $eoin = $this->users[0];
        $eoin->setComments([$this->createMock(Comment::class), $this->createMock(Comment::class)]);
        $eoin->setProfile($this->createMock(Profile::class));
        $eoin->setStories([$this->createMock(Story::class)]);

        $nati = $this->users[1];
        $nati->setComments([$this->createMock(Comment::class), $this->createMock(Comment::class)]);
        $nati->setProfile($this->createMock(Profile::class));
        $nati->setStories([$this->createMock(Story::class)]);

        $this->assertEquals('Eoin',$eoin->getUsername());
        $this->assertEquals(md5('Eoin23password'), $eoin->getPassword());
        $this->assertNotNull($eoin->getComments());
        $comments = $eoin->getComments();
        $this->isInstanceOf(Comment::class, $comments[0]);
        $this->assertNotNull($eoin->getProfile());
        $this->assertInstanceOf(Profile::class, $eoin->getProfile());
        $this->assertNotNull($eoin->getStories());
        $stories = $eoin->getStories();
        $this->assertInstanceOf(Story::class, $stories[0]);

        $this->assertEquals('Nati', $nati->getUsername());
        $this->assertEquals(md5('Natasha78password'), $nati->getPassword());
        $this->assertNotNull($nati->getComments());
        $comments = $nati->getComments();
        $this->assertInstanceOf(Comment::class, $comments[0]);
        $this->assertNotNull($nati->getProfile());
        $this->assertInstanceOf(Profile::class, $nati->getProfile());
        $this->assertNotNull($nati->getStories());
        $stories = $nati->getStories();
        $this->assertInstanceOf(Story::class, $stories[0]);
    }
}
