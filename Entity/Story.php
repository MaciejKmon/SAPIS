<?php

namespace Entity;

class Story
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $author;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Score[]
     */
    private $score;

    /**
     * @var Comment[]
     */
    private $comments;

    public function __construct(User $author, $body, $title)
    {
        $this->author = $author;
        $this->body = $body;
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return Score[]
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param Score $score[]
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment[] $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}
