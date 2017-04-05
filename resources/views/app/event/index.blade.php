@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Event Information</h1>
                    <p class="description">This page displays event details and event volunteers.</p>
                </div>
@endsection

@section('content')

			
			<div><p>Name: {{ $event->name }}</p></div>
			<div><p>Status: {{ $event->status }}</p></div>
			<div><p>Open Date: {{ $event->open_date }}</p></div>
			<div><p>Open Time: {{ $event->open_time }}</p></div>
			<div><p>Start Date: {{ $event->start_date }}</p></div>
			<div><p>Start Time: {{ $event->start_time }}</p></div>
			<div><p>Allow Students: {{ $event->allow_students }}</p></div>
			<div><p>Required Adults: {{ $event->required_adults }}</p></div>
			<div><p>Required Youths: {{ $event->required_youths }}</p></div>
			<div><p>Attending Adults: {{ $event->attending_adults }}</p></div>
			<div><p>Attending Youths: {{ $event->attending_youths }}</p></div>

			<div>Event Workers</div>
			@foreach($attendees->where('is_waitlisted', 0) as $attendee)
				<div> {{ $attendee->created_at }} - {{ $attendee->name }} </div>
			@endforeach

			<div>Waitlist</div>
			@foreach($attendees->where('is_waitlisted', 1) as $attendee)
				<div> {{ $attendee->created_at }} - {{ $attendee->name }} </div>
			@endforeach

			

			@foreach($users as $user)
			<div><a href="{{ action('AttendeeController@adduser', ['id' => $user->id]) }}" class="btn btn-secondary">Add {{ $user->name }}</a></div>
			@endforeach

@endsection