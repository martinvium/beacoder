<?php
require_once(__DIR__ . '/bootstrap.php');

use BAC\GameTestCase;
use BAC\Game;
use BAC\Player;
use BAC\Profile;

use ActOne\Location\OutsideStartingBarn;

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
    
    /**
     * @test
     */
    public function chapterOne()
    {
        $lStartingBarn = $this->game->getStartingLocation();
        $this->qFindYourFather = $lStartingBarn->beginQuestToFindYourFather();
        
        $qGetOutOfHere = $lStartingBarn->beginQuestToGetOutOfHere();
        $lStartingBarn->aLockedDoor()->forceWith($lStartingBarn->anIronRod());
        $lOutside = $lStartingBarn->walkThroughTheDoor($this->kilorf);
        $qGetOutOfHere->complete();
        
        return $lOutside;
    }
    
    /**
     * @test
     * @depends escapeTheStartingBarn
     */
    public function chapterTwo(OutsideStartingBarn $lOutside)
    {
        
    }
}