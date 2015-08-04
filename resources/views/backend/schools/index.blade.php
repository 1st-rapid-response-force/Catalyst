@extends('backend.layout.main_layout')

@section('title','Schools Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li class="active">Schools Manager</li>
@endsection

@section('content')
    <p>The following are the School that have been set up in the unit.</p>
    <h4>Administrative Options</h4>
    <p><a class="btn btn-success" href="{{route('admin.schools.create')}}">New School</a></p>
    <hr>
    <br>
    @if (count($schools) != 0)
        <table id="table" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>School Name</th>
                <th>Promotion Points</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{$school->name}}</td>
                    <td>{{$school->promotionPoints}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.schools.timeDate.index',array($school->id))}}">Time/Date</a>
                        <a class="btn btn-primary" href="{{route('admin.schools.show',array($school->id))}}">View</a>
                        <a class="btn btn-success" href="{{ route('admin.schools.edit',array($school->id)) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.schools.destroy',array($school->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no Schools in the database, add one by using the Administrator tools.</p>
    @endif
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#table").DataTable();
        });
    </script>
@endsection

@section('page-script-include')

@endsection


