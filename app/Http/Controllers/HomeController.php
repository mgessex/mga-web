<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $view = view('app.index');

        // Return all students from this user's group
        $groupStudents = User::where([['group_id', Auth::user()->group_id],['is_student', 1]])->get();

        // Get 10 most recent upcoming events where members of this user's group are scheduled for the event
        $upcomingAttendees = DB::table('attendees')
                        ->join('users', 'users.id', '=', 'attendees.user_id')
                        ->join('events', 'events.id', '=', 'attendees.event_id')
                        ->select('attendees.id as attendeeId', 'attendees.group_id', 'users.name as userName', 'events.*')
                        ->where('events.credit_type', '=', 'Band Bucks')
                        ->where('start_date', '>=', Carbon::now())
                        ->where('attendees.group_id', '=', Auth::user()->group_id)
                        ->orderBy('start_date')
                        ->limit(6)
                        ->get();

        // Get 10 most recent past events where member's of this user's group were *confirmed* for the event 
        $pastAttendees = DB::table('attendees')
                        ->join('users', 'users.id', '=', 'attendees.user_id')
                        ->join('events', 'events.id', '=', 'attendees.event_id')
                        ->select('attendees.id as attendeeId', 'attendees.group_id', 'users.name as userName', 'events.*')
                        ->where('events.credit_type', '=', 'Band Bucks')
                        ->where('start_date', '<', Carbon::now())
                        ->where('attendees.group_id', '=', Auth::user()->group_id)
                        ->where('attendees.is_confirmed', '=', 1)
                        ->orderBy('start_date')
                        ->limit(6)
                        ->get();

        $view->with('groupStudents', $groupStudents);
        $view->with('upcomingAttendees', $upcomingAttendees);
        $view->with('pastAttendees', $pastAttendees);
        return $view;
    }

    /**
     * Event Information - get event details & event attendees.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function account(Request $request)
    {
        if (!$request->has('id')) {
        //
            return redirect('home'); //->with(['alert-danger' => 'Unknown Student']);
        }

        $view = view('app.user.account');

        // get the student id url parameter
        $id = $request->input('id');

        // get the student if exists and redirect if not
        $student = User::findOrFail($id);

        //confirm the current user is within the same group as the student (this prevents manual manipulation of the url param)
        if($student->group_id != Auth::user()->group_id) {
            //unauthorized access - redirect back to dashboard
            return redirect('home')->with(['alert-danger' => 'Unauthorized access attempt - an event log has been sent to the administrator.']);
        }

        // get all transactions for this student
        $bb_transactions = DB::table('transactions')
                        //->join('users', 'users.id', '=', 'transactions.user_id')
                        //->select('transactions.*','users.name')
                        ->where('transactions.student_id', $id)
                        ->get();

        $view->with('student', $student);
        $view->with('bb_transactions', $bb_transactions);

        return $view;
    }

    /**
     * Show the settings dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        return view('app.settings');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('app.admin');
    }
}
