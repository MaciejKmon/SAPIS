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
    /**
     * @var User
     */
    private $user1;
    /**
     * @var User
     */
    private $user2;

    public function setUp()
    {
        $this->users = [];
        array_push($this->users, new User('Eoin', 'Eoin23password'), new User('Nati', 'Natasha78password'));
        $this->user1 = $this->users[0];
        $this->user2 = $this->users[1];
    }

    public function testSetUsers()
    {
        $eoin = $this->user1;
        $eoin->setComments([$this->createMock(Comment::class), $this->createMock(Comment::class)]);
        $eoin->setProfile($this->createMock(Profile::class));
        $eoin->setStories([$this->createMock(Story::class)]);

        $nati = $this->user2;
        $nati->setComments([$this->createMock(Comment::class), $this->createMock(Comment::class)]);
        $nati->setProfile($this->createMock(Profile::class));
        $nati->setStories([$this->createMock(Story::class)]);
    }

    public function testGetUsers()
    {
        //For some reason I can't use this to get assertions
        $eoin = $this->user1;
//        TestCase::assertEquals(1, $eoin->getId());
        TestCase::assertEquals('Eoin',$eoin->getUsername());
        TestCase::assertEquals(md5('Eoin23password'), $eoin->getPassword());
        TestCase::assertNotNull($eoin->getComments());
        TestCase::assertInstanceOf(Comment::class, $eoin->getComments(0));
        TestCase::assertNotNull($eoin->getProfile());
        TestCase::assertInstanceOf(Profile::class, $eoin->getProfile());
        TestCase::assertNotNull($eoin->getStories());
        TestCase::assertInstanceOf(Story::class, $eoin->getStories(0));


        $nati = $this->user2;
//        TestCase::assertEquals(2, $nati->getId());
        TestCase::assertEquals('Nati', $nati->getUsername());
        TestCase::assertEquals(md5('Natasha78password'), $nati->getPassword());
        TestCase::assertNotNull($nati->getComments());
        TestCase::assertInstanceOf(Comment::class, $nati->getComments(0));
        TestCase::assertNotNull($nati->getProfile());
        TestCase::assertInstanceOf(Profile::class, $nati->getProfile());
        TestCase::assertNotNull($nati->getStories());
        TestCase::assertInstanceOf(Story::class, $nati->getStories(0));

    }
}
