
@extends('frontend.layouts.master')

@section('title', 'Teamspeak Manager')

@section('css-top')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">Teamspeak Manager</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Virtual Personnel File - {{$user->vpf}} - <small>Teamspeak Management</small></h1>
        <p>All of your teamspeak accounts must be tied to the central database in order to ensure all ranks, permissions, and groups are synced to all of your teamspeak clients. </p>
        <p>You can find your Unique ID in Teamspeak Application by opening the Setting->Identities (CTRL+I), it will be the "Unique ID" value in your active profile.</p>

        <div class="panel panel-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-condensed">
                        <thead>
                        <th>Device Description</th>
                        <th>UUID</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @if($user->vpf->teamspeak->count() > 0)
                            @foreach($user->vpf->teamspeak as $teamspeak)
                                <tr>
                                    <td>{{$teamspeak->description}}</td>
                                    <td>{{$teamspeak->uuid}}</td>
                                    <td><a href="{{ route('vpf.teamspeak.delete',array($teamspeak->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Teamspeak UUID on File, add one</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-lg-offset-9">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#teamspeak">
                    Add Teamspeak UUID
                </button>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script src="/backend/js/rails.js" type="text/javascript"></script>


    <!-- Modal -->
    <div class="modal fade" id="teamspeak" tabindex="-1" role="dialog" aria-labelledby="teamspeak">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="teamspeak">Add Teamspeak UUID</h4>
                </div>
                <div class="modal-body">
                    <form method="POST">
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" placeholder="Device Description - Main Computer, Cellphone, Laptop" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="uuid" class="form-control" placeholder="Unique ID" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Teamspeak ID</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
