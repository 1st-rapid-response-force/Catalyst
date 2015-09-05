@extends('frontend.layouts.master')

@section('title', 'About')

@section('css-top')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('training')}}">My Training</a></li>
        <li class="active">{{$school->name}}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Training - {{$user->vpf}} - {{$school->name}}</h1>
        <p><img class="center-block" src="{{$school->show()}}"></p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                @if(!($coursesEnrolled->contains($school->id)))
                <form action="{{route('training.enroll',$school->id)}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success">Enroll in Course</button>
                </form>

                    <div class="text-center>{!! $school->description !!}<div>
                @else
                <br>
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#sections" aria-controls="docs" role="tab" data-toggle="tab">Sections</a></li>
                    @if(!($coursesCompleted->contains($school->id)))
                        <li role="presentation"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="tab">Class Schedule</a></li>
                    @endif
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            {!! $school->description !!}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="sections">
                            <h3>Sections</h3>
                            <p>Every School within the 1st RRF is broken into smaller sections allowing you to tackle a large school piece by piece.</p>
                            <br>
                            @foreach($school->sections as $section)
                                <a href="{{route('training.section.show',array($school->id,$section->id))}}" class="btn btn-primary btn-block">{{$section->order}}. {{$section->name}}</a>
                            @endforeach
                        </div>
                        @if(!($coursesCompleted->contains($school->id)))
                        <div role="tabpanel" class="tab-pane" id="schedule">
                            <p>These are the available classes, in order to complete the course you need to sign up for one and attend the session. <strong>All times are in UTC.</strong></p>
                            <br>
                            <p>For reference the current UTC time is {{\Carbon\Carbon::now()->toDayDateTimeString()}}</p>
                            <div class="well">
                                @if($dates->count() > 0)
                                    @foreach($dates as $date)
                                        @if(!$selected)
                                            <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->toDayDateTimeString()}} - <a class="btn btn-success btn-sm" href="{{ route('training.date.signup',array($date->id)) }}" data-method="put" rel="nofollow" data-confirm="Are you sure you want to sign up to this class this?">Sign Up</a></p>
                                        @else
                                            <p>You have signed up for the following time.</p>

                                            <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->toDayDateTimeString()}} - <a class="btn btn-danger btn-sm" href="{{ route('training.date.destroy',array($date->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to cancel this?">Cancel</a></p>
                                        @endif
                                    @endforeach
                                @else
                                    <p>There are currently no scheduled classes for this class, check back soon</p>
                                @endif
                            </div>
                            <br><br>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection
