<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// the code below is the same as Route::auth()
//Route::auth();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Forgot Password Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

// Reset Password Routes...
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

// Register Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');


//User Routes
Route::get('home', 'HomeController@dashboard');
Route::get('home/events', 'EventController@calendar');
Route::get('home/events/event', 'EventController@index')->name('event');
Route::get('home/events/event/adduser', 'AttendeeController@adduser');
//Route::get('home/events/future', 'EventController@future');

Route::get('home/myevents/future', 'MyEventController@future');
Route::get('home/myevents/history', 'MyEventController@history');

Route::get('home/account', 'HomeController@account');

Route::get('home/settings', 'HomeController@settings');
Route::get('home/myprofile', 'UserController@index');
Route::get('home/myprofile/edit', 'UserController@edit');
Route::put('home/myprofile/update/{user}', 'UserController@update');

//Admin Routes
Route::get('home/admin/groups', 'Admin\GroupController@list')->middleware('admincheck');
Route::get('home/admin/locations', 'Admin\LocationController@list')->middleware('admincheck');
Route::get('home/admin/users', 'Admin\UserController@list')->middleware('admincheck');
