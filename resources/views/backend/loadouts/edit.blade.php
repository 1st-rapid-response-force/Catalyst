@extends('backend.layout.main_layout')

@section('title','Loadout Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li class="active">Loadout Manager</li>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('admin.loadouts.update',array($loadout->id)) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{$loadout->name}}" placeholder="Name of Loadout Item">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Category: &nbsp</label>
            <div class="col-sm-10">
                <select class="form-control" name="category">
                    <option {{($loadout->category == 'primary') ? 'selected' : ''}} value="primary">Primary Weapon</option>
                    <option {{($loadout->category == 'secondary') ? 'selected' : ''}} value="secondary">Secondary Weapon</option>
                    <option {{($loadout->category == 'launcher') ? 'selected' : ''}} value="launcher">Launcher Weapon</option>
                    <option {{($loadout->category == 'thrown') ? 'selected' : ''}} value="thrown">Thrown</option>
                    <option {{($loadout->category == 'uniform') ? 'selected' : ''}} value="uniform">Uniform</option>
                    <option {{($loadout->category == 'vest') ? 'selected' : ''}} value="vest">Vest</option>
                    <option {{($loadout->category == 'backpack') ? 'selected' : ''}} value="backpack">Backpack</option>
                    <option {{($loadout->category == 'helmet') ? 'selected' : ''}} value="helmet">Helmet</option>
                    <option {{($loadout->category == 'goggles') ? 'selected' : ''}} value="goggles">Goggles Slot</option>
                    <option {{($loadout->category == 'nightvision') ? 'selected' : ''}} value="nightvision">Nightvision Slot</option>
                    <option {{($loadout->category == 'binoculars') ? 'selected' : ''}} value="binoculars">Binoculars Slot</option>
                    <option {{($loadout->category == 'primary_attachments') ? 'selected' : ''}} value="primary_attachments">Primary Attachments</option>
                    <option {{($loadout->category == 'secondary_attachments') ? 'selected' : ''}} value="secondary_attachments">Secondary Attachments</option>
                    <option {{($loadout->category == 'launcher_attachments') ? 'selected' : ''}} value="launcher_attachments">Launcher Attachments</option>
                    <option {{($loadout->category == 'items') ? 'selected' : ''}} value="items">Items</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="class_name" class="col-sm-2 control-label">Class Name ARMA 3: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="class_name" value="{{$loadout->class_name}}" name="class_name" placeholder="Class Name">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Required Qualification: &nbsp</label>
            <div class="col-sm-10">
                <select class="form-control" name="qualification_id">
                    @foreach($qualifications as $qualification)
                        <option {{($loadout->qualification_id == $qualification->id) ? 'selected' : ''}} value="{{$qualification->id}}">{{$qualification->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Image: &nbsp</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Current Image: &nbsp</label>
            <div class="col-sm-10">
                <img src="/images/{{$loadout->public_image}}">
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('admin.loadouts.index') }}">Cancel</a>
            <input class="btn btn-primary" type="submit">
        </div>

    </form>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('page-script-include')

@endsection


