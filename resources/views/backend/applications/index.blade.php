@extends('backend.layout.main_layout')

@section('title','Applications Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-users"></i> Applications Manager</li>
@endsection

@section('content')
    @include('backend.applications.partials.header-buttons')
    <p>Showing Applications that are currently "Under Review" - You need to either approve or deny the applications.</p>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th class="visible-lg">Created</th>
            <th class="visible-lg">Last Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($apps as $app)
            <tr>
                <td>{{ $app->id }}</td>
                <td>{{ $app->first_name.' '.$app->last_name }}</td>
                <td>{{ $app->status}}</td>
                <td class="visible-lg">{!! $app->created_at->diffForHumans() !!}</td>
                <td class="visible-lg">{!! $app->updated_at->diffForHumans() !!}</td>
                <td><a href="{{route('admin.applications.edit', $app->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a href="{{route('admin.applications.approve', $app->id)}}" class="btn btn-xs btn-success"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Approve"></i></a>
                    <a href="{{route('admin.applications.reject', $app->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Reject"></i></a>
                    <a href="{{ route('admin.applications.destroy',array($app->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $apps->render() !!}
    </div>

@endsection
@section('page-script')

@endsection

@section('page-script-include')
@endsection


