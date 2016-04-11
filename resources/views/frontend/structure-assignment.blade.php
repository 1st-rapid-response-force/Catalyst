@extends('frontend.layouts.master')

@section('title', 'Structure and Assignments')

@section('css-top')
    <link rel="stylesheet" href="/plugins/jquery-org/jquery.orgchart.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Structure and Assignment</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Structure and Assignments</h1>
        <h2>Ranks</h2>
        <p>We use a rank structure based on the US Army to create a rich experience and atmosphere.</p>
        <p>Our promotions are based on a point system that rewards activity and positive actions, meaning effort is directly rewarded and ranks hold value.</p>
        <p>However we make sure that ranks are limited by our unique MOS system. In the RRF, we don't hand out ranks that are not meaningful for a given position.</p>

        <h3>Officer Ranks</h3>
        <div class="text-center">
            <table class="table table-hover" id="ranks">
                <thead>
                @foreach($officerRanks as $rank)
                    <th ><img style="max-width: 100px; max-height: 100px; border: none;" class="center-block" src="{{$rank->showSmall()}}"></th>
                @endforeach
                </thead>
                <tbody>
                <tr>
                    @foreach($officerRanks as $rank)
                        <td><strong>{{$rank->name}}</strong><br>{{$rank->abbreviation}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

        <h3>Warrant Ranks</h3>
        <div class="text-center">
            <table class="table table-hover" id="ranks">
                <thead>
                @foreach($warrantRanks as $rank)
                    <th><img style="max-width: 100px; max-height: 100px; border: none;" class="center-block" src="{{$rank->showSmall()}}"></th>
                @endforeach
                </thead>
                <tbody>
                <tr>
                    @foreach($warrantRanks as $rank)
                        <td><strong>{{$rank->name}}</strong><br>{{$rank->abbreviation}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

        <h3>Enlistment Ranks</h3>
        <div class="text-center">
            <table class="table table-hover" id="ranks">
                <thead>
                @foreach($enlistedRanks as $rank)
                    <th><img style="max-width: 100px; max-height: 100px; border: none;" class="center-block" src="{{$rank->showSmall()}}"></th>
                @endforeach
                </thead>
                <tbody>
                <tr>
                    @foreach($enlistedRanks as $rank)
                        <td><strong>{{$rank->name}}</strong><br>{{$rank->abbreviation}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#assignments" aria-controls="assignments" role="tab" data-toggle="tab">Assignments</a></li>
                <li role="presentation"><a href="#recruits" aria-controls="structure" role="tab" data-toggle="tab">Recruits</a></li>
                <li role="presentation"><a href="#discharges" aria-controls="structure" role="tab" data-toggle="tab">Discharges</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="assignments">
                    <h2>Assignments</h2>
                    <p>The NATO RRF is designed to scale to a maximum personnel allocation of 150 combat troops with several support elements. Every member of the unit will at all times hold a single assignment. Assignments are mutually exclusive positions which have required playtime, training and commitment attributes attached to them. On</p>
                    <h3>1st Rapid Response Force</h3>
                    <div class="row">
                        <div class="col-lg-4">
                            @foreach($group1 as $group)
                                @if(!($group->assignments->count() == 0))
                                    <h5><strong>{{$group->name}}</strong></h5>
                                    @foreach($group->assignments as $assignment)
                                        @if(!is_null($assignment->member))
                                            <img src="/frontend/images/avatars/members/{{$assignment->member->user->steam_id}}.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> <a href="/roster/{{$assignment->member->id}}">{{$assignment->member->user->vpf}} - {{$assignment->name}}</a></br>
                                        @else
                                            <img src="/frontend/images/avatars/background.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> {{$assignment->name}}</br>
                                        @endif
                                    @endforeach
                                @else
                                    <h4><strong>{{$group->name}}</strong></h4>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-4">
                            @foreach($group2 as $group)
                                @if(!($group->assignments->count() == 0))
                                    <h5><strong>{{$group->name}}</strong></h5>
                                    @foreach($group->assignments as $assignment)
                                        @if(!is_null($assignment->member))
                                            <img src="/frontend/images/avatars/members/{{$assignment->member->user->steam_id}}.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> <a href="/roster/{{$assignment->member->id}}">{{$assignment->member->user->vpf}} - {{$assignment->name}}</a></br>
                                        @else
                                            <img src="/frontend/images/avatars/background.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> {{$assignment->name}}</br>
                                        @endif
                                    @endforeach
                                @else
                                    <h4><strong>{{$group->name}}</strong></h4>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-4">
                            @foreach($group3 as $group)
                                @if(!($group->assignments->count() == 0))
                                    <h5><strong>{{$group->name}}</strong></h5>
                                    @foreach($group->assignments as $assignment)
                                        @if(!is_null($assignment->member))
                                            <img src="/frontend/images/avatars/members/{{$assignment->member->user->steam_id}}.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> <a href="/roster/{{$assignment->member->id}}">{{$assignment->member->user->vpf}} - {{$assignment->name}}</a></br>
                                        @else
                                            <img src="/frontend/images/avatars/background.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> {{$assignment->name}}</br>
                                        @endif
                                    @endforeach
                                @else
                                    <h4><strong>{{$group->name}}</strong></h4>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane " id="recruits">
                    <h5><strong>Recruits</strong></h5>
                    @foreach($recruits as $recruit)
                            <img src="/frontend/images/avatars/members/{{$recruit->user->steam_id}}.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> <a href="/roster/{{$recruit->id}}">{{$recruit}} - Recruit</a></br>
                    @endforeach
                </div>
                <div role="tabpanel" class="tab-pane " id="discharges">
                    <h5><strong>Discharges</strong></h5>
                    @foreach($discharges as $discharge)
                        <img src="/frontend/images/avatars/background.png" class="img-circle" style="padding: 2px; height: 32px; width: 32px;"> <a href="/roster/{{$discharge->id}}">{{$discharge}} - {{$discharge->discharges->first()->discharge_type}}</a></br>
                    @endforeach
                </div>
            </div>
            <small class="pull-right">This assignment chart is system generated, report any errors via an error report form
            </small>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script src="/plugins/jquery-org/jquery.orgchart.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $("#structure").orgChart({container: $("#structureHolder")});
        });
    </script>

@endsection
