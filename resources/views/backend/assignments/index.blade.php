@extends('backend.layout.main_layout')
@section('title','Assignments')

@section('sub-title','Manager')

@section('scripts-css-header')
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-list"></i> Assignments Manager</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Assignments Manager</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>This shows all assignments that are currently available in the unit.</p>
        <table class="table table-striped table-bordered table-hover" id="user">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Group</th>
                <th>Assigned to</th>
                <th>Entry Level</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($assignments as $assignment)
                <tr>
                    <td>{!! $assignment->id !!}</td>
                    <td>{!! $assignment->name !!}</td>
                    <td>{!! $assignment->group->name !!}</td>
                    <td><a href="{{route('admin.vpf.show',$assignment->id)}}">{{$assignment->member}}</a></td>
                    <td>{!!($assignment->entry_level == 1) ? 'True' : 'False' !!}</td>
                    <td><a href="{{route('admin.assignments.edit', $assignment->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        <a href="{{ route('admin.assignments.destroy',array($assignment->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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


