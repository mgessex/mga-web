<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Location Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling location listings, additions & update requests.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        // get all locations
        $locations = DB::table('locations')->get();

        // bind them to the view

        return view('app.admin.location.list', ['locations' => $locations]);
    }
}
