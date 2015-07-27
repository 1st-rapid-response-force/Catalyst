@extends('backend.layout.main_layout')

@section('title','User Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-users"></i> User Management</li>
@endsection

@section('content')
    @include('backend.users.partials.header-buttons')
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Steam ID</th>
            <th>Roles</th>
            <th class="visible-lg">Created</th>
            <th class="visible-lg">Last Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->steam_id !!}</td>
                <td>
                    @if ($user->roles()->count() > 0)
                        @foreach ($user->roles as $role)
                            {!! $role->display_name !!}<br/>
                        @endforeach
                    @else
                        None
                    @endif
                </td>
                <td class="visible-lg">{!! $user->created_at->diffForHumans() !!}</td>
                <td class="visible-lg">{!! $user->updated_at->diffForHumans() !!}</td>
                <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a href="{{ route('admin.users.destroy',array($user->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
@endsection


