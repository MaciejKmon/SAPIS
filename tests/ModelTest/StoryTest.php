<?php
namespace Test\ModelTest;

use App\Entity\Comment;
use App\Entity\Score;
use App\Entity\Story;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class StoryTest extends TestCase
{
    public function testGetSet()
    {
        $body = 'Sample story body';
        $sampleStory = new Story($this->createMock(User::class), $body, 'Sample Title');
        $sampleStory->setScores([new Score(4, $sampleStory, $this->createMock(User::class)), new Score(7, $sampleStory, $this->createMock(User::class))]);
        $sampleStory->setComments([new Comment($this->createMock(User::class), $sampleStory, 'Comment1')]);

        $this->assertNotNull($sampleStory->getAuthor());
        $this->assertSame( $body, $sampleStory->getBody());
        $this->assertSame('Sample Title', $sampleStory->getTitle());
        $this->assertSame(4, $sampleStory->getScores()[0]->getScore());
        $this->assertSame(7, $sampleStory->getScores()[1]->getScore());
        $this->assertSame($sampleStory, $sampleStory->getScores()[0]->getStory());
        $this->assertSame($sampleStory, $sampleStory->getScores()[1]->getStory());
        $this->assertSame('Comment1', $sampleStory->getComments()[0]->getBody());
        $this->assertSame($sampleStory, $sampleStory->getComments()[0]->getStory());

    }
}
