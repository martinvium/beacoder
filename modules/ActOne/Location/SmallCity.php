<?php
namespace ActOne\Location;

use BAC\BaseLocation;

class SmallCity extends BaseLocation
{
    public function __construct(Game $game, OutsideStartingBarn $outside)
    {
        parent::__construct($game);
    }
}