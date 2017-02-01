@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Events Listing</h1>
                    <p class="description">This page lists all the events in the system.</p>
                </div>
@endsection

@section('content')

            <div class="row">

                <div class="col-sm-12">

                    <div class="col-sm-6">

                        <!-- Groups -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Events
                                </div>
                            </div>
                            <div class="panel-body">
                                @foreach($events as $event)

                                {{ $event->id }} - {{ $event->name }} - {{ $event->start_date }}

                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

            </div>

@endsection