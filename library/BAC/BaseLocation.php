<?php
namespace BAC;

abstract class BaseLocation implements Location
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
}