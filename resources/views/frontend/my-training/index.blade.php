@extends('frontend.layouts.master')

@section('title', 'About')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">My Training</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Training - {{$user->vpf}}</h1>
        <p>The Training Center allows you to view all current programs you are currently enrolled in, view training documentation, and videos. Once you have completed all program requirements, you will be certified and marked as completed.</p>
        <div class="row">
            <div class="col-lg-6">
                <div class="well">
                    <h3>Courses in Progress</h3>
                    <p>These are the courses you are currently enrolled in.</p>
                    @if($coursesInProgress->count() > 0)
                    @foreach($coursesInProgress as $course)
                        <div class="media">
                            <div class="media-left">
                                <a href="/roster/1">
                                    <img class="media-object img-thumbnail" style="max-height: 100px; max-width: 100px;" src="/images/{{$course->public_image}}/small" alt="School">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="/my-training/{{$course->id}}"><h4>{{$course->name}}</h4></a></h5>
                                <p>{{$course->short_description}}</p>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p>You are not currently enrolled in a course.</p>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="well">
                    <h3>Upcoming Class Sessions</h3>
                    <p>These are the class sessions you have signed up for.</p>
                    <p>For reference the current UTC time is {{\Carbon\Carbon::now()->toDayDateTimeString()}}</p>
                    @if($dates->count() > 0)
                        @foreach($dates as $date)
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="/frontend/images/appointment.png" alt="School">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="/my-training/{{$date->school->id}}"><h4>{{$date->school->name}}</h4></a></h5>
                                    <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->toDayDateTimeString()}}</p>
                                    <small>Class starts in {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->diffForHumans()}}</small>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No appointments found, you are currently no scheduled or the dates are in the past.</p>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="well">
                    <h3>Eligible Courses</h3>
                    <p>You are eligible to enroll in the following courses, you many only have 2 active courses at a time.</p>
                    @if($eligibleCourses->count() > 0)
                        @foreach($eligibleCourses as $course)
                            <div class="media">
                                <div class="media-left">
                                    <a href="/roster/1">
                                        <img class="media-object img-thumbnail" style="max-height: 100px; max-width: 100px;" src="/images/{{$course->public_image}}/small" alt="School">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="/my-training/{{$course->id}}"><h4>{{$course->name}}</h4></a></h5>
                                    <p>{{$course->short_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>You are not eligible for any courses.</p>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="well">
                    <h3>Completed Courses</h3>
                    <p>Theses are the courses you have completed.</p>
                    @if($coursesCompleted->count() > 0)
                        @foreach($coursesCompleted as $course)
                            <div class="media">
                                <div class="media-left">
                                    <a href="/roster/1">
                                        <img class="media-object img-thumbnail" style="max-height: 100px; max-width: 100px;" src="/images/{{$course->public_image}}/small" alt="School">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="/my-training/{{$course->id}}"><h4>{{$course->name}}</h4></a></h5>
                                    <p>{{$course->short_description}}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>You are not completed any courses.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
