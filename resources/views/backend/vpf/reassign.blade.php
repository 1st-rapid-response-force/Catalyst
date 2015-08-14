@extends('backend.layout.main_layout')


@section('title','Reassign Member')

@section('sub-title','')

@section('scripts-css-header')
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Reassign {{$vpf}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Using this interface you can reassign members in the unit.</p>
            <p>The following actions will occur</p>
            <ul>
                <li>A service history entry will be added</li>
                <li>Member will be reassigned to new assignment and correct permissions will be updated based on MOS</li>
                <li>User will be notified</li>
                <li>Incase you simply need to modify the assignment can bypass the reassignment interface by simply modifying assignment in the profile editor</li>
            </ul>
            <form method="post">
                {{csrf_field()}}
                <label>Current Assignment</label><br>
                <input type="text" readonly value="{{$vpf->assignment->id.' - '.$vpf->assignment->name.' - '.$vpf->assignment->group->name}}" name="oldAssignment" class="form-control">
                <label>New Assignment <small>shows only available slots</small></label>
                <select name="newAssignment" class="form-control">
                    @foreach($assignments as $assignment)
                        <option value="{{$assignment->id}}" {{($assignment->id == $vpf->assignment->id) ? 'selected' : ''}}>{{$assignment->id.' - '.$assignment->name.' - '.$assignment->group->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Reassign User</button>
            </form>


        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


