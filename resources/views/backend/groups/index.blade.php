@extends('backend.layout.main_layout')
@section('title','Groups')

@section('sub-title','Manager')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa fa-users"></i> Group Manager</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Group Manager</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>Allows for management of groups and My Squad view of all groups within the 1st RRF.</p>
        <table class="table table-striped table-bordered table-hover" id="user">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Members</th>
                <th>PERSTAT Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{!! $group->id !!}</td>
                    <td>{!! $group->name !!}</td>
                    <td>{!! $group->description !!}</td>
                    <th>{!! count($group->members) !!}</th>
                    <th>{!! $group->squad_report_percentage() !!}%</th>
                    <td><a href="{{route('admin.groups.mysquad', $group->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View My Squad"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable({
                "iDisplayLength" : 25
            });
        });
    </script>

@endsection


