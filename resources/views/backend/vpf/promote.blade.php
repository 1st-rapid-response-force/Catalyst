@extends('backend.layout.main_layout')


@section('title','Promote User')

@section('sub-title','')

@section('scripts-css-header')
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Promote {{$vpf}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Using this interface you can promote members in the unit.</p>
            <p>The following actions will occur</p>
            <ul>
                <li>A service history entry will be added</li>
                <li>A promotion entry will be added</li>
                <li>User will be notified</li>
                <li>Teamspeak will be updated</li>
                <li>Incase you simply need to modify the rank can bypass the promotion interface by simply modifying rank in the profile editor</li>
            </ul>
            <form method="post">
                {{csrf_field()}}
                <label>Current Rank</label><br>
                <input type="text" readonly value="{{$vpf->rank->name}}" name="oldRank" class="form-control">
                <label>New Rank</label>
                <select name="newRank" class="form-control">
                    @foreach($ranks as $rank)
                        <option value="{{$rank->id}}">{{$rank->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Promote User</button>
            </form>


        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


