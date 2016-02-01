@extends('frontend.layouts.infil')

@section('title', 'Infil')

@section('css-top')
@endsection


@section('content')
    <div class="container">
        <h1>1st RRF - INFIL INTEL</h1>
        @foreach($articles as $infil)
            <h2>{{$infil->title}} <smalL>{{$infil->type}}</smalL></h2>
            {!! $infil->body !!}
        @endforeach
        <p>Make sure to report in!</p>
    </div>
@endsection

@section('js-bottom')
@endsection
