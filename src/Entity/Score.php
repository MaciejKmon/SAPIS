<?php
namespace Entity;

class Score
{
    const MAX_SCORE = 10;
    const MIN_SCORE = 0;
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

    public function __construct(int $score, Story $story, User $voter)
    {
        $this->setScore($score);
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
        if ($score >= self::MIN_SCORE && $score <= self::MAX_SCORE) {
            $this->score = $score;
            return;
        }

        return new \Exception('Invalid Score', 400);
    }

    /**
     * @return User
     */
    public function getVoter(): User
    {
        return $this->voter;
    }
}
