@extends('backend.layout.main_layout')

@section('title','Schools Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li><a href="{{route('admin.schools.index')}}">Schools Manager</a></li>
    <li class="active">Time/Date Manager</li>
@endsection

@section('content')
    <p>The following are the School that have been set up in the unit.</p>
    <h4>Administrative Options</h4>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newDate">New Training Date</button>
    @if ($school->schoolDate->count() > 0)
        @foreach($school->schoolDate as $date)
                <h4>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->date)->toDayDateTimeString()}} - <a href="{{ route('admin.schools.timeDate.delete',array($school->id,$date->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></h4>
                @if($date->vpf->count() > 0)
                <ol>
                    @foreach($date->vpf as $vpf)
                        <li>{{$vpf}}</li>
                    @endforeach
                </ol>
                @else
                    <p>No members have signed up to this session</p>
                @endif
        @endforeach
    @else
        <p>There is no Training Dates for this School.</p>
    @endif
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
                            <label for="description" class="col-sm-2 control-label">Training Date: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="date" name="date" placeholder="01/01/2000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Training Time: &nbsp</label>
                            <div class="col-sm-10">
                                <div class="bootstrap-timepicker">
                                    <input id="timepicker" class="form-control" name="time" type="text" class="input-small">
                                </div>
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

    <script type="text/javascript">
        $(function () {
            $('#timepicker').timepicker({
                template: 'dropdown',
                showInputs: false,
                minuteStep: 15
            });
        });
    </script>
    <script src="/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
@endsection


