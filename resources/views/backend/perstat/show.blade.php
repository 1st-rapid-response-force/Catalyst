@extends('backend.layout.main_layout')
@section('title','PERSTAT')

@section('sub-title','Manager')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/"><i class="fa fa-line-chart"></i> PERSTAT Manager</a></li>
    <li class="active"> View PERSTAT</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">PERSTAT Manager - View Perstat</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>This allows you to view the PERSTAT Information.</p>
        <p><strong>{{$perstat->from}} to {{$perstat->to}}</strong></p>
        <h3>Current Report in Status:</h3>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$perstat->report_percentage()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perstat->report_percentage()}}%;">
                    {{$perstat->report_percentage()}}%
                </div>
            </div>
        <div class="row">
            <div class="col-lg-6">
                <h4>Reported In</h4>
                <ol>
                    @foreach($perstat->VPF as $vpf)
                        <li><a href="{{route('admin.vpf.show',$vpf->id)}}">{{$vpf}}</a></li>
                    @endforeach
                </ol>
            </div>
            <div class="col-lg-6">
                <h4>Pending Reported In</h4>
                @foreach($perstat->pendingReportIn() as $vpf)
                    <li><a href="{{route('admin.vpf.show',$vpf->id)}}">{{$vpf}}</a></li>
                @endforeach
            </div>
        </div>
        <hr>
        <a href="{{ route('admin.perstat.email',array($perstat->id)) }}" data-method="post" rel="nofollow" data-confirm="This will email all users who have not reported in are you sure?" class="btn btn-primary">Email Members who have not reported in</a>



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


