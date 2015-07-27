@extends('backend.layout.main_layout')

@section('title','User Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <link rel="stylesheet" type="text/css" href="/backend/css/gridforms.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/jquery.onoff.css">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.users.index')}}"><i class="fa fa-users"></i> User Management</a></li>
    <li class="active">Edit Member</li>
@endsection

@section('content')
    <form class="grid-form" action="{{ route('admin.users.update',array($user->id)) }}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {!! csrf_field() !!}
        <fieldset>
            <legend>USER INFORMATION</legend>
            <div data-row-span="4">
                <div data-field-span="4">
                    <label>MILITARY IDENTIFICATION NUMBER</label>
                    <input type="text" name="steam_id" required value="{{$user->steam_id}}">
                </div>
            </div>
            <div data-row-span="2">
                <div data-field-span="1">
                    <label>Application ID</label>
                    <input type="text" name="application_id" placeholder="Use 0 to nullify field" value="{{(!is_null($user->application_id)) ? $user->application_id : '0'}}">
                </div>
                <div data-field-span="1">
                    <label>Virtual Personnel File ID</label>
                    <input type="text" name="vpf_id" placeholder="Use 0 to nullify field"  value="{{(!is_null($user->vpf_id)) ? $user->vpf_id : '0'}}">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="3" data-field-error="Please enter a valid email address">
                    <label>E-mail</label>
                    <input type="email" name="email" required value="{{$user->email}}">
                </div>
                <div data-field-span="1" data-field-error="Select one of the radio boxes">
                    <label>Would user like to receive email updates?</label>
                    <label><input type="radio" name="okEmail" value="true" {{($user->okEmail == true) ? 'checked' : ''}}> YES</label> &nbsp;
                    <label><input type="radio" name="okEmail" value="false" {{($user->okEmail == false) ? 'checked' : ''}}> NO</label> &nbsp;
                </div>
            </div>
            <div data-row-span="2">
                <div data-field-span="2" data-field-error="Please enter a valid email address">
                    <label>Roles</label>
                    @if (count($roles) > 0)
                        @foreach($roles as $role)
                            {!! $role->display_name !!}
                            <div class="sw-green create-permissions-switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" value="{{$role->id}}" name="roles[]" {{in_array($role->id, $user_roles) ? 'checked="checked"' : ""}} class="toggleBtn onoffswitch-checkbox" id="role-{{$role->id}}">
                                    <label for="role-{{$role->id}}" class="onoffswitch-label">
                                        <div class="onoffswitch-inner"></div>
                                        <div class="onoffswitch-switch"></div>
                                    </label>
                                </div>
                            </div><!--green checkbox-->
                            <div class="clearfix"></div>
                        @endforeach
                    @else
                        No Roles to set
                    @endif
                </div>
            </div>
        </fieldset>
        <br>
        <div class="pull-right">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
@endsection
@section('page-script')

@endsection

@section('page-script-include')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection


