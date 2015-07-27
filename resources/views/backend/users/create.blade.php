@extends('backend.layout.main_layout')

@section('title','User Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/members"><i class="fa fa-users"></i> Member Management</a></li>
    <li class="active">Create Member</li>
@endsection

@section('content')
    <form class="grid-form" action="{{ route('admin.users.store')}}" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend>USER INFORMATION</legend>
            <div data-row-span="4">
                <div data-field-span="3" data-field-error="Please enter a valid email address">
                    <label>E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div data-field-span="1" data-field-error="Select one of the radio boxes">
                    <label>Would user like to receive email updates?</label>
                    <label><input type="radio" name="okEmail" value="true" checked> YES</label> &nbsp;
                    <label><input type="radio" name="okEmail" value="false"> NO</label> &nbsp;
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="4">
                    <label>MILITARY IDENTIFICATION NUMBER</label>
                    <input type="text" name="steam_id" required>
                </div>
            </div>
        </fieldset>
            <br>
            <div class="pull-right">
                <input type="hidden" name="user_id">
                <input class="btn btn-primary" type="submit">
            </div>
        </fieldset>
    </form>
@endsection
@section('page-script')

@endsection

@section('page-script-include')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection


