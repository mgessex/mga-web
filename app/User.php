<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'name', 'email', 'phone1', 'phone2', 'date_of_birth', 'proserve_num', 'proserve_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function calcAge()
    {
        if(!empty($this->date_of_birth)){
            $birthdate = new \DateTime($this->date_of_birth);
            $today   = new \DateTime('today');
            $age = $birthdate->diff($today)->y;
            return $age;
        }else{
            return 0;
        }
    }

    public function isAdult()
    {
        if($this->calcAge() >= 18)
        {
            return true;
        } 
        else {
            return false;
        }
    }

    public function isUnderage()
    {
        if($this->calcAge() < 15)
        {
            return true;
        }
        else {
            return false;
        }
    }
}
