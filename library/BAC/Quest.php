<?php
namespace BAC;

interface Quest
{
    /**
     * @return boolean true if quest objectives are completed
     */
    public function verify();
    
    /**
     * Call when you completed a quest
     */
    public function complete();
}