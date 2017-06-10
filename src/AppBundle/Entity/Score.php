<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="score")
 */
class Score
{
    const MAX_SCORE = 10;
    const MIN_SCORE = 0;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="Story", inversedBy="scores")
     * @ORM\JoinColumn(name="storyId", referencedColumnName="id", onDelete="CASCADE")
     */
    private $story;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="voterId", referencedColumnName="id")
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

        return new \Exception('Invalid Score');
    }

    /**
     * @return User
     */
    public function getVoter(): User
    {
        return $this->voter;
    }
}
