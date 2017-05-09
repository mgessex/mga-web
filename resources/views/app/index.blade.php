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
                    <div class="xe-widget xe-counter xe-counter-info">
                        <div class="xe-icon">
                            <i class="linecons-graduation-cap"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="panel-title">{{ $member->name }} - {{ $member->id }}</strong>
                        </div>
                    </div>
                    @if($member->balance() < 0)
                    <div class="col-sm-2 xe-widget xe-counter xe-counter-danger">
                    @else
                    <div class="col-sm-2 xe-widget xe-counter xe-counter-success">
                    @endif
                        <div class="xe-icon">
                            <i class="fa-dollar"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">{{ $member->balance() }}</strong>
                            <span>Balance as of {{ $member->lastTransactionDate()->toFormattedDateString() }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Band Bucks Recent Activity</h3>
                            <div class="panel-options">
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
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($member->recentTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->activity }}</td>
                                    @if($transaction->is_credit)
                                    <td class="bg-success text-right">
                                    @else
                                    <td class="bg-danger text-right">
                                    @endif
                                        ${{ $transaction->amount }}</td>
                                </tr>
                                @endforeach
                                <!--
                                <tr>
                                    <td>Mar 29, 2017</td>
                                    <td>Tour Payment</td>
                                    <td class="bg-danger text-right">- $500.00</td>
                                </tr>
                                
                                <tr>
                                    <td>Apr 11, 2017</td>
                                    <td>Raffle Tickets</td>
                                    <td class="bg-success text-right">$150.00</td>
                                </tr>
                            -->
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            @endforeach
@endsection

@section('bottomScripts')
@endsection
