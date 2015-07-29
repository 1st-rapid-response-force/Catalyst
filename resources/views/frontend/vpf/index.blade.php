@extends('frontend.layouts.master')

@section('css-top')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

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
                    <li role="presentation" class="active"><a href="#serviceHistory" aria-controls="serviceHistory" role="tab" data-toggle="tab">Service History</a></li>
                    <li role="presentation"><a href="#forms" aria-controls="forms" role="tab" data-toggle="tab">Forms</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="serviceHistory">
                        <br>
                        <table class="table table-bordered table-hover" id="serviceHistoryTable">
                            <thead>
                            <th>Date:</th>
                            <th>Note:</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>04/29/1995</td>
                                    <td>For outstanding service completing Basic Training</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div role="tabpanel" class="tab-pane active" id="formHistory">
                            <br>
                            <table class="table table-bordered table-hover" id="formHistoryTable">
                                <thead>
                                <th>Date:</th>
                                <th>Note:</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>04/29/1995</td>
                                    <td>For outstanding service completing Basic Training</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                    <div role="tabpanel" class="tab-pane" id="settings">...</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript">
        $(function () {
            $("#serviceHistoryTable").DataTable();
            $("#serviceHistoryTable").DataTable();
        });
    </script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection
