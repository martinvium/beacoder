<?php
namespace ActOne\Quest;

use BAC\Game;
use BAC\BaseQuest;
use BAC\Module\ActOne\Location\StartingBarn;

class FindYourFather extends BaseQuest
{
    private $startingBarn;
    
    public function __construct(Game $game, StartingBarn $startingBarn)
    {
        parent::BaseQuest($game);
        $this->startingBarn = $startingBarn;
    }
    
    public function setFather(Father $npc)
    {
        $this->father = $npc;
    }
    
    public function verify()
    {
        if($this->father) {
            return true;
        }
        
        return false;
    }
}