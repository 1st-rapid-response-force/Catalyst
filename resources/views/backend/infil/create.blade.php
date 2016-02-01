@extends('backend.layout.main_layout')
@section('title','Infil - Launcher Annoucements')

@section('sub-title','Manager')


@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.infil.index')}}"><i class="fa fa-list"></i> Infil - Launcher Annoucements</a></li>
    <li class="active"><i class="fa fa-list"></i> Infil - Launcher Annoucements</li>
@endsection

@section('content')
    <p>Add a new operation</p>
    <form class="form-horizontal" method="POST" action="{{ route('admin.infil.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Title: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title of Announcement">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Type: &nbsp</label>
            <div class="col-sm-10">
                <select name="type" class="form-control">
                    <option value="Deployment">Deployment</option>
                    <option value="Event">Event</option>
                    <option value="News">News</option>
                    <option value="Misc">Misc</option>
                    <option value="ARMA">ARMA</option>
                    <option value="Modpack">Modpack</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Publish On Date: &nbsp</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="publish_date" placeholder="01/01/2000">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Published: &nbsp</label>
            <label class="radio-inline">
                <input type="hidden" name="published" value="0" checked>
                <input type="checkbox" name="published" id="published" value="1"> Yes
            </label>
        </div>


        <label for="description" class="control-label">Message: &nbsp</label>
        <textarea id="description" name="body" placeholder="Message goes here" rows="20" cols="80"></textarea>



        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{route('admin.infil.index')}}">Cancel</a>
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
@endsection
@section('page-script')
    <script type="text/javascript">
        $(function () {
            $("select").select2();
        });
    </script>
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace( 'description');
            $('#timepicker').timepicker({
                template: 'dropdown',
                showInputs: false,
                minuteStep: 15
            });
        });

    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
@endsection


