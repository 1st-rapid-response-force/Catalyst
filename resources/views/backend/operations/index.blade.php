@extends('backend.layout.main_layout')

@section('title','Operations Manager')

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
    <p>Operations Manager allows easy operations management from Catalyst.</p>
    <h4>Administrative Options</h4>
    <p><a class="btn btn-success" href="/admin/operations/create">New Operation</a></p>
    <hr>
    <br>
    @if (count($operations) != 0)
        <table id="operations" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Operation Name</th>
                <th>Operation Date</th>
                <th>Promotion Points</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($operations as $operation)
                <tr>
                    <td>{{$operation->name}}</td>
                    <td>{{ date('F j, Y, g:i a', strtotime($operation->date)) }}</td>
                    <td>{{$operation->promotionPoints}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.operations.show',array($operation->id))}}">View</a>
                        <a class="btn btn-success" href="{{ route('admin.operations.edit',array($operation->id)) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.operations.destroy',array($operation->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no Operations in the database, add one by using the Administrator tools.</p>
    @endif
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#operations").DataTable();
        });
    </script>

@endsection

@section('page-script-include')
@endsection


