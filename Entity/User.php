<?php

namespace Entity;

class User
{
    /**
     * @var Story[]
     */
    private $stories;

    /**
     * @var Comment[]
     */
    private $comments;

    /**
     * @return Story[]
     */
    public function getStories()
    {
        return $this->stories;
    }

    /**
     * @param Story[] $stories
     */
    public function setStories($stories)
    {
        $this->stories = $stories;
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