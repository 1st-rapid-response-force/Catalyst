@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" href="/plugins/jquery-org/jquery.orgchart.css">
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
            <table class="table table-bordered table-hover" id="ranks">
                <thead>
                @foreach($officerRanks as $rank)
                    <th ><img style="max-width: 100px; max-height: 100px;" class="center-block" src="/images/{{$rank->public_image}}/small"></th>
                @endforeach
                </thead>
                <tbody>
                <tr>
                    @foreach($officerRanks as $rank)
                        <td><strong>{{$rank->name}}</strong><br>{{$rank->abbreviation}}/small</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

        <h3>Warrant Ranks</h3>
        <div class="text-center">
            <table class="table table-bordered table-hover" id="ranks">
                <thead>
                @foreach($warrantRanks as $rank)
                    <th><img style="max-width: 100px; max-height: 100px;" class="center-block" src="/images/{{$rank->public_image}}/small"></th>
                @endforeach
                </thead>
                <tbody>
                <tr>
                    @foreach($warrantRanks as $rank)
                        <td><strong>{{$rank->name}}</strong><br>{{$rank->abbreviation}}/small</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

        <h3>Enlistment Ranks</h3>
        <div class="text-center">
            <table class="table table-bordered table-hover" id="ranks">
                <thead>
                @foreach($enlistedRanks as $rank)
                    <th><img style="max-width: 100px; max-height: 100px;" class="center-block" src="/images/{{$rank->public_image}}/small"></th>
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
                <li role="presentation" class="active"><a href="#structure" aria-controls="structure" role="tab" data-toggle="tab">Structure</a></li>
                <li role="presentation"><a href="#assignments" aria-controls="assignments" role="tab" data-toggle="tab">Assignments</a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="structure">
                    <div id="structureHolder" style="height:300px;">
                        <br>
                        <img width="100%" src="/frontend/images/structure.png">
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="assignments">
                    <h2>Assignments</h2>
                    <p>The NATO RRF is designed to scale to a maximum personnel allocation of 150 troops. Every member of the unit will at all times hold a single assignment. Assignments are mutually exclusive positions which have required playtime, training and commitment attributes attached to them. On</p>
                    <h3>1st Rapid Response Force</h3>
                    <div class="row">
                        <div class="col-lg-4">
                            @foreach($group1 as $group)
                                @if(!($group->assignments->count() == 0))
                                    <h5><strong>{{$group->name}}</strong></h5>
                                    @foreach($group->assignments as $assignment)
                                        <ul>
                                            <li>{{$assignment->name}}</li>
                                        </ul>
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
                                        <ul>
                                            <li>{{$assignment->name}}</li>
                                        </ul>
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
                                        <ul>
                                            <li>{{$assignment->name}}</li>
                                        </ul>
                                    @endforeach
                                @else
                                    <h4><strong>{{$group->name}}</strong></h4>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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
