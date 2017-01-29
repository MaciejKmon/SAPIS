<?php

namespace Entity;

class Comment
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
     * @var Story
     */
    private $story;

    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $createdAt;

    public function __construct(User $author, Story $story, string $body)
    {
        $this->author = $author;
        $this->story = $story;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getId(): id
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @return Story
     */
    public function getStory(): Story
    {
        return $this->story;
    }
}
