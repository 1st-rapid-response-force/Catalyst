@extends('backend.layout.main_layout')
@section('title','Teamspeak')

@section('sub-title','Manager')

@section('scripts-css-header')
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-list"></i> Teamspeak Management</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Teamspeak Management</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">
                <h4>Teamspeak Viewer</h4>
                {!! $viewer !!}
            </div>
            <div class="col-lg-6">
                <h4>Options</h4>
                <button class="btn btn-primary btn-block">Server Announcement</button>
            </div>
        </div>

    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


