@extends('frontend.layouts.infil')

@section('title', 'Infil')

@section('css-top')
@endsection


@section('content')
    <div class="container">
        <h1>1st Rapid Response Force - INFIL INTEL</h1>
        <hr>
        @foreach($articles as $infil)
            <h3>{{$infil->title}} <small>{{$infil->type}}</small></h3>
            <p>Written by {{$infil->vpf}} <small>{{$infil->publish_date->diffForHumans()}}</small></p>
            {!! $infil->body !!}
        @endforeach
        <p>Make sure to report in!</p>
    </div>
@endsection

@section('js-bottom')
@endsection
