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
        if($this->verify()) {
            $this->game->addCompletedQuest();
        } else {
            throw new Exception('Quest still missing objectives: ' . $this->objectivesAsString());
        }
    }
    
    abstract protected function objectivesAsString();
}