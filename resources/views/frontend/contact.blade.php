@extends('frontend.layouts.master')

@section('title', 'Contact')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Contact</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Contact Us</h1>
        <p>Have any questions, request, or general inquiries. Contact one of the following members:</p>
        <div class="media">
            <div class="media-left">
                <a href="/roster/1">
                    <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="{{$rod->vpf->avatar}}" alt="Avatar">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$rod->vpf}}</h4>
                <address>
                    <strong>{{$rod->vpf->assignment->name}}</strong><br>
                    <a href="mailto:{{$rod->email}}">{{$rod->email}}</a>
                </address>
            </div>
        </div>
        <div class="media">
            <div class="media-left">
                <a href="/roster/1">
                    <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="{{$striker->vpf->avatar}}" alt="Avatar">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$striker->vpf}}</h4>
                <address>
                    <strong>{{$striker->vpf->assignment->name}}</strong><br>
                    <a href="mailto:{{$striker->email}}">{{$striker->email}}</a>
                </address>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
