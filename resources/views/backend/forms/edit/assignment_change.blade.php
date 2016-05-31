@extends('backend.layout.main_layout')

@section('title','Assignment Change')

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
<li class="active">Assignment Change Request - {{$ac->VPF}}</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Forms have been simplified for admin purposes.</p>
                    <form method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>Name of User:</label>
                            <input readonly type="text" value="{{$ac->VPF}}" class="form-control">
                            <a href="{{route('admin.vpf.show',$ac->VPF->id)}}" target="_blank">View Virtual Personal File</a>
                        </div>
                        <div class="form-group">
                            <label>Requested Assignment:</label>
                            <input type="text" class="form-control" readonly value="{{$ac->requestedAssignment->name}} - {{$ac->requestedAssignment->mos->mos}} - {{$ac->requestedAssignment->group->name}}">
                        </div>
                        <div class="form-group">
                            <label>Request Reason:</label>
                            <textarea readonly class="form-control">{{$ac->request_reason}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Has this issue been reviewed/corrected?</label>
                            <select class="form-control" name="reviewed">
                                <option value="1" {{$ac->reviewed ? "selected" : ""}}>Yes</option>
                                <option value="0" {{!$ac->reviewed ? "selected" : ""}}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Is this request approved?</label>
                            <select class="form-control" name="approved">
                                <option value="1" {{$ac->approved ? "selected" : ""}}>Yes</option>
                                <option value="0" {{!$ac->approved ? "selected" : ""}}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>New Assignment</label>
                            <select value="requested_assignment" name="requested_assignment" class="form-control">
                                @foreach($assignmentList as $assignment)
                                    <option value="{{$assignment->id}}">{{$assignment->name}} - {{$assignment->mos->mos}} - {{$assignment->group->name}}</option>
                                @endforeach
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


