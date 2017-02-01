@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Manage Locations</h1>
                    <p class="description">This admin page lists all the locations in the system.</p>
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
                                    Locations
                                </div>
                            </div>
                            <div class="panel-body">
                                @foreach($locations as $location)

                                {{ $location->id }} - {{ $location->name }}

                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

            </div>

@endsection