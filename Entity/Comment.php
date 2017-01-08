<?php
/**
 * Created by PhpStorm.
 * User: maciej
 * Date: 08/01/17
 * Time: 17:39
 */

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