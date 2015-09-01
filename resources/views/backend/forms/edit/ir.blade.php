@extends('backend.layout.main_layout')

@section('title','VPF Correction')

@section('sub-title','Forms')

@section('scripts-css-header')
<meta name="csrf-param" content="_token">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
<li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="{{route('admin.vpf.index')}}">Virtual Personnel File</a></li>
<li><a href="{{route('admin.forms.index')}}"> Form Manager</a></li>
<li class="active">Infraction Report - {{$ir->VPF}}</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Forms have been simplified for admin purposes.</p>
                    <form method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>Name of User:</label>
                            <input readonly type="text" value="{{$ir->VPF}}" class="form-control">
                            <a href="{{route('admin.vpf.show',$ir->VPF->id)}}" target="_blank">View Virtual Personal File</a>
                        </div>
                        <div class="form-group">
                            <label>Name of Violator:</label>
                            <input readonly type="text" value="{{$ir->violator_name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Infraction Report Summary:</label>
                            <textarea readonly class="form-control">{{$ir->violation_summary}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Has this issue been reviewed/corrected?</label>
                            <select class="form-control" name="reviewed">
                                <option value="1">Yes</option>
                                <option value="0" selected>No</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <p>If reviewed field is marked as Yes, this will be removed from needs attention</p>
                    </form>
                </div>
            </div>
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


