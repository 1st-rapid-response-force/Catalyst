@extends('layout.main_layout')

@section('title','Training & Schools')

@section('sub-title','Manager')

@section('scripts-css-header')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="/js/rails.js" type="text/javascript"></script>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('training') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training & Schools</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
    <script type="text/javascript">
        $(function () {
            $("#training").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection


