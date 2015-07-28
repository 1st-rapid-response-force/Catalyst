@extends('emails.layout.main')

@section('header-image')
    <div class="row" style="height: 400px;position:relative;background-image:url('http://i.imgur.com/1X7YmJ9.jpg');padding:50px;background-size: cover;">
        <h1>Combined Arms MILSIM</h1>
        <h2>Done Right</h2>
    </div>

@endsection

@yield('content')