@extends('backend.layout.main_layout')
@section('title','Assignments')

@section('sub-title','Manager')

@section('scripts-css-header')
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.assignments.index')}}"><i class="fa fa-list"></i>Assignments Manager</a></li>
    <li class="active"><i class="fa fa-list"></i> Edit Assignment</li>
    @endsection

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Assignments Manager - Edit Assignment</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>This shows all assignments that are currently available in the unit.</p>
        <form action="{{route('admin.assignments.update',$assignment->id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$assignment->name}}">
            </div>
            <div class="form-group">
                <label>Group</label>
                <select name="group_id" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{$group->id}}" {{($assignment->group_id == $group->id) ? 'selected' : ''}}>{{$group->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>MOS</label>
                <select name="mos_id" class="form-control">
                    @foreach($mos as $mos)
                        <option value="{{$mos->id}}" {{($assignment->mos_id == $mos->id) ? 'selected' : ''}}>{{$mos->name}} - {{$mos->mos}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Is this an entry level position:</label>
                <label><input type="radio" name="entry_level" value="1" {{($assignment->entry_level == 1) ? 'checked' : ''}}> YES</label> &nbsp;
                <label><input type="radio" name="entry_level" value="0" {{($assignment->entry_level == 0) ? 'checked' : ''}}> NO</label> &nbsp;
            </div>
            <div class="form-group">
                <label>Is this an position open for transfers (Assignment Change Requests):</label>
                <label><input type="radio" name="transfer_open" value="1" {{($assignment->transfer_open == 1) ? 'checked' : ''}}> YES</label> &nbsp;
                <label><input type="radio" name="transfer_open" value="0" {{($assignment->transfer_open == 0) ? 'checked' : ''}}> NO</label> &nbsp;
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button> <a href="{{route('admin.assignments.index')}}" class="btn btn-danger">Cancel</a>
        </form>

    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable({
                "iDisplayLength" : 50
            });
        });
    </script>
@endsection


