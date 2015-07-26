@extends('layout.main_layout')

@section('title','Award')

@section('sub-title','Manager')

@section('scripts-css-header')
        <!-- jQuery 2.1.4 -->
<script src="/js/rails.js" type="text/javascript"></script>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('awards_edit') !!}
@endsection


@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Award Editor - {{$award->name}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ route('admin.awards.update',array($award->id)) }}" method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Award Name: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{$award->name}}" placeholder="Name of Award">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description of Award: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" value="{{$award->description}}" placeholder="Brief Description">
                    </div>
                </div>
                @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" value="{{$award->promotionPoints}}" placeholder="Promotion Points Awarded for Award">
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Upload new Image: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Current Image: &nbsp</label>
                    <div class="col-sm-10">
                        <img src="{{$award->public_image}}">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>
                <div class="pull-right">
                    <a class="btn btn-danger" href="{{ route('admin.awards.index') }}">Cancel</a>
                    <input class="btn btn-primary" type="submit">
                </div>

            </form>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection

@section('modal')
@endsection

