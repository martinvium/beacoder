<?php
namespace ActOne\Location;

use BAC\BaseLocation;

use ActOne\Quest\FindYourFather;
use ActOne\Quest\GetOutOfTheBarn;
use ActOne\Object\LockedDoor;
use ActOne\Object\IronRod;

class StartingBarn extends BaseLocation
{
    /**
     * You are all alone, locked in a dark room. It's a big room and the smell of manueur hangs
     * heavily in the air. You remember now. There where three men. They kicked down the door last
     * night, when your father and you were sleeping. They burned everything down...
     * 
     * But where is dad? Did they take him? Is he here now?!
     * 
     * @return Quest\FindYourFather
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
        return new LockedDoor();
    }
    
    /**
     * @return IronRod 
     */
    public function anIronRod()
    {
        return new IronRod();
    }
}