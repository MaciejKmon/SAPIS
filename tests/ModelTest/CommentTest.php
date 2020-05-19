<?php
namespace Test\ModelTest;

use App\Entity\Comment;
use App\Entity\Story;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    public function testGetSet()
    {
        $comment = new Comment($this->createMock(User::class), $this->createMock(Story::class), 'Comment especially written for this story');

        $this->assertEquals('Comment especially written for this story', $comment->getBody());
        $comment->setBody('Comment Edited');
        $this->assertEquals('Comment Edited', $comment->getBody());
        $this->assertInstanceOf(User::class, $comment->getAuthor());
        $this->assertInstanceOf(Story::class, $comment->getStory());
    }
}
