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


        <div class="row">

        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
