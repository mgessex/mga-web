<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Menu;

class LavaryMenu
{
    /** 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('cmsNavBar', function($menu){
            $menu->add('Home');
            $menu->add('About', 'about');
        });

        if(Auth::guest()){
            Menu::make('appNavBar', function($menu){
                $menu->add('Home', 'index');
                $menu->add('About Us', 'about');
                $menu->add('Donations', 'donations');
                $menu->add('Contact Us', 'contact');
            });
        }

        else{
            Menu::make('appNavBar', function($menu){
                $menu->add('Dashboard', 'home');
                $menu->add('Events', 'home/events');
                    $menu->events->add('Future', 'home/events/future');
                $menu->add('Family', 'home/family');
                $menu->add('My Events', 'home/myevents');
                
                if(Auth::user()->is_admin) {
                    $menu->add('Admin', 'home/admin');
                    $menu->admin->add('Manage Groups', 'home/admin/groups');
                    $menu->admin->add('Manage Locations', 'home/admin/locations');
                    $menu->admin->add('Manage Users', 'home/admin/users');
                }

            });
        }

        return $next($request);
    }
}
