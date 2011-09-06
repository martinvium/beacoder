<?php
namespace BAC;

use BAC\Profile;
use BAC\Trait\HeavyObject;
use BAC\Trait\Forcible;
use BAC\Location;

final class Player
{
    private $name = '';
    private $profile;
    private $location;
    
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
    
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }
    
    public function getLocation()
    {
        return $this->location;
    }

    public function verify()
    {
        if(! $this->getName()) {
            return false;
        }
        
        if(! $this->profile) {
            return false;
        }
        
        if(! $this->profile->verify()) {
            return false;
        }
        
        return true;
    }
}