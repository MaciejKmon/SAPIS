<?php
namespace Entity;

class Score
{
    /**
     * @var int
     */
    private $id;

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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return Story
     */
    public function getStory(): Story
    {
        return $this->story;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    /**
     * @return User
     */
    public function getVoter(): User
    {
        return $this->voter;
    }
}
