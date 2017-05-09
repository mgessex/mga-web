<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

        $view->with('groupStudents', $groupStudents);
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
