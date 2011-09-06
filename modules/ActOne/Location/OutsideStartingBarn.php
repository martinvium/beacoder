<?php
namespace ActOne\Location;

use BAC\BaseLocation;
use BAC\Game;

use ActOne\Object\StrangePerson;
use ActOne\Object\StrangeLetter;
use ActOne\Location\SmallCity;

class OutsideStartingBarn extends BaseLocation
{
    private $strangePerson;
    
    public function __construct(Game $game, StartingBarn $barn)
    {
        parent::__construct($game);
    }
    
    /**
     * What is that? In the dark of night, you can see someone standing, looking...
     * 
     * @return StrangePerson
     */
    public function aStrangePerson()
    {
        if(! $this->strangePerson) {
            $this->strangePerson = new StrangePerson();
        }
        
        return $this->strangePerson;
    }
    
    public function rideHorseToDestination(StrangeLetter $letter)
    {
        return new SmallCity($this->getGame(), $this);
    }
}