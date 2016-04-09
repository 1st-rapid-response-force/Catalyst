@extends('backend.layout.main_layout')

@section('title','Admin Dashboard')

@section('sub-title','Unit Manager')

@section('scripts-css-header')
        <!-- Calendar -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.2/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="/plugins/jquery-datetime/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />

@endsection

@section('breadcrumbs')
    <li class="active"><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Welcome to Catalyst</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Realism units strive to keep track of members time in service, training, ribbons, and qualifications. Our system accomplishes this and more, our all in one suite integrates several applications and allows you to focus on the gameplay instead of the paperwork.</p>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <!-- Notifications Boxes -->
    <div class="row">
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Active Members</span>
                    <span class="info-box-number">{{$members}}</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="{{route('admin.users.index')}}">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-folder"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Active Applications</span>
                    <span class="info-box-number">{{$applications}}</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="{{route('admin.enlistments.index')}}">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Report in Status</span>
                    <span class="info-box-number">{!! $perstat->report_percentage() !!}%</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="{{route('admin.perstat.index')}}">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-server"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Server Status</span>
                    <span class="info-box-number">NO STATUS</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="#">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-child"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Monthly Donation</span>
                    <span class="info-box-number">${{$cost}}</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="#">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-paperclip"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Paperwork</span>
                    <span class="info-box-number">{{$forms->count()}}</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="{{route('admin.forms.index')}}">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div><!-- End Notification Boxes -->

    <!-- Upcoming Events -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Calendar of Events</h3>
        </div>
        <div class="box-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#eventModal">
                Add Event
            </button>

            <!-- Modal -->
            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="eventModalLabel">Create Event</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.events.postAddEvent')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Event Title">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="1">Training</option>
                                        <option value="2">Modpack</option>
                                        <option value="3">Meetings</option>
                                        <option value="4">Misc</option>
                                        <option value="5">Admin</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="allDay" value="0">
                                        <input type="checkbox" name="allDay" value="1"> Is this event all day?
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="category">Start time:</label>
                                    <input type="datetime" class="form-control" name="start" id="start" placeholder="Start Time">
                                </div>
                                <div class="form-group">
                                    <label for="category">End time:</label>
                                    <input type="datetime" class="form-control" name="end" id="end" placeholder="End Time">
                                </div>

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Event</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            {!! $calendar->calendar() !!}

        </div>
    </div>
@endsection

@section('page-script')
    {!! $calendar->script() !!}

    <script>
        $( document ).ready(function() {
            jQuery('#start').datetimepicker({
            });
            jQuery('#end').datetimepicker({
            });
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/backend/js/moment.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.2/fullcalendar.min.js"></script>
    <script src="/plugins/jquery-datetime/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
@endsection


