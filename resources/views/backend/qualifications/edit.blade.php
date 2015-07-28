@extends('backend.layout.main_layout')

@section('title','Qualifications Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li class="active">Qualifications Manager</li>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('admin.qualifications.update',array($qualification->id)) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="{{$qualification->name}}" placeholder="Name of Qualification">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description: &nbsp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="description" name="description" value="{{$qualification->description}}" placeholder="Brief Description">
            </div>
        </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" value="{{$qualification->promotionPoints}}" placeholder="Promotion Points Awarded for Qualification">
                </div>
            </div>
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Current Image: &nbsp</label>
            <div class="col-sm-10">
                <img src="/images/{{$qualification->public_image}}">
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Upload new Image: &nbsp</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('admin.qualifications.index') }}">Cancel</a>
            <input class="btn btn-primary" type="submit">
        </div>

    </form>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
@endsection


