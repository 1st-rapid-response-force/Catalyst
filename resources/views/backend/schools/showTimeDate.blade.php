@extends('backend.layout.main_layout')

@section('title','Schools Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/jquery-datetime/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li><a href="{{route('admin.schools.index')}}">Schools Manager</a></li>
    <li class="active">Time/Date Manager</li>
@endsection

@section('content')
    <p>You can edit the name, time and date, and instructor of the course here after is has been created.</p>
    <h3>{{$event->school->name}}</h3>
    <form action="{{route('admin.schools.timeDate.post',[$event->school->id,$event->id])}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Session Name: &nbsp</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$event->name}}" placeholder="Can be left blank for School Name Default">
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Training Date: &nbsp</label>
                <input type="datetime" class="form-control" name="date" id="date" value="{{$event->date}}" placeholder="">
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Responsible Member: &nbsp</label>
                <select name="responsible_id" class="form-control">
                    @foreach($vpfs as $vpf)
                        <option value="{{$vpf->id}}" {{($event->responsible_id == $vpf->id) ? 'selected' : ''}}>{{$vpf}}</option>
                    @endforeach
                </select>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>

@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>


@endsection

@section('page-script-include')
        <!-- Modal -->
    <div class="modal fade" id="newDate" tabindex="-1" role="dialog" aria-labelledby="newDateModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="newDateModal">New Date/Time</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Session Name: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Can be left blank for School Name Default">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Training Date: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="datetime" class="form-control" name="date" id="date" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Responsible Member: &nbsp</label>
                            <div class="col-sm-10">
                                <select name="responsible_id" class="form-control">
                                    @foreach($vpfs as $vpf)
                                    <option value="{{$vpf->id}}">{{$vpf}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            jQuery('#date').datetimepicker({
            });
        });
    </script>
    <script src="/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-datetime/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
@endsection


