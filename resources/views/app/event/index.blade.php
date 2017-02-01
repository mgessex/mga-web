@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Event Information</h1>
                    <p class="description">This page displays event details and event volunteers.</p>
                </div>
@endsection

@section('content')

			@include('components.flashmsg')

			<div>Name: {{ $event->name }}</div>
			<div>Status: {{ $event->status }}</div>
			<div>Start Date: {{ $event->start_date }}</div>
			<div>Start Time: {{ $event->start_time }}</div>
			<div>Allow Students: {{ $event->allow_students }}</div>
			<div>Required Adults: {{ $event->required_adults }}</div>
			<div>Required Youths: {{ $event->required_youths }}</div>
			<div>Attending Adults: {{ $event->attending_adults }}</div>
			<div>Attending Youths: {{ $event->attending_youths }}</div>

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