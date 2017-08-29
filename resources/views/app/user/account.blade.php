@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Band Bucks Account for: {{ $student->name }}</h1>
                    <p class="description">This page allows you to alter your profile details.</p>
                </div>
@endsection

@section('content')
            <div class="row">
                <div class="col-cm-6">
                    <div class="panel panel-default panel-border">
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
                                @foreach($bb_transactions as $transaction)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($transaction->created_at)->format('D, M d, Y') }}{{ $transaction->created_at }}</td>
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
@endsection
