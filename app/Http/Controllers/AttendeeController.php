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

        // query the is Adult function & save it (called numerous times in this controller)
        //$userIsAdult = $user->isAdult();

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

    	// Init var defaults
    	$alerts = [];
        $update = false;
        $waitlist = 1;
        $incrementType = 'waitlist';

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
        if(!$alerts) {
        	switch($event->status) {
        		case "Open":
        				// Check if we are in the 24 hr sweet spot period
        				//dd($event->isOpenRecent());
                        if($event->isOpenRecent()) {
                            // now we can check how many others from this user's group are already signed up

                            // get how many other group members are signed up for this event
                            $groupAttendeeCount = Attendee::where('group_id', '=', $user->group_id)
                                    ->where('event_id', '=', $event->id)
                                    ->where('is_waitlisted', '=', 0)
                                    ->count();
                            // get how many students are in the user's group/family
                            $groupStudentCount = User::where('group_id', '=', $user->group_id)
                                    ->where('is_student', '=', 1)
                                    ->where('is_active', '=', 1)
                                    ->count();
                            // Check current group attendees versus 2 x # of students in family
                            if($groupAttendeeCount >= $groupStudentCount * 2 ) {
                                // warning message re: already max signed up in first 24 hrs: waitlist the user
                                $alerts = ['alert-danger' => 'This event has been open less than 24 hrs - There are already '.$groupAttendeeCount.' members from your group signed up for this event'];
                            }
                        }
                        if(!$alerts) {
                            // Is user an adult?
                            if($user->isAdult()) {
                                // check if event has room for an adult?
                                if($event->required_adults - $event->attending_adults > 0) {
                                    //
                                    $alerts = ['alert-success' => $user->name.' added to Event Worker list successfully'];
                                    $waitlist = 0;
                                    $event->attending_adults = $event->attending_adults + 1;
                                }
                                // Event has no more adult spots
                                else {
                                    // check if event has room for a youth? (adult in a youth spot)
                                    if($event->required_youths - $event->attending_youths > 0) {
                                        //
                                        $alerts = ['alert-success' => $user->name.' added to Event Worker list successfully'];
                                        $waitlist = 0;
                                        $event->attending_youths = $event->attending_youths + 1;
                                    }
                                    // no youth spots either (in theory this shouldn't happen due to event closing when full)
                                    else {
                                        //
                                        $alerts = ['alert-info' => $user->name.' added to Event Waitlist successfully'];
                                    }
                                }
                                $update = true;
                            }
                            // user is a youth
                            else {
                                // is youth also a student?
                                if($user->is_student) {
                                    // does event allow students?
                                    if($event->allow_students) {
                                        // check if event has room for a youth?
                                        if($event->required_youths - $event->attending_youths > 0) {
                                            //
                                            $alerts = ['alert-success' => $user->name.' added to Event Worker list successfully'];
                                            $waitlist = 0;
                                            $event->attending_youths = $event->attending_youths + 1;
                                        }
                                        else {
                                            //
                                            $alerts = ['alert-info' => $user->name.' added to Event Waitlist successfully'];
                                        }
                                        $update = true;
                                    }
                                    // event does not allow students
                                    else {
                                        //
                                        $alerts = ['alert-danger' => 'This event does not allow students'];
                                    }
                                }
                                // user is just a youth (not a student)
                                else {
                                    // check if event has room for a youth?
                                    if($event->required_youths - $event->attending_youths > 0) {
                                        //
                                        $alerts = ['alert-success' => $user->name.' added to Event Worker list successfully'];
                                        $waitlist = 0;
                                        $event->attending_youths = $event->attending_youths + 1;
                                    }
                                    // no youth spots open
                                    else {
                                        //
                                        $alerts = ['alert-info' => $user->name.' added to Event Waitlist successfully'];
                                    }
                                    $update = true;
                                }
                            }
                        }
        				break;
        		case "Closed":
        				// is user a student and the event excludes students?
                        if($user->is_student && !$event->allow_students) {
                            //
                            $alerts = ['alert-danger' => 'This event does not allow students'];
                        }
                        // waitlist the user
                        else {
                            //
                            $alerts = ['alert-info' => $user->name.' added to Event Waitlist successfully'];
                            $update = true;
                        }
        				break;
        		default:
        				$alerts = ['alert-warning' => 'This event is '.$event->status.' - No signup are allowed on this event'];
                        break;
        	}

            if($update) {
                //
                if($event->isFull() && $event->status == 'Open') {
                    //
                    $event->status = 'Closed';
                }
                //
                $event->save();
                //
                $attendee = new Attendee;
                $attendee->event_id = $event->id;
                $attendee->user_id = $user->id;
                $attendee->group_id = $user->group_id;
                // need to figure this out (maybe user table holds student user_id ?)
                $attendee->student_id = ($user->is_student) ? $user->id : $user->designated_student;
                $attendee->is_waitlisted = $waitlist;
                $attendee->save();
            }
        }

    	return redirect()->route('event', ['id' => $event_id])->with($alerts);
    }
}
