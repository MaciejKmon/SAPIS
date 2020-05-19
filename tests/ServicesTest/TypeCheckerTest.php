<?php
namespace Tests\ServicesTest;

use App\Services\TypeChecker;
use PHPUnit\Framework\TestCase;

class TypeCheckerTest extends TestCase
{
    public function testIsOfType()
    {
        $correctData = [new \DateTime(), new \DateTime(), new \DateTime()];
        $this->assertTrue(TypeChecker::isOfType(\DateTime::class, $correctData));
        $incorrectData = [new \DateTime(), new \stdClass(), new \DateTime()];
        $this->assertFalse(TypeChecker::isOfType(\DateTime::class, $incorrectData));
    }
}
