<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling user listings, additions & update requests.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        // get all groups
        $users = DB::table('users')->get();

        // bind them to the view

        return view('app.admin.user.list', ['users' => $users]);
    }
}
