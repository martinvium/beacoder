<?php
namespace BAC;

use ActOne\Location\StartingBarn;

final class Game
{
    private $player;
    
    /**
     * Start a new adventure of glorious battle and... ehm fun times!
     * 
     * @param Player $player
     * @return Game
     */
    public static function NewGame(Player $player)
    {
        $game = new self();
        $game->setPlayer($player);
        return $game;
    }
    
    public function setPlayer(Player $player)
    {
        if(! $player->verify()) {
            throw new InvalidArgumentException('player is not valid yet');
        }
        
        $this->player = $player;
    }
    
    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
    
    /**
     * The barn in which you begin your first adventure.
     * 
     * @return StartingBarn
     */
    public function getStartingLocation()
    {
        return new StartingBarn($this);
    }
}