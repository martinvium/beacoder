<?php
require_once(__DIR__ . '/bootstrap.php');

use BAC\GameTestCase;
use BAC\Game;
use BAC\Player;
use BAC\Profile;

use ActOne\Location\OutsideStartingBarn;
use ActOne\Location\SmallCity;

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
    
    private $iIronRod;
    private $iStrangeLetter;
    
    public function setUp()
    {
        parent::setUp();
        
        $myProfile = new Profile();
        $myProfile->setName('Martin Vium');
        $myProfile->setEmail('martin.vium@gmail.com');

        $this->kilorf = BAC\Player::NewPlayer('Kilorf', $myProfile);
        $this->game = BAC\Game::NewGame($this->kilorf);
    }
    
    /**
     * @test
     */
    public function chapterOne()
    {
        $lStartingBarn = $this->game->getStartingLocation();
        $this->qFindYourFather = $lStartingBarn->beginQuestToFindYourFather();
        
        $qGetOutOfHere = $lStartingBarn->beginQuestToGetOutOfHere();
        
        $this->iIronRod = $lStartingBarn->anIronRod();
        $lStartingBarn->aLockedDoor()->forceWith($this->iIronRod);
        $lOutside = $lStartingBarn->walkThroughTheDoor($this->kilorf);
        
        $qGetOutOfHere->complete();
        return $lOutside;
    }
    
    /**
     * @test
     * @depends chapterOne
     */
    public function chapterTwo(OutsideStartingBarn $lOutside)
    {
        throw new Exception('how do we prevent phpunit from cleaning class scope? or how do we move state e.g. player, game and items between cases');
        
        // option a 
        $aPerson = $lOutside->aStrangePerson();
        $aPerson->approachThreateningly();
        $aPerson->forceWith($this->iIronRod);
        
        // option b
        $aPerson->approachKindly();
        $aPerson->giveGold(5);
        
        $this->iStrangeLetter = $aPerson->takeLetter();
        $lCity = $lOutside->rideHorseToDestination($this->iStrangeLetter);
        return $lCity;
    }
    
    /**
     * @test
     * @depends chapterTwo
     */
    public function chapterThree(SmallCity $lSmallCity)
    {
        
    }
}