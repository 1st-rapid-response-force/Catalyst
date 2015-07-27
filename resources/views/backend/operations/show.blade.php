@extends('backend.layout.main_layout')

@section('title','Operations Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li><a href="{{route('admin.operations.index')}}">Operations Manager</a></li>
    <li class="active">Show Operation</li>
@endsection

@section('content')
    <h1>{{$operation->name}} <small>- {{ date('F j, Y, g:i a', strtotime($operation->date)) }}</small></h1>
    <p><strong></strong></p>
    <p>{!! $operation->description !!}</p>
    @if (!($operation->storage_image == 'false'))
        <div class="text-center">
            <p>
                <img class="img-responsive" src="{{$operation->public_image}}">
            </p>
        </div>
    @endif
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('page-script-include')

@endsection


