@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register New User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                            <label for="group" class="col-md-4 control-label">Group</label>

                            <div class="col-md-6">
                                <select id="group" class="form-control" name="group">
                                    <option value="-1" selected>Choose Group...</option>
                                    <option value="0">New Group</option>
                                </select>

                                @if ($errors->has('group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div id="groupName" style="display:none" class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
                            <label for="group_name" class="col-md-4 control-label">New Group Name</label>

                            <div class="col-md-6">
                                <input id="group-name" type="text" class="form-control" name="group_name" value="{{ old('group_name') }}">

                                @if ($errors->has('group_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group_name') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomScripts')
<script type="text/javascript">
$(document).ready(function(){
    if($('#group').val()=="0") {
        $("#groupName").show();
    }
});
$('#group').on('change',function(){
    if( $(this).val()=="0"){
        $("#groupName").show();
    }
    else{
        $("#groupName").hide();
    }
});
</script>
@endsection
