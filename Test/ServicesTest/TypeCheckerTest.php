<?php
namespace Tests\ServicesTest;

use Services\TypeChecker;
use Entity\TypeChecker as fake;

class TypeCheckerTest extends \PHPUnit_Framework_TestCase
{
    public function testIsOfType()
    {
        $correctData = [new \DateTime(), new \DateTime(), new \DateTime()];
        $this->assertTrue(TypeChecker::isOfType(\DateTime::class, $correctData));
        $incorrectData = [new \DateTime(), new fake(), new \DateTime()];
        $this->assertFalse(TypeChecker::isOfType(\DateTime::class, $incorrectData));
    }
}
