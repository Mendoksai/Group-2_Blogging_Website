@extends('layouts.main_layout')
@section('content')

@guest
<div class="widgets-programs-area" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30" style="min-height:50vh; margin-bottom:10vh; ">
                    <h1 class="" style="text-align:center; margin:25vh 0; font-size:3rem">
                        Welcome to the Admin Dashboard<br/>
                        <span style="text-align:center;  font-size:1rem; font-weight: 100;">Please <a href="/login" style="color:green; font-weight: bold;">login</a> to verify your credentials</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest


@auth

@if(auth()->user()->account_role == 'admin')
<div class="widgets-programs-area">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Page Views</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-apps"></i>
                        </div>
                        <div class="m-t-xl widget-cl-1">
                            <h1 class="text-success">{{ $views }}</h1>
                            <small>
                         
                                Number of users that have <strong>logged in or registred</strong> on the website.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Active Users</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-professor"></i>
                        </div>
                        <div class="m-t-xl widget-cl-2">
                            <h1 class="text-info">{{ $users }}</h1>
                            <small>
                              Number of users <strong>currently registered</strong> on the website.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="widget-program-box mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="text-center content-box">
                            <h2 class="m-b-xs">All Students</h2>
                            <div class="m icon-box">
                                <i class="educate-icon educate-star-half"></i>
                            </div>
                            <p class="small mg-t-box">
                                List of all the students on the website
                            </p>
                            <a href="/admin/student/index" class="btn btn-success widget-btn-1 btn-sm" style="color:white;">All Students</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="text-center content-box">
                            <h2 class="m-b-xs">Add Student</h2>
                            <div class="m icon-box">
                                <i class="educate-icon educate-miscellanous"></i>
                            </div>
                            <p class="small mg-t-box">
                                Register a new student on the website
                            </p>
                            <a href="/admin/student/create" class="btn btn-info widget-btn-2 btn-sm" style="color:white;">Add Student</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="text-center content-box">
                            <h2 class="m-b-xs">Edit Student</h2>
                            <div class="m icon-box">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <p class="small mg-t-box">
                                Update student data on the website
                            </p>
                            <a href="/admin/student/index" class="btn btn-warning widget-btn-3 btn-sm" style="color:white">Edit Student</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



@else

<div class="widgets-programs-area" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30" style="min-height:50vh; margin-bottom:10vh; ">
                    <h1 class="" style="text-align:center; margin:25vh 0; font-size:3rem">
                        Welcome {{ auth()->user()->first_name }}<br/>
                        <span style="text-align:center;  font-size:1rem; font-weight: 100;">Thank you for registering</span>
                    </h1>
                    
                </div>
            </div>
            

        </div>
        
    
    </div>
</div>

@endif
@endauth
@endsection