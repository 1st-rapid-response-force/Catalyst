@extends('frontend.layouts.master')

@section('css-top')
@endsection

@section('content')
    <div class="container">
        <h1>Virtual Personnel File - {{$user->vpf}}</h1>
        <div class="text-center">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img style="max-width: 100px; max-height: 100px" src="/images/{{$user->vpf->rank->public_image}}">
                                </div>
                                <div class="col-lg-8">
                                    <h3>{{$user->vpf->rank->name.' - '.$user->vpf->rank->pay_grade}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Assignment:</h5>
                                <p>{{$user->vpf->assignment->name}}</p>
                                <h5>Group:</h5>
                                {{$user->vpf->assignment->group->name}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="/cac/{{$user->steam_id}}">
            </div>
            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-heading"><h4>Ribbons</h4></div>
                    <div class="panel-body">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <br><br>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <br><br>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Army_Service_Ribbon.svg/106px-Army_Service_Ribbon.svg.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="pull-right">
            <small>Modify Face</small>
        </div>
        <br><br>
        <div class="row">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">...</div>
                    <div role="tabpanel" class="tab-pane" id="profile">...</div>
                    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                    <div role="tabpanel" class="tab-pane" id="settings">...</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
