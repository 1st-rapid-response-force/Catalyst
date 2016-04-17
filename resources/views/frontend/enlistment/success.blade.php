@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Enlistment</li>
        <li class="active">Success</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>Application</h1>
            <p>Thank you for applying to the 1st Rapid Response Force.</p>
            <p>While you wait for us to process your application why not:</p>
            <ul>
                <li>Download the <a href="/modpack">modpack via Infil</a></li>
                <li>Hop onto <a href="ts3server://ts.1st-rrf.com?port=9987&addbookmark=1st Rapid Response Force">Teamspeak Server</a> and get to know everyone</li>
                <li>Sign up to the <a href="http://steamcommunity.com/groups/1st-rrf">1st RRF Steam group</a> and get notifications when the public server is running an organized event.</li>
            </ul>
            <p>See you on the Battlefield.</p>
            <div class="text-center">
                <h3>The First Graduating Class of the 1st RRF</h3>
                <img src="https://i.imgur.com/HG3fYPW.jpg" class="img-thumbnail">
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
