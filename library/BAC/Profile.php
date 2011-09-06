<?php
namespace BAC;

final class Profile
{
    private $name = '';
    private $email = '';
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = (string)$name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = (string)$email;
    }
    
    public function verify()
    {
        if(empty($this->getName())) {
            return false;
        }
        
        if(! filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        
        return true;
    }
}