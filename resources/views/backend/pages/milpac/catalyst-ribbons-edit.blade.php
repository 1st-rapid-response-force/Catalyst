@extends('layout.main_layout')

@section('title','Ribbons')

@section('sub-title','Manager')

@section('scripts-css-header')
        <!-- jQuery 2.1.4 -->
<script src="/js/rails.js" type="text/javascript"></script>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('ribbons_edit') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Ribbons Editor - {{$ribbon->name}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">


        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection

@section('modal')
@endsection

