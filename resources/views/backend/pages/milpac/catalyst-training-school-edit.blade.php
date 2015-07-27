@extends('layout.main_layout')

@section('title','Schools/Training Manager')

@section('sub-title','Edit School')

@section('scripts-css-header')

@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('training_edit') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Schools/Training Manager</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')

<script type="text/javascript">
    $(function () {
        CKEDITOR.replace( 'description');
        CKEDITOR.replace( 'docs');
        CKEDITOR.replace( 'video');
    });

</script>
@endsection

@section('page-script-include')
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
@endsection

@section('modal')
@endsection


