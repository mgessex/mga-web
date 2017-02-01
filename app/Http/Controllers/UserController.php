<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('app.user.edit');
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
            'email' => 'required|email'
            ]);       
        //
        $user = User::find($id);
        //
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone1 = $request->input('phone1');
        $user->phone2 = $request->input('phone2');
        if($request->input('dob') == '') {
            $user->date_of_birth = NULL;
        } else {
            $user->date_of_birth = $request->input('dob');
        }
        $user->save();
        $request->session()->flash('alert-success', 'Profile Saved Successfully!');
        
        return redirect('home/myprofile');
        //return view('user.profile');
    }
}
