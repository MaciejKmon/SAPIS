<?php

namespace Entity;

class Comment
{
    /**
     * @var User
     */
    private $author;

    /**
     * @var Story
     */
    private $story;

    public function __construct(User $author, Story $story)
    {
        $this->author = $author;
        $this->story = $story;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return Story
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * @param Story $story
     */
    public function setStory($story)
    {
        $this->story = $story;
    }


}