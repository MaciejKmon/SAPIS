<?php
namespace ModelTest;

use App\Entity\Profile;
use App\Entity\Score;
use App\Entity\Story;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase
{
    public function testEntity()
    {
        $story = new Story($this->createMock(User::class), 'Example story context', 'Full Title', "EoinSome@gmailer.com");
        $eoin = new User('Eoin', 'Eoin23password', 'x@gmail.cmm');
        $score = new Score(7, $story, $eoin);
        $this->assertEquals(7, $score->getScore());
        $score->setScore(5);
        $this->assertEquals(5, $score->getScore());
        $this->assertInstanceOf(Story::class, $score->getStory());
        $this->assertInstanceOf(User::class, $score->getVoter());
    }
}
