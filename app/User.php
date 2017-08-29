<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function upcomingScheduledEvents()
    {
        //return $this->hasManyThrough('App\Event','App\Attendee','user_id');
        //$query = $this->belongsToMany('App\Event','attendees');
        //$query = $this->hasMany('App\Attendee');
        //logger($query->sql);
        return $this->hasMany('App\Attendee', 'group_id', 'group_id');
        //return $this->belongsToMany('App\Event','attendees','group_id','event_id');

        // given the group id, return all events for all group members
    }

    public function bb_balance()
    {
        return $this->hasMany('App\Transaction', 'student_id')->sum('amount');
    }

    public function bb_transactions()
    {
        return $this->hasMany('App\Transaction', 'student_id');
    }

    public function bb_recentTransactions()
    {
        return $this->hasMany('App\Transaction', 'student_id')->latest()->limit(3);
    }

    public function bb_lastTransactionDate()
    {
        //$dt = new DateTime(
        return new Carbon($this->hasMany('App\Transaction', 'student_id')->select('created_at')->latest()->first()->created_at);
    }
}
