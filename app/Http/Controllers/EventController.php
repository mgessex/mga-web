<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Event Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling event listings.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function future()
    {
        // get all events
        $events = DB::table('events')->get();

        // bind them to the view
        return view('app.event.list', ['events' => $events]);
    }

    /**
     * Event Calendar - get current events
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        // get events ordered by status (except for cancelled events)
        $events = DB::table('events')
                        ->orderBy('status')
                        ->where('status', '<>', 'Cancelled')
                        ->get();

        // get unique event statuses
        $statuses = DB::table('events')
                        ->select('status')
                        ->distinct()
                        ->where('status', '<>', 'Cancelled')
                        ->get();

        // date stuff
        $today = Carbon::today();

        // bind stuff to the view
        return view('app.event.calendar', ['events' => $events, 'statuses' => $statuses, 'today' => $today]);
    }

    /**
     * Event Information - get event details & event attendees.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get the event id url parameter
        $id = $request->input('id');

        // get the event if exists and redirect if not
        $event = Event::findOrFail($id);

        // get event attendees
        $attendees = DB::table('attendees')
                        ->join('users', 'users.id', '=', 'attendees.user_id')
                        ->select('attendees.*', 'users.name')
                        ->where('event_id', $id)
                        ->get();

        // get additional family/group members who aren't signed up for the event already
        $users = DB::table('users')
                        ->where('group_id', Auth::user()->group_id)
                        ->whereNotIn('id', function($query) use ($id)
                        {
                            $query->select('user_id')
                                    ->from('attendees')
                                    ->where('event_id', $id);
                        })
                        ->get();

        // bind them to the view
        return view('app.event.index', ['event' => $event, 'attendees' => $attendees, 'users' => $users ]);
    }

}
