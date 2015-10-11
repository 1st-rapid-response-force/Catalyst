@extends('backend.layout.main_layout')
@section('title','On Call')

@section('sub-title','Manager')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-phone-square"></i> On Call Manager</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">On Call Manager</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>This shows all on call requests that have been submitted.</p>
        <div class="pull-left" style="margin-bottom:10px">
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    On Call <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('admin.oncall.index')}}">View On Call Requests</a></li>
                </ul>
            </div>
        </div>

        <div class="clearfix"></div>
        <table class="table table-striped table-bordered table-hover" id="user">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>On Call Type</th>
                <th>Phone Enabled</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($oncalls as $call)
                <tr>
                    <td>{!! $call->id !!}</td>
                    <td>{!! $call !!}</td>
                    <td>{!! $call->oncall_type !!}</td>
                    <td>{!!($call->onCallPhoneEnabled()) ? '<span class="label label-success">True</span>' : '<span class="label label-danger">False</span>' !!}</td>
                    <td>NA</td>
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
                "iDisplayLength" : 50,
                "order": [[7, "desc"]]
            });
        });
    </script>

@endsection


