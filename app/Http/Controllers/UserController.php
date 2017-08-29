<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling user profile views & update requests.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.user.profile');
    }

    public function edit()
    {
        $view = view('app.user.edit');
        // get user's designated student (if they are not a student themselves)
        if(!Auth::user()->is_student) {
            $designatedStudent = User::findOrFail(Auth::user()->designated_student);
            // Retreive all 'student' group members 
            // (since this is user is not a student we do not have to filter out the current  user)
            $groupStudents = User::where([['group_id', Auth::user()->group_id],['is_student', 1]])->get();

            $view->with('currentStudent', $designatedStudent);
            $view->with('groupStudents', $groupStudents);
        }

        return $view;
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'dob' => 'required|date',
            ],[
            'name.required' => 'Please tell us who you are!',
            'email.required' => 'We need to know your e-mail address!',
            'dob.required' => 'Without your date of birth you cannot sign up for events!',
            ]);       
        //
        $user = User::find($id);
        //
        if(!$user->is_student) {
            // update designated student
            $user->designated_student = $request->input('designated_student');
        }
        //
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone1 = $request->input('phone1');
        $user->phone2 = $request->input('phone2');
        $user->date_of_birth = $request->input('dob');
        
        $user->save();
        $request->session()->flash('alert-success', 'Profile Saved Successfully!');
        
        return redirect('home/myprofile');
    }
}
