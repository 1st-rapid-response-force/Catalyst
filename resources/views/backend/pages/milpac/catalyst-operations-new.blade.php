@extends('layout.main_layout')

@section('title','Operations')

@section('sub-title','New Operation')

@section('scripts-css-header')
    <link href="/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('operations_new') !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Operations</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Add a new operation</p>
            <form class="form-horizontal" method="POST" action="{{ route('admin.operations.store')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Operation Name: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of Operation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Operation Date: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date" name="date" placeholder="01/01/2000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Operation Time: &nbsp</label>
                    <div class="col-sm-10">
                        <div class="bootstrap-timepicker">
                            <input id="timepicker" class="form-control" name="time" type="text" class="input-small">
                        </div>
                    </div>
                </div>
                @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" placeholder="Promotion Points Awarded for Operation">
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Operation Image: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
                <label for="description" class="control-label">Description Operation: &nbsp</label>
                <textarea id="description" name="description" placeholder="Operation Description goes here" rows="20" cols="80"></textarea>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>
                <div class="pull-right">
                    <a class="btn btn-danger" href="/admin/operations/">Cancel</a>
                    <input class="btn btn-primary" type="submit">
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')

<script type="text/javascript">
    $(function () {
        CKEDITOR.replace( 'description');
        $('#date').datepicker({});
        $('#timepicker').timepicker({
            template: 'dropdown',
            showInputs: false,
            minuteStep: 15
        });
    });

</script>
@endsection

@section('page-script-include')
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

@endsection

@section('modal')
@endsection


