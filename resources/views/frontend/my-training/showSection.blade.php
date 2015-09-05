@extends('frontend.layouts.master')

@section('title', 'About')

@section('css-top')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('training')}}">My Training</a></li>
        <li class="active">{{$school->name}}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Training - {{$user->vpf}} - {{$school->name}}</h1>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <h3>{{$section->name}}</h3>
                {!! $section->content !!}
                @if($section->video != '')
                <hr>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$section->video}}" frameborder="0" allowfullscreen></iframe>
                </div>
                @endif
                <br><br>
                <a href="{{route('training.show',$school->id)}}" class="btn btn-primary">Back to School</a>
                @if($section->next_section != "None")
                    <a href="{{route('training.section.show',array($school->id,$section->next_section))}}" class="btn btn-success">Next Section</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection
