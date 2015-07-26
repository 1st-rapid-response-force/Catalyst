@extends('layout.main_layout')

@section('title','Schools/Training Manager')

@section('sub-title','View School')

@section('scripts-css-header')

@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('training_view') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View School/Training</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <h1>{{$school->name}}</h1>
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#description-tab" aria-controls="description-tab" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#doc-tab" aria-controls="doc-tab" role="tab" data-toggle="tab">Documentation</a></li>
                    <li role="presentation"><a href="#videos-tab" aria-controls="videos-tab" role="tab" data-toggle="tab">Videos</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="description-tab">
                        <br>
                        {!! $school->description !!}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="doc-tab">
                        <br>
                        {!! $school->docs !!}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="videos-tab">
                        <br>
                        {!! $school->videos !!}
                    </div>
                </div>
            </div>
            @if (!($school->storage_image == 'false'))
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
@endsection

@section('page-script-include')

@endsection

@section('modal')
@endsection


