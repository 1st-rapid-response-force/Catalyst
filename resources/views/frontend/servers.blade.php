@extends('frontend.layouts.master')

@section('title', 'Servers')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Servers</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <h1>Servers</h1>
    <p>List of our servers:</p>
    <h2>Voice</h2>
    <div class="media">
        <div class="media-left">
            <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="/frontend/images/teamspeak.png" alt="Teamspeak">
        </div>
        <div class="media-body">
            <h4 class="media-heading">Teamspeak <small>Voice Server</small></h4>
            <address>
                <strong>ts.1st-rrf.com</strong><br>
                <a class="btn btn-success" href="ts3server://ts.1st-rrf.com?port=9987&addbookmark=1st Rapid Response Force">Connect to Teamspeak Server</a>
            </address>
        </div>
    </div>
    <hr>
    <h2>ARMA Servers</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="/frontend/images/arma3.png" alt="ARMA3">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">ARMA 3 <small>Public Server - Mods</small></h4>
                    <address>
                        <strong>arma.1st-rrf.com:2302</strong><br>
                        <a class="btn btn-success" href="#">Connect to Public Server</a>
                    </address>
                </div>
            </div>
            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="/frontend/images/arma3.png" alt="ARMA3">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">ARMA 3 <small>Deployment Server</small></h4>
                    <address>
                        <strong>public.1st-rrf.com:2302</strong><br>
                        <a class="btn btn-success" href="#">Connect to Deployment Server</a>
                    </address>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="/frontend/images/arma3.png" alt="ARMA3">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">ARMA 3 <small>Training Server</small></h4>
                    <address>
                        <strong>arma.1st-rrf.com:2322</strong><br>
                        <a class="btn btn-success" href="#">Connect to Training Server</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-bottom')
@endsection
