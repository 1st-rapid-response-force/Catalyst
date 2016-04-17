@extends('backend.layout.main_layout')

@section('title','Announcement Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Unit Structure</li>
    <li class="active">Announcement Manager</li>
@endsection

@section('content')
    <p>The following are the announcements that have been issued to the unit. The system is setup to display two announcements per My Squad and issues and email to all active members</p>
    <h4>Administrative Options</h4>
    <p><a href="{{route('admin.announcements.create')}}" class="btn btn-success">New Announcement</a>
    </p>
    <hr>
    <br>
    @if (count($announcements) != 0)
        <table id="announcements" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Date</th>
                <th>Subject</th>
                <th>Issued By</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($announcements as $announcement)
                <tr>
                    <td>{{$announcement->created_at->toDayDateTimeString()}}</td>
                    <td>{{$announcement->subject}}</td>
                    <td>{{$announcement->creator}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.announcements.edit',array($announcement->id)) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.announcements.destroy',array($announcement->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no Announcements in the database, add one by using the Administrator tools.</p>
    @endif
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#announcements").DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
    @endsection

@section('page-script-include')
@endsection


