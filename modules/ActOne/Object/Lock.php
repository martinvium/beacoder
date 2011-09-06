<?php
namespace ActOne\Object;

use BAC\Trait\Forcible;

class Lock implements Forcible
{
    private $forced = false;
    
    public function force()
    {
        $this->forced = true;
    }
}