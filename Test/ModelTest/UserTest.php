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

    public function testGetUsers(): void
    {
        //For some reason I can't use this to get assertions
        $this->createFixtures();

        $eoin = $this->users[0];
        TestCase::assertEquals(1, $eoin->getId());
        TestCase::assertEquals('Eoin',$eoin->getUsername());
        TestCase::assertEquals(md5('Eoin23password'), $eoin->getPassword());
    }

    private function createFixtures()
    {
        $users = [];
        $eoin = new User('Eoin', 'Eoin23password');
        $natasha = new User('Nati', 'Natasha78password');
        array_push($users, $eoin, $natasha);
        $this->users = $users;
    }
}
