@extends('frontend.layouts.master')

@section('title', 'About')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('training')}}">My Training</a> </li>
        <li class="active">Instructor Panel</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Training - Instructor Panel</h1>
        <p>This panel allows you to monitor up and coming training events that have you marked as the responsible instructor. What this means is that you will be leading the session and be responsible for the paperwork after the session is complete.</p>
        <p>For reference the current UTC time is {{\Carbon\Carbon::now()->toDateTimeString()}}</p>
        <hr>
        @if($teaching->count() > 0)
            @foreach($teaching as $date)
                <div class="media">
                    <div class="media-left">
                        <img class="media-object img-square" style="max-height: 100px; max-width: 100px;" src="{{$date->school->showSmall()}}" alt="School">
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading"><a href="/my-training/{{$date->school->id}}"><h4>{{$date->school->name}}</h4></a></h5>
                        <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->toDateTimeString()}}<br>Class Instructor: <a href="/roster/{{$date->instructor->id}}">{{$date->instructor}}</a></p>
                        <p>
                            <a href="{{route('training.instructor.class.complete',$date->id)}}" class="btn btn-success btn-xs">Mark as Complete</a>
                            <a href="{{route('training.instructor.class.cancel',$date->id)}}" class="btn btn-danger btn-xs">Cancel Event</a>
                        </p>
                        <small>Class starts in {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->diffForHumans()}}</small>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <p>No appointments found, you are currently not scheduled or the dates are in the past.</p>
        @endif
    </div>
@endsection

@section('js-bottom')
@endsection
