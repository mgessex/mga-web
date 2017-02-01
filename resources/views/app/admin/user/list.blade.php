@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Manage Users</h1>
                    <p class="description">This admin page lists all the users in the system.</p>
                </div>
@endsection

@section('content')

            <div class="row">

                <div class="col-sm-12">

                    <div class="col-sm-6">

                        <!-- Users -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Users
                                </div>
                            </div>
                            <div class="panel-body">
                                @foreach($users as $user)

                                {{ $user->id }} - {{ $user->name }}

                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

            </div>

@endsection