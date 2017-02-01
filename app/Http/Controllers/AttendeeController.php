<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Attendee;

class AttendeeController extends Controller
{
	/**
     * Add User to Event - check user, event capacity, add user to event, & increment event attendee (adult/youth) count.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adduser(Request $request)
    {
    	// get the user id url parameter
    	$user_id = $request->input('id');

    	// get the user if exists and redirect if not
        $user = User::findOrFail($user_id);

        // get the event id from the referer url parameter
    	$ref_qstring = parse_url($request->server('HTTP_REFERER'));

    	// test the 'query' key exists (this prevents attempts to navigate directly to the page)
    	if(isset($ref_qstring['query'])) {
    		parse_str($ref_qstring['query'], $ref_params);
    		$event_id = $ref_params['id'];
    	} else {
    		// direct navigation attempt - redirect home
    		return redirect('home');
    	}

    	// get the event if exists and redirect if not (unlikely but hey who knows?)
    	$event = Event::findOrFail($event_id);

    	// Need to test multiple messages back to user ['danger', 'warning', 'success', 'info'] = Success
    	// $alerts = ['alert-danger' => 'danger message <br /> danger message 2', 'alert-warning' => 'danger message 2', 'alert-success' => 'success message', 'alert-info' => 'info message'];

    	// Init array of alerts
    	$alerts = [];

    	// if adult && no proserve
    	if($user->isAdult() && !$user->has_proserve) {
    		// warn the user to get proserve
    		$alerts = ['alert-danger' => $user->name.' cannot be added to any events until their Proserve is completed and an admin updates the account'];
    		//dd($alerts);
    	}
    	if($user->isUnderage()) {
    		// warn the user to wait until 15 yrs old
    		$alerts = ['alert-danger' => $user->name.' cannot be added to any events until they turn 15 yrs old'];
    		//dd($alerts);
    	}
    	switch($event->status) {
    		case "Open":
    				// Check how long event has been open
    				//if($event->calcOpenAge() > 24)
    				dd($event->calcOpenAge()->format('%a Day and %h hours'));
    				break;
    		case "Closed":
    				//
    				break;
    		default:
    				$alerts = ['alert-warning' => 'This event is '.$event->status.' - No signup is allowed on this event'];
    	}

    	// else

    	return redirect()->route('event', ['id' => $event_id])->with($alerts);
    }
}
