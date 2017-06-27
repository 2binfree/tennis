<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="winMatches", type="integer")
     */
    private $winMatches;

    /**
     * @var int
     *
     * @ORM\Column(name="daysAfterLastMatch", type="integer")
     */
    private $daysAfterLastMatch;

    /**
     * @var int
     */
    private $set;

    /**
     * @var int
     */
    private $game;

    /**
     * @var int
     */
    private $point;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Player
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Player
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Player
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set winMatches
     *
     * @param integer $winMatches
     *
     * @return Player
     */
    public function setWinMatches($winMatches)
    {
        $this->winMatches = $winMatches;

        return $this;
    }

    /**
     * Get winMatches
     *
     * @return int
     */
    public function getWinMatches()
    {
        return $this->winMatches;
    }

    /**
     * Set daysAfterLastMatch
     *
     * @param integer $daysAfterLastMatch
     *
     * @return Player
     */
    public function setDaysAfterLastMatch($daysAfterLastMatch)
    {
        $this->daysAfterLastMatch = $daysAfterLastMatch;

        return $this;
    }

    /**
     * Get daysAfterLastMatch
     *
     * @return int
     */
    public function getDaysAfterLastMatch()
    {
        return $this->daysAfterLastMatch;
    }

    /**
     * @return int
     */
    public function getSet()
    {
        return $this->set;
    }

    /**
     * @param int $set
     * @return Player
     */
    public function setSet($set)
    {
        $this->set = $set;
        return $this;
    }

    /**
     * @return int
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param int $game
     * @return Player
     */
    public function setGame($game)
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param int $point
     * @return Player
     */
    public function setPoint($point)
    {
        $this->point = $point;
        return $this;
    }
    public function addPoint()
    {
        $this->point++;
    }

    public function addSet()
    {
        $this->set++;
        $this->resetGame();
    }

    public function addGame()
    {
        $this->game++;
        $this->resetPoint();
    }

    public function resetPoint()
    {
        $this->point = 0;
    }

    public function resetGame()
    {
        $this->game = 0;
    }

}
