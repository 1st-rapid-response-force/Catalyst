@extends('backend.layout.main_layout')

@section('title','Discharge')

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
<li class="active">Discharge Paperwork - {{$dis->VPF}}</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Forms have been simplified for admin purposes.</p>
                    <form method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>Name of User:</label>
                            <input readonly type="text" value="{{$dis->name}}" class="form-control">
                            <a href="{{route('admin.vpf.show',$dis->VPF->id)}}" target="_blank">View Virtual Personal File</a>
                        </div>
                        <div class="form-group">
                            <label>Reason for Discharge:</label>
                            <textarea readonly class="form-control">{{$dis->discharge_text}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Discharge Type</label>
                            <select class="form-control" name="discharge_type">
                                <option value="General Discharge">General Discharge</option>
                                <option value="Honorable Discharge">Honorable Discharge</option>
                                <option value="Administrative Discharge" >Administrative Discharge</option>
                                <option value="Other than Honorable Discharge" >Other than Honorable Discharge</option>
                                <option value="Bad Conduct Discharge" >Bad Conduct Discharge</option>
                                <option value="Dishonorable Discharge" >Dishonorable Discharge</option>
                                <option value="Retired" >Retired</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <p>Once processed, the form will be autopopulated with your information and the user will be notified.</p>
                    </form>
                </div>
            </div>
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


