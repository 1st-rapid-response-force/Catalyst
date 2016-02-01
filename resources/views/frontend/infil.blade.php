@extends('frontend.layouts.infil')

@section('title', 'Infil')

@section('css-top')
@endsection


@section('content')
    <div class="container">
        <div class="text-center">
            <h2>INFIL INTEL</h2>
        </div>
        <hr>
        @foreach($articles as $infil)
            <h3>{{$infil->title}} <small>{{$infil->type}}</small></h3>
            <p>Written by {{$infil->vpf}} <small>{{$infil->publish_date->diffForHumans()}}</small></p>
            {!! $infil->body !!}
            <hr>
        @endforeach
        <p>Make sure to report in!</p>
    </div>
@endsection

@section('js-bottom')
@endsection
