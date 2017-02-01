<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;

class ProfileComposer
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Current authenticated user's group_id
        $groupId = Auth::user()->group_id;

        // Retrieve user's group name 
        $group = Group::find($groupId);

        // Retreive additional group members 
        // (all group members minus the current user of course!)
        $groupMembers = User::where([['group_id', $groupId],['id','<>',Auth::user()->id]])->get();

        // Determine User Role
        if(Auth::user()->is_admin) {
            $userRole = 'Administrator';
        } else {
            if(Auth::user()->is_manager) {
                $userRole = 'Manager';
            }
            else {
                $userRole = 'User';
            }
        }

        // Bind Data to View
        $view->with('groupName', $group->name);
        $view->with('groupMembers', $groupMembers);
        $view->with('userRole', $userRole);
    }
}