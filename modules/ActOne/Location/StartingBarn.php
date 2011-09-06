<?php
namespace ActOne\Location;

use BAC\BaseLocation;

use ActOne\Quest\FindYourFather;
use ActOne\Quest\GetOutOfTheBarn;
use ActOne\Object\LockedDoor;
use ActOne\Object\IronRod;
use BAC\Player;

class StartingBarn extends BaseLocation
{
    private $lockedDoor;
    
    /**
     * You are all alone, locked in a dark room. It's a big room and the smell of manueur hangs
     * heavily in the air. You remember now. There where three men. They kicked down the door last
     * night, when your father and you were sleeping. They burned everything down...
     * 
     * But where is dad? Did they take him? Is he here now?!
     * 
     * @return FindYourFather
     */
    public function beginQuestToFindYourFather()
    {
        return new FindYourFather($this->getGame(), $this);
    }
    
    /**
     * The roof has been smoldering, and is slowly catching on fire. You have to get out of here
     * before things get worse. But how?
     * 
     * @return GetOutOfTheBarn 
     */
    public function beginQuestToGetOutOfHere()
    {
        return new GetOutOfTheBarn($this->getGame(), $this);
    }
    
    /**
     * @return LockedDoor
     */
    public function aLockedDoor()
    {
        if(! $this->lockedDoor) {
            $this->lockedDoor = new LockedDoor();
        }
        
        return $this->lockedDoor;
    }
    
    /**
     * @return IronRod 
     */
    public function anIronRod()
    {
        return new IronRod();
    }
    
    /**
     * @return OutsideStartingBarn 
     */
    public function walkThroughTheDoor(Player $player)
    {
        if(! $this->aLockedDoor()->isForced()) {
            throw new \Exception('door is locked');
        }
        
        $outside = new OutsideStartingBarn($this->getGame());
        $player->setLocation($outside);
        return $outside;
    }
}