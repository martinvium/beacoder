<?php
require_once(__DIR__ . '/bootstrap.php');

use BAC\GameTestCase;
use BAC\Game;
use BAC\Player;
use BAC\Profile;

class ActOneTest extends GameTestCase
{
    /**
     * @var Game
     */
    private $game;
    
    /**
     * @var Player
     */
    private $kilorf;
    
    private $qFindYourFather;
    
    public function setUp()
    {
        parent::setUp();
        
        $myProfile = new Profile();
        $myProfile->setName('Martin Vium');
        $myProfile->setEmail('martin.vium@gmail.com');

        $this->kilorf = BAC\Player::NewPlayer('Kilorf', $myProfile);
        $this->game = BAC\Game::NewGame($this->kilorf);
    }
    
    public function testEscapeBarn()
    {
        $lStartingBarn = $this->game->getStartingLocation();
        $this->qFindYourFather = $lStartingBarn->beginQuestToFindYourFather();
        $qGetOutOfHere = $lStartingBarn->beginQuestToGetOutOfHere();
        $this->kilorf->hit($lStartingBarn->anIronRod(), $lStartingBarn->aLockedDoor());
        $newLocation = $this->kilorf->move($lStartingBarn->aLockedDoor());
        $qGetOutOfHere->setNewLocation($newLocation);
        $qGetOutOfHere->complete();
    }
}