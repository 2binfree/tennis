<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 27/06/17
 * Time: 15:34
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Player;


class LoadPlayerData implements FixtureInterface
{

    /**
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $players = [
            [
                'Firstname' => 'Rafael',
                'Lastname' => 'Nadal',
                'gender' => 'M',
                'winMatches' => 0,
                'daysAfterLastMatch' => mt_rand(1, 10),
            ],
            [
                'Firstname' => 'Andy',
                'Lastname' => 'Murray',
                'gender' => 'M',
                'winMatches' => 0,
                'daysAfterLastMatch' => mt_rand(1, 10),
            ],
            [
                'Firstname' => 'Maria',
                'Lastname' => 'Sharapova',
                'gender' => 'F',
                'winMatches' => 0,
                'daysAfterLastMatch' => mt_rand(1, 10),
            ],
            [
                'Firstname' => 'Janine',
                'Lastname' => 'Mauresmo',
                'gender' => 'F',
                'winMatches' => 0,
                'daysAfterLastMatch' => mt_rand(1, 10),
            ],
        ];

        foreach($players as $p) {
            $player = new Player();
            $player->setFirstname($p['Firstname']);
            $player->setLastname($p['Lastname']);
            $player->setGender($p['gender']);
            $player->setWinMatches($p['winMatches']);
            $player->setDaysAfterLastMatch($p['daysAfterLastMatch']);
            $manager->persist($player);
        }
        $manager->flush();
    }
}
