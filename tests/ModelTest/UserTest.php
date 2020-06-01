<?php
namespace Test\ModelTest;

use App\Entity\Comment;
use App\Entity\Profile;
use App\Entity\Story;
use PHPUnit\Framework\TestCase;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserTest extends TestCase
{
    public function testGetSet(UserPasswordEncoderInterface $passwordEncoder)
    {
        $users = [];
        array_push($users, new User('Eoin', 'Eoin23password', 'e@wp.pl'), new User('Nati', 'Natasha78password', 'nati@org.eu'));

        $eoin = $users[0];
        $eoin->setComments([$this->createMock(Comment::class), $this->createMock(Comment::class)]);
        $eoin->setProfile($this->createMock(Profile::class));
        $eoin->setStories([$this->createMock(Story::class)]);

        $nati = $users[1];
        $nati->setComments([$this->createMock(Comment::class), $this->createMock(Comment::class)]);
        $nati->setProfile($this->createMock(Profile::class));
        $nati->setStories([$this->createMock(Story::class)]);

        $this->assertEquals('Eoin',$eoin->getUsername());
        $this->assertNotNull($eoin->getComments());
        $comments = $eoin->getComments();
        $this->assertInstanceOf(Comment::class, $comments[0]);
        $this->assertNotNull($eoin->getProfile());
        $this->assertInstanceOf(Profile::class, $eoin->getProfile());
        $this->assertNotNull($eoin->getStories());
        $stories = $eoin->getStories();
        $this->assertInstanceOf(Story::class, $stories[0]);

        $this->assertEquals('Nati', $nati->getUsername());
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
