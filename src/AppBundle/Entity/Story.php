<?php
declare(strict_types=1);
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Score;

/**
 * @ORM\Entity()
 * @ORM\Table(name="story")
 */
class Story
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="authorId", referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="story")
     */
    private $scores;

    /**
     * @var Comment[]
     */
    private $comments;

    public function __construct(User $author, string $body, string $title)
    {
        $this->author = $author;
        $this->setBody($body);
        $this->setTitle($title);
        $this->setScores([]);
        $this->setComments([]);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @return Score[]
     */
    public function getScores(): array
    {
        return $this->scores;
    }

    /**
     * @param Score $scores[]
     */
    public function setScores(array $scores)
    {
        $this->scores = $scores;
    }

    /**
     * @return Comment[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param Comment[] $comments
     */
    public function setComments(array $comments)
    {
        $this->comments = $comments;
    }
}
