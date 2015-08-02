@extends('frontend.layouts.master')

@section('title', 'About')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">About</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>About</h1>
        <p>The NATO RRF is a strict military simulation unit which operates within ARMA III using a wide variety of combined arms elements.</p>
        <p>The group is mainly modelled on a US Force, bearing US Army ranks, however its structure is not directly drawn from any real world force. It is instead modelled around what allows us to deploy the best quality of functional simulation in both the meta and game space that the game and circumstance of being a sim unit instead of a real job allow.</p>
        <p class="text-center"><img src="/frontend/images/patch_small.png"></p>
    </div>
@endsection

@section('js-bottom')
@endsection
