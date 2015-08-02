
@extends('frontend.layouts.master')

@section('title', 'Edit Chatter Message')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('squad')}}">My Squad</a></li>
        <li class="active">Edit Squad Announcement</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Squad- Edit Squad Announcement Message</h1>
        <hr>
        <form action="{{route('squad.announcement.update',$announcement->id)}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <textarea class="form-control" name="chatter" rows="20">{{$announcement->message}}</textarea>
            </div>
            <input type="submit" class="btn btn-success">
        </form>
    </div>
@endsection

@section('js-bottom')
@endsection
