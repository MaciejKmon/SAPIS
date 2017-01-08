<?php
/**
 * Created by PhpStorm.
 * User: maciej
 * Date: 08/01/17
 * Time: 17:38
 */

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