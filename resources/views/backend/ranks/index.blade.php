@extends('backend.layout.main_layout')

@section('title','Ranks Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Unit Structure</li>
    <li class="active">Ranks Manager</li>
@endsection

@section('content')
    <p>The following are the ranks that have been set up in the unit.</p>
    <h4>Administrative Options</h4>
    <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#newRank">New Rank</button>
    </p>
    <hr>
    @if (count($ranks) != 0)
        @if (count($ranks) != 0)
            <table id="ribbons" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Abbreviation</th>
                    <th>Name - Paygrade</th>
                    <th>Requirements</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ranks as $rank)
                    <tr>
                        <td><img style="max-width: 150px; max-height: 150px;" src="/images/{{$rank->public_image}}/small" class="center-block"></td>
                        <td>{{$rank->abbreviation}}</td>
                        <td>{{$rank->name}} | {{$rank->pay_grade}}</td>
                        <td>PP: {{$rank->promotionPointsRequired}} | TIG: {{$rank->tigRequired}}</td>
                        <td>Weight: {{$rank->weight}}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.ranks.edit',array($rank->id)) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('admin.ranks.destroy',array($rank->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>There is no Ranks in the database, add one by using the Administrator tools.</p>
        @endif
    @endif
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    @endsection

    @section('page-script-include')
            <!-- Modal -->
    <div class="modal fade" id="newRank" tabindex="-1" role="dialog" aria-labelledby="newRankModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="newRibbonModal">New Ribbon</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="abbreviation" class="col-sm-2 control-label">Abbreviation: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="abbreviation" name="abbreviation" placeholder="Abbreviation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name of Rank">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Paygrade: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pay_grade" name="pay_grade" placeholder="Paygrade">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="promotionPointsRequired" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="promotionPointsRequired" name="promotionPointsRequired" placeholder="Promotion Points Required for Rank">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="col-sm-2 control-label">Weight: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="weight" name="weight" placeholder="The more weight means higher ranking">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="col-sm-2 control-label">Next Rank: &nbsp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="next_rank">
                                    @foreach($ranks as $rank)
                                    <option value="{{$rank->id}}">{{$rank->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tigRequired" class="col-sm-2 control-label">Time in Grade Days: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="tigRequired" name="tigRequired" placeholder="Time in Grade days required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="teamspeakGroup" class="col-sm-2 control-label">Teamspeak Group: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="teamspeakGroup" name="teamspeakGroup" placeholder="Teamspeak Group ID">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img" class="col-sm-2 control-label">Image: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="img" name="img">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


