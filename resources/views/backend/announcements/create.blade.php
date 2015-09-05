@extends('backend.layout.main_layout')

@section('title','Announcement Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Unit Structure</li>
    <li class="active">Announcement Manager</li>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('admin.announcements.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="subject" class="col-sm-2 control-label">Subject: &nbsp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="subject" name="subject" value="" placeholder="Name of Qualification">
            </div>
        </div>
        <div class="form-group">
            <label for="short_message" class="col-sm-2 control-label">Short Message (used in My Squad): &nbsp</label>
            <div class="col-sm-9">
                <textarea name="short_message" class="form-control"></textarea>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="description" class="control-label">Full Message (emailed and full view available in mySquad): &nbsp</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('admin.announcements.index') }}">Cancel</a>
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace( 'message');
        });
    </script>
@endsection


@section('page-script-include')
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
@endsection



