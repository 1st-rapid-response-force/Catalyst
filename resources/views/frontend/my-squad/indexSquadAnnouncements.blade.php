
@extends('frontend.layouts.master')

@section('title', 'Squad Announcements')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('squad')}}">My Squad</a></li>
        <li class="active">Squad Announcements</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Squad- Squad Announcements</h1>
        <hr>
        @if($ann->count() > 0)
            @foreach($ann as $announcement)
                <div class="media">
                    <div class="media-left">
                        <a href="/roster/1">
                            <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="{{$announcement->creator->user->vpf->avatar}}" alt="Avatar">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$announcement->creator}}</h4>
                        <p>{!! $announcement->message !!}</p>
                        <small><a href="{{route('squad.announcement.edit',$announcement->id)}}">Edit Message</a></small>
                        <div class="text-muted"><small>Posted {!! $announcement->created_at->diffForHumans() !!} {{($announcement->created_at != $announcement->updated_at) ? '| Edited '.$announcement->updated_at->diffForHumans() : ''}}</small></div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No announcements to display.</p>
        @endif
        <div class="text-center">
            {!! $ann->render() !!}
        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
