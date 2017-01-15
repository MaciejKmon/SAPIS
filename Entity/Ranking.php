<?php

namespace Entity;

class Ranking
{
    /**
     * @var Score[]
     */
    private $scores;

    /**
     * @var Score
     */
    private $topScore;

    /**
     * @return Score[]
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * @param Score[] $scores
     */
    public function setScores($scores)
    {
        $this->scores = $scores;
    }

    /**
     * @return Score
     */
    public function getTopScore()
    {
        return $this->topScore;
    }

    /**
     * @param Score $topScore
     */
    public function setTopScore($topScore)
    {
        $this->topScore = $topScore;
    }



}