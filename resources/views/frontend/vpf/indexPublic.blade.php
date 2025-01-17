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
        <h1>Virtual Personnel File - {{$user->vpf}} - <small>Public</small></h1>
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
                                    <h5>Military Identification Number (SteamID):</h5>
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
                    <li role="presentation"><a href="#range" aria-controls="range" role="tab" data-toggle="tab">Range Scores</a></li>
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
                                                <td class="col-lg-4"><a href="#">{{$operation->name}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Operations attended on record.</p>
                                @endif
                                <h3>Schools</h3>
                                @if($profile['schools']->count() > 0)
                                    <table class="table table-bordered table-hover" id="formHistoryTable">
                                        <tbody>
                                        @foreach($profile['schools'] as $school)
                                            <tr>
                                                <td class="col-lg-1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$school->pivot->date_attended)->toFormattedDateString()}}</td>
                                                <td class="col-lg-4"><a href="#">{{$school->name}}</a></td>
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
                    <div role="tabpanel" class="tab-pane" id="range">
                        <h3>Range Scores</h3>
                        @if($user->vpf->range_scores->count() > 0)
                            <table class="table table-bordered table-hover" id="formHistoryTable">
                                <thead>
                                <th>Date</th>
                                <th>Range</th>
                                <th>Score Obtained</th>
                                <th>Max Score</th>
                                <th>Weapon Used</th>
                                </thead>
                                <tbody>
                                @foreach($user->vpf->range_scores as $score)
                                    <tr>
                                        <td class="col-lg-1">{{$score->created_at->toFormattedDateString()}}</td>
                                        <td class="col-lg-2">{{$score->range}}</td>
                                        <td class="col-lg-2">{{$score->score}}</td>
                                        <td class="col-lg-2">{{$score->scoreMax}}</td>
                                        <td class="col-lg-2">{{$score}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Range Scores on record, all scores are recorded automatically (Rifle and Pistol only)</p>
                        @endif
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
