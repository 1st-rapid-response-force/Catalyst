@extends('frontend.layouts.master')

@section('content')
        <!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <h1>Sign in / Register</h1>
        <p>Our system uses Steam Open ID authentication in order to create and validate your profile.</p>
        <a href="{{SteamLogin::url('http://192.168.33.10/auth/validate')}}"><img src="/images/steam.png"></a>
    </div>
</div>


@endsection

