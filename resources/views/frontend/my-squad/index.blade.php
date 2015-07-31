
@extends('frontend.layouts.master')

@section('title', 'My Squad')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">My Squad</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Squad - {{$user->vpf}} - {{$user->vpf->assignment->group->name}}</h1>
        <p>Your Common Access Card is your identification in this unit. You can select a default face for you account here. Make sure to set up the same face in game.</p>

    </div>
@endsection

@section('js-bottom')
@endsection
