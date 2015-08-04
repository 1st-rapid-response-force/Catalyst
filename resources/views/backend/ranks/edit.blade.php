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
    <form class="form-horizontal" action="{{ route('admin.ranks.update',array($rank->id)) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="abbreviation" class="col-sm-2 control-label">Abbreviation: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="abbreviation" name="abbreviation" placeholder="Abbreviation" value="{{$rank->abbreviation}}">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name of Rank" value="{{$rank->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Paygrade: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pay_grade" name="pay_grade" placeholder="Paygrade" value="{{$rank->pay_grade}}">
            </div>
        </div>
        <div class="form-group">
            <label for="promotionPointsRequired" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="promotionPointsRequired" name="promotionPointsRequired" placeholder="Promotion Points Required for Rank" value="{{$rank->promotionPointsRequired}}">
            </div>
        </div>
        <div class="form-group">
            <label for="weight" class="col-sm-2 control-label">Weight: &nbsp</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="weight" name="weight" placeholder="The more weight means higher ranking" value="{{$rank->weight}}">
            </div>
        </div>
        <div class="form-group">
            <label for="weight" class="col-sm-2 control-label">Next Rank: &nbsp</label>
            <div class="col-sm-10">
                <select class="form-control" name="next_rank">
                    @foreach($ranks as $rk)
                        <option value="{{$rk->id}}" {{($rk->id == $rank->next_rank) ? 'selected' : ''}}> {{$rk->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="tigRequired" class="col-sm-2 control-label">Time in Grade Days: &nbsp</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="tigRequired" name="tigRequired" placeholder="Time in Grade days required" value="{{$rank->tigRequired}}">
            </div>
        </div>
        <div class="form-group">
            <label for="teamspeakGroup" class="col-sm-2 control-label">Teamspeak Group: &nbsp</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="teamspeakGroup" name="teamspeakGroup" placeholder="Teamspeak Group ID" value="{{$rank->teamspeakGroup}}">
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Image: &nbsp</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Current Image: &nbsp</label>
            <div class="col-sm-10">
                <img src="/images/{{$rank->public_image}}">
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('admin.ribbons.index') }}">Cancel</a>
            <input class="btn btn-primary" type="submit">
        </div>

    </form>
@endsection

@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('page-script-include')

@endsection


