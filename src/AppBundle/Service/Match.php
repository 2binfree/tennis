<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 27/06/17
 * Time: 16:03
 */

namespace AppBundle\Service;


use AppBundle\Entity\Player;

class Match
{
    /**
     * @var array Player
     */
    private $players;

    /**
     * @var Player
     */
    private $winner;

    /**
     * @var int
     */
    private $maxSet;

    /**
     * Match constructor.
     * @param Player $player1
     * @param Player $player2
     * @throws \Exception
     */
    public function __construct($player1, $player2)
    {
        $this->players = [
            1 => $player1,
            2 => $player2,
        ];
        $this->winner = null;
        if ($player1->getGender() == "M" && $player2->getGender() == "M"){
            $this->maxSet = 3;
        } elseif ($player1->getGender() == "F" && $player2->getGender() == "F"){
            $this->maxSet = 2;
        } else {
            throw new \Exception('Not possible');
        }
    }

    /**
     * @param $number
     * @return Player
     */
    public function getPlayer($number)
    {
        return $this->players[$number];
    }

    /**
     * @return Player
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @param Player $winner
     * @return Match
     */
    public function setWinner(Player $winner): Match
    {
        $this->winner = $winner;
        return $this;
    }

    public function getScore()
    {
        $p1 = $this->getPlayer(1);
        $p2 = $this->getPlayer(2);
        $sets = $p1->getSet() . "/" . $p2->getSet();
        $games = $p1->getGame() . "/" . $p2->getGame();
        $points = $p1->getPoint() . "/" . $p2->getPoint();

        return $sets . " - " . $games . " - " . $points;
    }

    public function addPoint(Player $player): void
    {
        $player->addPoint();
        $p1 = $this->getPlayer(1);
        $p2 = $this->getPlayer(2);
        if($p1->getPoint() > 3 && $p1->getPoint() - $p2->getPoint() >= 2){
            $p1->addGame();
            $p2->resetPoint();
        } elseif($p2->getPoint() > 3 && $p2->getPoint() - $p1->getPoint() >= 2){
            $p2->addGame();
            $p1->resetPoint();
        }
        if($p1->getGame() > 5 && $p1->getGame() - $p2->getGame() >= 2){
            $p1->addSet();
            $p2->resetGame();
            $p2->resetPoint();

        } elseif($p2->getGame() > 5 && $p2->getGame() - $p1->getGame() >= 2){
            $p2->addSet();
            $p1->resetGame();
            $p1->resetPoint();
        }
        if($p1->getSet() === $this->maxSet){
            $this->setWinner($p1);
        } elseif($p2->getSet() === $this->maxSet){
            $this->setWinner($p2);
        }
    }

    public function addGame(Player $player): void
    {
        $player->addGame();
        $p1 = $this->getPlayer(1);
        $p2 = $this->getPlayer(2);
        if($p1->getGame() > 5 && $p1->getGame() - $p2->getGame() >= 2){
            $p1->addSet();
            $p2->resetGame();
        } elseif($p2->getGame() > 5 && $p2->getGame() - $p1->getGame() >= 2){
            $p2->addSet();
            $p1->resetGame();
        }
    }
    public function addPlayer(Player $player)
    {

    }
}