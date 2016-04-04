@extends('backend.layout.main_layout')

@section('title','School Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li><a href="{{route('admin.schools.index')}}">Schools Manager</a></li>
    <li><a href="{{route('admin.schools.edit',$school->id)}}">Edit School</a></li>
    <li class="active">Add a Section</li>
@endsection


@section('content')
    <form class="form-horizontal" action="{{ route('admin.schools.section.store',array($school->id)) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" required placeholder="Name of Section">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Order ID: &nbsp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="order" name="order" required placeholder="Lower Numbers displayed first, and increment">
            </div>
        </div>
        <div class="form-group">
            <label for="section" class="col-sm-2 control-label">Next Section: &nbsp</label>
            <div class="col-sm-9">
                <select name="next_section" class="form-control">
                    <option value="None">None</option>
                    @foreach($school->sections as $sec)
                        <option value="{{$sec->id}}">{{$sec->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">1st RRF Documentation URL: &nbsp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="documentation_url" name="documentation_url" placeholder='https://documentation.1st-rrf.com/'>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('admin.schools.edit',$school->id) }}">Cancel</a>
            <input class="btn btn-primary" type="submit">
        </div>

    </form>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('content');
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/ckeditor-admin/ckeditor.js" type="text/javascript"></script>
@endsection


