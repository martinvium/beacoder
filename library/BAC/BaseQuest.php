<?php
namespace BAC;

abstract class BaseQuest implements Quest
{
    private $game;
    
    public function __construct(Game $game)
    {
        $this->game = $game;
    }
    
    /**
     * @return Game
     */
    protected function getGame()
    {
        return $this->game;
    }
    
    public function complete()
    {
        if(! $this->verify()) {
            throw new \Exception('Quest still missing objectives: ' . $this->objectivesAsString());
        }
    }
    
    private function getPlayer()
    {
        return $this->getGame()->getPlayer();
    }
    
    protected function getPlayerLocation()
    {
        return $this->getPlayer()->getLocation();
    }
    
    abstract protected function objectivesAsString();
}