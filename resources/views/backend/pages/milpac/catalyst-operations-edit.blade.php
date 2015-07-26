@extends('layout.main_layout')

@section('title','Operations')

@section('sub-title','Edit Operation')

@section('scripts-css-header')
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('operations_edit') !!}
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
            <p>Edit an operation</p>
            <form class="form-horizontal" method="POST" action="{{ route('admin.operations.update',array($operation->id)) }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Operation Name: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of Operation" value="{{$operation->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Operation Date: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date" name="date" placeholder="01/01/2000" value="{{ date('m/d/Y', strtotime($operation->date)) }}">
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
                            <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" placeholder="Promotion Points Awarded for Operation" value="{{$operation->promotionPoints}}">
                        </div>
                    </div>
                @endif
                @if (!($operation->storage_image == 'false'))
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Remove Image: &nbsp</label>
                        <label class="radio-inline">
                            <input type="checkbox" name="removeImage" id="removeImage" value="true"> Yes
                        </label>
                    </div>
                @endif
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Operation Image: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="img" name="img">
                        @if (!($operation->storage_image == 'false'))
                        <span id="helpBlock" class="help-block"><a href="{{$operation->public_image}}" target="_blank">View current operation image</a></span>
                        @else
                        <span id="helpBlock" class="help-block">There is no Operation Image uploaded.</span>
                        @endif
                    </div>
                </div>
                <label for="description" class="control-label">Operation Description: &nbsp</label>
                <textarea id="description" name="description" placeholder="Operation Description goes here" rows="20" cols="80">{!! $operation->description !!}</textarea>
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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('description');
        $('#date').datepicker({});
        $('#timepicker').timepicker({
            template: 'dropdown',
            showInputs: false,
            defaultTime: '{{ date('h:i A', strtotime($operation->date)) }}',
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


