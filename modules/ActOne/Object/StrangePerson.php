<?php
namespace ActOne\Object;

use BAC\Trait\Forcible;
use BAC\Trait\HeavyObject;

use ActOne\Object\StrangeLetter;

class StrangePerson implements Forcible
{
    private $forced = false;
    private $goldAmount = 0;
    private $friendly = false;
    
    /**
     * You approach the man with all your mistrust. Making sure he knows your worth in a fight. But
     * do you even know your own worth?
     * 
     * He says he has something you need.
     */
    public function approachThreateningly()
    {
        $this->friendly = false;
    }
    
    /**
     * It is better to assume the best in people, and so you try not to seem to disturbed by his
     * presense, and smile while you talk over to him.
     * 
     * He says he has something you need.
     */
    public function approachKindly()
    {
        $this->friendly = true;
    }
    
    /**
     * Give the man a couple of gold coins to help smooth his mouth.
     * 
     * @param integer $amount 
     */
    public function giveGold($amount)
    {
        $this->goldAmount = (int)$amount;
    }
    
    /**
     * Grab your weapon of choice and force him to subdue.
     * 
     * @param HeavyObject $object 
     */
    public function forceWith(HeavyObject $object)
    {
        $this->forced = true;
    }
    
    public function takeLetter()
    {
        if(! $this->forced && $this->goldAmount < 5) {
            throw new \Exception('The strange person will not give you his letter willingly');
        }
        
        return new StrangeLetter;
    }
}