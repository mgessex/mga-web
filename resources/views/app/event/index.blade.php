@extends('layouts.app')

@section('pagetitle')
				<div class="title-env">
					<h1 class="title">{{ $event->name }} Event</h1>
					<p class="description">This page displays event details, who is attending, and who is on the waitlist.</p>
				</div>
@endsection

@section('content')

			<div class="row">
				<div class="col-sm-12 mga-{{ $event->status }}">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">Event: {{ $event->name }} - {{ $event->status }}</h3>
							<div class="action-buttons pull-right-sm">
								@foreach($users as $user)
								<a href="{{ action('AttendeeController@adduser', ['id' => $user->id]) }}" class="btn btn-secondary">Add {{ $user->name }}</a>
								@endforeach
							</div>
						</div>
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Event Date</th>
									<th>Event Time</th>
									<th>Required Adults</th>
									<th>Required Youths</th>
									<th>Attending Adults</th>
									<th>Attending Youths</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ $event->start_date }}</td>
									<td>{{ $event->start_time }}</td>
									<td>{{ $event->required_adults }}</td>
									<td>{{ $event->required_youths }}</td>
									<td>{{ $event->attending_adults }}</td>
									<td>{{ $event->attending_youths }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">Event Attendees</h3>
							<div class="panel-options">
								<a href="{{ action('MyEventController@history') }}">
									<i class="linecons-cog tooltip-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View All Prior Confirmed Events"></i>
								</a>
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Name</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
							@foreach($attendees->where('is_waitlisted', 0) as $attendee)
								<tr>
									<td>{{ $attendee->name }}</td>
									<td>{{ $attendee->created_at }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">Event Waitlist</h3>
							<div class="panel-options">
								<a href="{{ action('MyEventController@history') }}">
									<i class="linecons-cog tooltip-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View All Prior Confirmed Events"></i>
								</a>
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Name</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
							@foreach($attendees->where('is_waitlisted', 1) as $attendee)
								<tr>
									<td>{{ $attendee->name }}</td>
									<td>{{ $attendee->created_at }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

@endsection