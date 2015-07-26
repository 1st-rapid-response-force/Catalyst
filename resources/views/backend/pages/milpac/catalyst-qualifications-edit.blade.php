@extends('layout.main_layout')

@section('title','Qualifications')

@section('sub-title','Manager')

@section('scripts-css-header')
        <!-- jQuery 2.1.4 -->
<script src="/js/rails.js" type="text/javascript"></script>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('qualifications') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Qualifications Editor - {{$qualification->name}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ route('admin.qualifications.update',array($qualification->id)) }}" method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Qualification Name: &nbsp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value="{{$qualification->name}}" placeholder="Name of Qualification">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description of Qualification: &nbsp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" value="{{$qualification->description}}" placeholder="Brief Description">
                    </div>
                </div>
                @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" value="{{$qualification->promotionPoints}}" placeholder="Promotion Points Awarded for Qualification">
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Current Image: &nbsp</label>
                    <div class="col-sm-10">
                        <img src="{{$qualification->public_image}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Upload new Image: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>
                <div class="pull-right">
                    <a class="btn btn-danger" href="{{ route('admin.qualifications.index') }}">Cancel</a>
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

