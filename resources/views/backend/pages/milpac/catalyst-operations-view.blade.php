@extends('layout.main_layout')

@section('title','Operations')

@section('sub-title','View Operation')

@section('scripts-css-header')
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('operations_view') !!}
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Operation</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <h1>{{$operation->name}} <small>- {{ date('F j, Y, g:i a', strtotime($operation->date)) }}</small></h1>
            <p><strong></strong></p>
            <p>{!! $operation->description !!}</p>
            @if (!($operation->storage_image == 'false'))
                <div class="text-center">
                    <p>
                        <img class="img-responsive" src="{{$operation->public_image}}">
                    </p>
                </div>
            @endif
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')

<script type="text/javascript">
    $(function () {});

</script>
@endsection

@section('page-script-include')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.js" type="text/javascript"></script>
    <script src="/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

@endsection

@section('modal')
@endsection


