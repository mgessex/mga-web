<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function isFull()
    {
    	if($this->attending_adults >= $this->required_adults && $this->attending_youths >= $this->required_youths) {
    		return true;
    	} else {
    		return false;
    	}
    }

    public function calcOpenAge()
    {
    	if(!empty($this->open_date) && !empty($this->open_time)){
    		$openDate = new \DateTime($this->open_date);
    		$openDate->setTime($this->open_time);
    		$now = new \DateTime('now');
    		$days = $openDate->diff($now)->h;
    		return $days;
    	}
    	else {
    		return  new \DateInterval(0);
    	}
    }
}
