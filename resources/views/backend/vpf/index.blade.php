@extends('backend.layout.main_layout')

@section('title','VPF Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-users"></i> VPF Manager</li>
@endsection

@section('content')
    <table class="table table-striped table-bordered table-hover" id="user">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Group</th>
            <th>Assignment</th>
            <th>Status</th>
            <th class="visible-lg">Created</th>
            <th class="visible-lg">Last Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vpfs as $vpf)
            <tr>
                <td>{!! $vpf->id !!}</td>
                <td>{!! $vpf !!}</td>
                <td>{!! $vpf->assignment->group->name !!}</td>
                <td>{!! $vpf->assignment->name !!} - {!! $vpf->assignment->mos->mos !!}</td>
                <td>{!! $vpf->status !!}</td>
                <td class="visible-lg">{!! $vpf->created_at->diffForHumans() !!}</td>
                <td class="visible-lg">{!! $vpf->updated_at->diffForHumans() !!}</td>
                <td><a href="{{route('admin.vpf.show', $vpf->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a href="{{ route('admin.vpf.destroy',array($vpf->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable();
        });
    </script>
@endsection


