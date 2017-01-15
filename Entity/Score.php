<?php

namespace Entity;

class Score
{
    /**
     * @var int
     */
    private $score;

    /**
     * @var Story
     */
    private $story;

    /**
     * @var User
     */
    private $voter;

    public function __construct($score, Story $story, User $voter)
    {
        $this->score = $score;
        $this->story = $story;
        $this->voter = $voter;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return Story
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return User
     */
    public function getVoter()
    {
        return $this->voter;
    }
}
