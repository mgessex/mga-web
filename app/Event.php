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

    public function isOpenRecent()
    {
    	if($this->status == 'Open') {   
            if(!empty($this->open_date) && !empty($this->open_time)) {
                // $openDate = new \DateTime($this->open_date);
                // $openDate->setTime($this->open_time);
                // $now = new \DateTime('now');
                // $days = $openDate->diff($now)->h;
                // return $days;
    
                // Compare now and open DateTime + 1 day (24hrs)
                $openDateTime = new \DateTime($this->open_date.'T'.$this->open_time);
                //$openDateTime->setTime($this->open_time);
                $openDateTime->add(new \DateInterval('P1D'));
                $now = new \DateTime('now');
                // if Event open datetime + 1 day > now then this is the sweet spot
                if($openDateTime > $now) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
