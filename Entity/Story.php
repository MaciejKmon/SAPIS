<?php
/**
 * Created by PhpStorm.
 * User: maciej
 * Date: 08/01/17
 * Time: 17:38
 */

namespace Entity;

class Story
{
    /**
     * @var User
     */
    private $author;

    /**
     * @var Score
     */
    private $score;

    /**
     * @var Comment[]
     */
    private $comments;

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Score
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param Score $score
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