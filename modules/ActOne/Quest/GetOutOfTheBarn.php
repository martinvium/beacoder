<?php
namespace ActOne\Quest;

use BAC\Game;
use BAC\BaseQuest;
use ActOne\Location\StartingBarn;
use BAC\Location;

class GetOutOfTheBarn extends BaseQuest
{
    private $startingBarn;
    
    private $newLocation;
    
    public function __construct(Game $game, StartingBarn $startingBarn)
    {
        parent::BaseQuest($game);
        $this->startingBarn = $startingBarn;
    }
    
    public function setNewLocation(Location $loc)
    {
        $this->newLocation = $loc;
    }
    
    public function verify()
    {
        if($this->newLocation && ! $this->newLocation instanceof StartingBarn) {
            return true;
        } else {
            return false;
        }
    }
    
    protected function objectivesAsString()
    {
        return '';
    }
}