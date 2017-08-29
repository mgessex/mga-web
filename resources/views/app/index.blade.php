@extends('layouts.app')

@section('pagetitle')
				<div class="title-env">
					<h1 class="title">Welcome!</h1>
					<p class="description">This is your dashboard page.</p>
				</div>
@endsection

@section('content')

			@foreach($groupStudents as $member)
			<div class="row">

				<div class="col-sm-3">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $member->name }} - Band Bucks</h3>
						</div>
						<div class="panel-body" style="padding-top:10px;">
							@if($member->bb_balance() < 0)
							<div class="xe-widget xe-counter xe-counter-danger">
							@else
							<div class="xe-widget xe-counter xe-counter-success">
							@endif
								<div class="xe-icon">
									<i class="fa-dollar"></i>
								</div>
								<div class="xe-label">
									<strong class="num">{{ $member->bb_balance() }}</strong>
									<span>Balance as of {{ $member->bb_lastTransactionDate()->toFormattedDateString() }}</span>
								</div>
							</div>
						</div>
					</div>
					
				</div>

				<div class="col-sm-9">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $member->name }} - Recent Activity</h3>
							<div class="panel-options">
								<a href="{{ action('HomeController@account') }}?id={{ $member->id }}">
									<i class="linecons-cog tooltip-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View All Transactions for {{ $member->name }}"></i>
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
									<th>Date</th>
									<th>Activity</th>
									<th>Name</th>
									<th>Amount</th>
								</tr>
							</thead>
							
							<tbody>
								@foreach($member->bb_recentTransactions as $transaction)
								<tr>
									<td>{{ $transaction->created_at->toFormattedDateString() }}</td>
									<td>{{ $transaction->activity }}</td>
									<td>{{ $transaction->user_name }}</td>
									@if($transaction->is_credit)
									<td class="bg-success text-right">
									@else
									<td class="bg-danger text-right">
									@endif
										${{ $transaction->amount }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
			@endforeach

			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">Prior Confirmed Events <span class="text-muted">(last 6)</span></h3>
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
									<th>Event</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pastAttendees as $event)
								<tr>
									<td>{{ $event->userName or 'Default' }}</td>
									<td>{{ $event->name }}</td>
									<td>{{ Carbon\Carbon::parse($event->start_date)->format('D, M d, Y') }}</td>
									<td>{{ Carbon\Carbon::parse($event->start_time)->format('h:i A') }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default panel-border">
						<div class="panel-heading">
							<h3 class="panel-title">Future Scheduled Events <span class="text-muted">(next 6)</span></h3>
							<div class="panel-options">
								<a href="{{ action('MyEventController@future') }}">
									<i class="linecons-cog tooltip-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View All Future Scheduled Events"></i>
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
									<th>Event</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								@foreach($upcomingAttendees as $event)
								<tr>
									<td>{{ $event->userName or 'Default' }}</td>
									<td>{{ $event->name }}</td>
									<td>{{ Carbon\Carbon::parse($event->start_date)->format('D, M d, Y') }}</td>
									<td>{{ Carbon\Carbon::parse($event->start_time)->format('h:i A') }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
@endsection

@section('bottomScripts')
@endsection
