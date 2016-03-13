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
    <li><a href="{{route('admin.schools.show',$school->id)}}">Show School</a></li>
    <li class="active">Show a Section</li>
@endsection

@section('content')
        <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{$section->name}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            {!! $section->video!!}
            <hr>
            {!! $section->content !!}
            <br>
            <a href="{{route('admin.schools.show',$school->id)}}" class="btn btn-primary">Back to School</a>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
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


