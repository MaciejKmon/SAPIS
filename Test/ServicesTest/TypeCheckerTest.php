<?php
namespace Test\ServicesTest;

use src\Services\TypeChecker;

class TypeCheckerTest extends \PHPUnit_Framework_TestCase
{
    public function testIsOfType()
    {
        $correctData = [new \DateTime(), new \DateTime(), new \DateTime()];
        $this->assertTrue(TypeChecker::isOfType(\DateTime::class, $correctData));
        $incorrectParameter = 'string';
        $this->assertInstanceOf(\InvalidArgumentException::class, TypeChecker::isOfType(\DateTime::class, $incorrectParameter));
        $incorrectData = [new \DateTime(), new \HttpRequest(), new \DateTime()];
        $this->assertFalse(TypeChecker::isOfType(\DateTime::class));
    }
}
