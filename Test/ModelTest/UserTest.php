<?php

namespace Test\ModelTest;

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

    public function setUp(): void
    {
        $eoin = new User('Eoin', 'Eoin23password');
        $natasha = new User('Nati', 'Natasha78password');
        array_push($this->users, $eoin, $natasha);
    }

    public function testSetUsers(): void
    {

    }

    public function testGetUsers(): void
    {
        //For some reason I can't use this to get assertions
        $eoin = $this->users[0];
        TestCase::assertEquals(1, $eoin->getId());
        TestCase::assertEquals('Eoin',$eoin->getUsername());
        TestCase::assertEquals(md5('Eoin23password'), $eoin->getPassword());

        $nati = $this->users[1];
        TestCase::assertEquals(2, $nati->getId());
        TestCase::assertEquals('Nati', $nati->getUsername());
        TestCase::assertEquals(md5('Natasha78password'), $nati->getPassword());
    }
}
