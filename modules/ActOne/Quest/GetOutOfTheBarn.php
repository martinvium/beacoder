<?php
namespace ActOne\Quest;

use BAC\Game;
use BAC\BaseQuest;
use ActOne\Location\StartingBarn;

class GetOutOfTheBarn extends BaseQuest
{
    private $startingBarn;
    
    public function __construct(Game $game, StartingBarn $startingBarn)
    {
        parent::__construct($game);
        $this->startingBarn = $startingBarn;
    }
    
    public function verify()
    {
        if($this->getPlayerLocation() && ! $this->getPlayerLocation() instanceof StartingBarn) {
            return true;
        } else {
            return false;
        }
    }
    
    protected function objectivesAsString()
    {
        return 'you are still in the barn';
    }
}