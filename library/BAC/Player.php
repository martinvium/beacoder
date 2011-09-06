<?php
namespace BAC;

use BAC\Profile;

final class Player
{
    private $name = '';
    private $profile;
    
    /**
     * @param string $name
     * @param Profile $profile
     * @return Player
     */
    public static function NewPlayer($name, Profile $profile)
    {
        $player = new self();
        $player->setName($name);
        $player->setProfile($profile);
        return $player;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = (string)$name;
    }
    
    /**
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile(Profile $profile)
    {
        $this->profile = $profile;
    }
    
    public function force(HeavyObject $object, Breakable $target)
    {
        $target->force();
    }
    
    public function move(Destination $target)
    {
        return $destination->getDestination();
    }

    public function verify()
    {
        if(empty($this->getName())) {
            return false;
        }
        
        if(! $this->profile) {
            return false;
        }
        
        return true;
    }
}