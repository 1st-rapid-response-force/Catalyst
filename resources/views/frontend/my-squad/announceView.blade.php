
@extends('frontend.layouts.master')

@section('title', 'Edit Chatter Message')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('squad')}}">My Squad</a></li>
        <li class="active">Unit Announcement - {{$announce->subject}}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>{{$announce->subject}} <small>{{$announce->creator}} - {{$announce->created_at->toDayDateTimeString()}}</small></h1>
        <hr>
        {!! $announce->message !!}
        <br>
        <a href="{{route('squad')}}" class="btn btn-primary">Return to My Squad</a>
    </div>
@endsection

@section('js-bottom')
@endsection
