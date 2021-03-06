@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">My Profile</h1>
                    <p class="description">This page lists your profile details &amp; additional Group/Family members.</p>
                </div>
@endsection

@section('content')

            <div class="col-sm-12">

                <form role="form" class="form-horizontal">

                <div class="col-sm-6">

                    <!-- User Details -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="member-form-add-header">
                                <div class="col-md-3 col-sm-4 pull-right-sm">
                
                                    <div class="action-buttons">
                                        <a href="{{ action('UserController@edit') }}" class="btn btn-secondary">Edit Profile</a>
                                    </div>
            
                                </div>
                                <div class="col-md-9 col-sm-8">
                                    <div class="user-name">
                                            <a href="#">{{ Auth::user()->name }}</a>
                                            <span>{{ $userRole }}</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Name</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="linecons-user"></i>
                                            </span>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="email">Email Address</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="linecons-mail"></i>
                                                </span>
                                        <input type="text" class="form-control" name="email" id="email" data-mask="email" value="{{ Auth::user()->email }}" disabled />
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">

                                
                                    <label class="col-sm-4 control-label" for="phone1">Primary Phone</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="linecons-mobile"></i>
                                                </span>
                                        <input type="text" class="form-control" name="phone1" id="phone1" data-mask="phone" value="{{ Auth::user()->phone1 }}" disabled />
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="phone2">Alternate Phone</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="linecons-mobile"></i>
                                                </span>
                                        <input type="text" class="form-control" name="phone2" id="phone2" data-mask="phone" value="{{ Auth::user()->phone2 }}" disabled />
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="dob">Date of Birth</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="linecons-calendar"></i>
                                                </span>
                                        <input type="text" class="form-control" name="dob" id="dob" data-mask="yyyy-mm-dd" value="{{ Auth::user()->date_of_birth }}" disabled />
                                        </div>
                                    </div>
                            </div>
                            @if(!Auth::user()->is_student)
                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="studentName">Default Student</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="linecons-graduation-cap"></i>
                                                </span>
                                        <input type="text" class="form-control" name="studentName" id="studentName" value="{{ $designatedStudentName }}" disabled />
                                        </div>
                                    </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if(Auth::user()->has_proserve)

                    <!-- Proserve Information -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                My Proserve Info
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="proserve_num">Number</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i>#</i>
                                            </span>
                                    <input type="text" class="form-control" name="proserve_num" id="proserve_num" value="{{ Auth::user()->proserve_num }}" disabled />
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="email">Date Completed</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                                <i class="fa-calendar"></i>
                                            </span>
                                    <input type="text" class="form-control" name="email" id="email" data-mask="email" value="{{ Auth::user()->proserve_date }}" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif

                </div>

                <div class="col-sm-6">

                    <!-- Group Members -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Additional '{{ $groupName }}' Group Members
                            </div>
                        </div>
                        <div class="panel-body">
                            @foreach($groupMembers as $member)

                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="group_member_{{ $member->id }}" >Additional Member {{ $loop->index + 1 }}:</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            @if($member->is_student)
                                            <i class="linecons-graduation-cap  tooltip-secondary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Student Member"></i>
                                            @elseif($member->isUnderage())
                                            <i class="linecons-t-shirt tooltip-secondary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Underage Member"></i>
                                            @else
                                            <i class="linecons-user tooltip-secondary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adult Member"></i>
                                            @endif
                                        </span>
                                        <input type="text" class="form-control" name="group_member_{{ $member->id }}" id="group_member_{{ $member->id }}" value="{{ $member->name }}" disabled />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                </form>

            </div>
            
@endsection

@section('bottomScripts')
    <script src="/js/inputmask/jquery.inputmask.bundle.js"></script>
@endsection