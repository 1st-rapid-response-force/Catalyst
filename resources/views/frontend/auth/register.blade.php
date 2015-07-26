@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('content')
    <div class="container">
        <h1>Account Registration</h1>
        <p>This registration form is used to create an account on the 1st RRF systems. This will allow you to view billet availability, sign up for email's for when a specific billet becomes available, and most importantly enlist in the unit.</p>
        <p>1st Rapid Response Force systems use Steam Open ID authentication for login. For more information <a href="http://steamcommunity.com/dev">click here.</a></p>
        <hr>
        <form class="grid-form" action="/auth/register" method="post">
            {!! csrf_field() !!}
            <fieldset>
                <legend>Basic Information</legend>
                <div data-row-span="4">
                    <div data-field-span="4" data-field-error="Please enter a valid email address">
                        <label>E-mail</label>
                        <input type="email" name="email" required>
                    </div>
                </div>
                <div data-row-span="2">
                    <div data-field-span="1">
                        <label>Would you like to receive email updates?</label>
                        <label><input type="radio" name="okEmail" value="true" checked> YES</label> &nbsp;
                        <label><input type="radio" name="okEmail" value="false"> NO</label> &nbsp;
                    </div>
                    <div data-field-span="1">
                        <label>Steam ID</label>
                        <input type="text" disabled value="{{$steam_id}}">
                        <input type="hidden" name="steam_id" value="{{$steam_id}}">
                    </div>
                </div>
            </fieldset>
            <div class="pull-right">
                <br>
                <input type="submit">
            </div>
            <br>
        </form>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
