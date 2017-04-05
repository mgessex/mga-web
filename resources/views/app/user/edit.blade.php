@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Edit My Profile</h1>
                    <p class="description">This page allows you to alter your profile details.</p>
                </div>
@endsection

@section('content')

            

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <div>Edit My Profile</div>
                         </div>

                        <div class="member-form-inputs">

                            <form role="form" method="POST" action="{{ action('UserController@update', Auth::user()->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">

                            @if($errors->has('name'))
                            <div class="row form-group has-error">
                            @else
                            <div class="row form-group">
                            @endif

                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="linecons-user"></i>
                                            </span>
                                    <input type="text" class="form-control" data-validate="required" data-message-required="Please enter your name." name="name" id="name" value="{{ Auth::user()->name }}" />
                                    </div>
                                </div>
                            </div>
            
                            @if($errors->has('email'))
                            <div class="row form-group has-error">
                            @else
                            <div class="row form-group">
                            @endif

                                <label class="col-sm-4 control-label" for="email">Email Address</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="linecons-mail"></i>
                                            </span>
                                    <input type="text" class="form-control" name="email" id="email" data-mask="email" value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4 control-label" for="phone1">Primary Phone</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="linecons-mobile"></i>
                                            </span>
                                    <input type="text" class="form-control" name="phone1" id="phone1" data-mask="phone" value="{{ Auth::user()->phone1 }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4 control-label" for="phone2">Alternate Phone</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="linecons-mobile"></i>
                                            </span>
                                    <input type="text" class="form-control" name="phone2" id="phone2" data-mask="phone" value="{{ Auth::user()->phone2 }}" />
                                    </div>
                                </div>
                            </div>

                            @if($errors->has('dob'))
                            <div class="row form-group has-error">
                            @else
                            <div class="row form-group">
                            @endif
                                <label class="col-sm-4 control-label" for="phone2">Date of Birth</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="linecons-calendar"></i>
                                            </span>
                                    <input type="text" class="form-control" name="dob" id="dob" data-mask="yyyy-mm-dd" value="{{ Auth::user()->date_of_birth }}" />
                                    </div>
                                </div>
                            </div>

                            @if(!Auth::user()->is_student)
                            <!-- Designated Student -->
                            <div class="row form-group">
                                <label class="col-sm-4 control-label" for="phone2">Default Student</label>
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#designated_student").selectBoxIt().on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="linecons-graduation-cap"></i>
                                        </span>
                                        <select class="form-control" name="designated_student" id="designated_student">
                                            @foreach($groupStudents as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-3 pull-right-sm">
                                    <button class="btn btn-secondary">Update</button>
                                </div>
                            </div>
                        <form>

                        </div>
                    </div>
                </div>
            </div>

            


@endsection

@section('bottomScripts')
    <script src="/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="/js/inputmask/jquery.inputmask.bundle.js"></script>
    <script src="/js/selectboxit/jquery.selectBoxIt.min.js"></script>
@endsection