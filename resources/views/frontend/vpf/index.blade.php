@extends('frontend.layouts.master')

@section('title', 'My Virtual Personnel File')

@section('css-top')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">{{$user->vpf}}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Virtual Personnel File - {{$user->vpf}}</h1>
        <div class="text-center">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="well well-sm">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img style="max-width: 100px; max-height: 100px" src="{{$user->vpf->rank->showSmall()}}" class="center-block">
                                </div>
                                <div class="col-lg-8">
                                    <h3>{{$user->vpf->rank->name.' '.$user->vpf->rank->pay_grade}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Assignment:</h5>
                                <p>{{$user->vpf->assignment->name}} - {{$user->vpf->assignment->mos->mos}}</p>
                                <h5>Group:</h5>
                                {{$user->vpf->assignment->group->name}}
                                <h5>Military Identification Number:</h5>
                                {{$user->steam_id}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="/cac/{{$user->steam_id}}">
            </div>
            <div class="col-md-5">
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Ribbons</h4></div>
                    <div class="panel-body">
                        <div class="row">
                        <?php $i = 3; ?>
                        @foreach($profile['ribbons'] as $image)
                            <div class="col-lg-4">
                                <img style="width: 125px; height:35px;" src="{{$image->showSmall()}}">
                                <small>{{$image->name}}</small>
                            </div>
                            <?php if (($i != 0) && (($i % 1) == 1)) echo '</div><div class="row text-center">'; ?>
                                <?php $i--; ?>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <hr>
        <div class="row">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#serviceHistory" aria-controls="serviceHistory" role="tab" data-toggle="tab">Service History</a></li>
                    <li role="presentation"><a href="#formHistory" aria-controls="formHistory" role="tab" data-toggle="tab">Form History</a></li>
                    <li role="presentation"><a href="#opqualschool" aria-controls="opqualschool" role="tab" data-toggle="tab">Operations, Qualifications, Schools</a></li>
                    <li role="presentation"><a href="#request-options" aria-controls="request-options" role="tab" data-toggle="tab">Requests & Options</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="serviceHistory">
                        <br>
                        @if($profile['serviceHistory']->count() > 0)
                        <table class="table table-bordered table-hover" id="serviceHistoryTable">
                            <thead>
                                <th>Date</th>
                                <th>Note</th>
                            </thead>
                            <tbody>

                            @foreach($profile['serviceHistory'] as $serviceHistory)
                                <tr>
                                    <td class="col-lg-2">{{\Carbon\Carbon::createFromFormat('Y-m-d',$serviceHistory->date)->toFormattedDateString()}}</td>
                                    <td class="col-lg-10">{{$serviceHistory->note}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>No Service History for this member.</p>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="formHistory">
                            <br>
                            @if($profile['forms']->count() > 0)
                            <table class="table table-bordered table-hover" id="formHistoryTable">
                                <thead>
                                <th>Date</th>
                                <th>Form</th>
                                </thead>
                                <tbody>
                                @foreach($profile['forms'] as $form)
                                <tr>
                                    <td class="col-lg-2">{{$form->updated_at->toFormattedDateString()}}</td>
                                    <td class="col-lg-10"><a href="/forms/show/{{$form->form_type}}/{{$form->id}}">{{$form->form_name}}</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Form History for this member.</p>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="opqualschool">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Qualifications</h3>
                                @if($profile['qualifications']->count() > 0)
                                    @foreach($profile['qualifications'] as $qualification)
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" style="max-height: 75px; max-width: 75px" src="{{$qualification->showSmall()}}" alt="{{$qualification->name}}">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$qualification->name}}</h4>
                                                {{$qualification->description}}<br>Awarded on {{\Carbon\Carbon::createFromFormat('Y-m-d',$qualification->pivot->date_awarded)->toFormattedDateString()}}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No Qualifications to display.</p>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <h3>Operations</h3>
                                @if($profile['operations']->count() > 0)
                                    <table class="table table-bordered table-hover" id="formHistoryTable">
                                        <tbody>
                                        @foreach($profile['operations'] as $operation)
                                            <tr>
                                                <td class="col-lg-1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$operation->pivot->date_attended)->toFormattedDateString()}}</td>
                                                <td class="col-lg-4"><a href="/schools/">{{$operation->name}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Schools attended on record.</p>
                                @endif
                                <h3>Schools</h3>
                                @if($profile['schools']->count() > 0)
                                    <table class="table table-bordered table-hover" id="formHistoryTable">
                                        <tbody>
                                    @foreach($profile['schools'] as $school)
                                            <tr>
                                                <td class="col-lg-1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$school->pivot->date_attended)->toFormattedDateString()}}</td>
                                                <td class="col-lg-4"><a href="/schools/">{{$school->name}}</a></td>
                                            </tr>
                                    @endforeach
                                            </tbody>
                                    </table>
                                @else
                                    <p>No Schools attended on record.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="request-options">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Requests</h3>
                                <a class="btn btn-block btn-default" href="/forms/create/ir">File an Infraction Report</a>
                                <a class="btn btn-block btn-default" href="/forms/create/vpf_cr">File Virtual Personnel File Correction</a>
                                <a class="btn btn-block btn-default" href="/forms/create/assignment_change">File Assignment Change Request</a>
                                <hr>
                                <a class="btn btn-block btn-danger" href="/forms/create/discharge">File Discharge Paperwork</a>
                            </div>
                            <div class="col-lg-6">
                                <h3>Options</h3>
                                <a class="btn btn-block btn-primary" href="{{route('vpf.donate')}}">Manage Donations</a>
                                <a class="btn btn-block btn-primary" href="{{route('vpf.teamspeak')}}">Manage Teamspeak IDs</a>
                                <a class="btn btn-block btn-primary" href="{{route('vpf.faces')}}">Edit Face</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript">
    </script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection
