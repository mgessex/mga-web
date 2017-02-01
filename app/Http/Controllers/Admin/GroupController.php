<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class GroupController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Group Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling group listings, additions & update requests.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        // get all groups
        $groups = DB::table('groups')->get();

        // bind them to the view

        return view('app.admin.group.list', ['groups' => $groups]);
    }
}
