@extends('backend.layout.main_layout')

@section('title','Admin Dashboard')

@section('sub-title','Unit Manager')

@section('scripts-css-header')
        <!-- Calendar -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.2/fullcalendar.min.css" rel="stylesheet" type="text/css" />
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
                    <span class="info-box-text">Pending Promotions</span>
                    <span class="info-box-number">0</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="#">More Info</a></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-fighter-jet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Operations to Date</span>
                    <span class="info-box-number">{{$operations}}</span>
                    <span class="info-box-content"><a class="btn btn-default btn-sm" href="{{route('admin.operations.index')}}">More Info</a></span>
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
            <div id="calendar"></div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                // put your options and callbacks here
            })

        });
    </script>
@endsection

@section('page-script-include')
    <script src="/backend/js/moment.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.2/fullcalendar.min.js"></script>
@endsection


