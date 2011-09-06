<?php
namespace ActOne\Object;

use BAC\Trait\Forcible;
use BAC\Trait\HeavyObject;

class LockedDoor implements Forcible
{
    private $forced = false;
    
    public function forceWith(HeavyObject $object)
    {
        $this->forced = true;
    }
    
    public function isForced()
    {
        return $this->forced;
    }
}