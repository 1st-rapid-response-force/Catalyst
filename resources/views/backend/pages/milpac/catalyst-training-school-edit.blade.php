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
            <p>Edit a school/training</p>
            <form class="form-horizontal" method="POST" action="{{ route('admin.training-school.update',array($school->id)) }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of School/Training" value="{{$school->name}}">
                    </div>
                </div>
                @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" placeholder="Promotion Points Awarded for School/Training" value="{{$school->promotionPoints}}">
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="col-sm-2 control-label">Publish Course: &nbsp</label>
                    <label class="radio-inline">
                        <input type="hidden" name="published" value="0">
                        <input type="checkbox" name="published" id="published" value="1" {{($school->published == 1) ? 'checked' : ''}}> Yes
                    </label>
                </div>
                @if (!($school->storage_image == 'false'))
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Remove Image: &nbsp</label>
                        <label class="radio-inline">
                            <input type="checkbox" name="removeImage" id="removeImage" value="true"> Yes
                        </label>
                    </div>
                @endif
                <div class="form-group">
                    <label for="img" class="col-sm-2 control-label">School Image: &nbsp</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="img" name="img">
                        @if (!($school->storage_image == 'false'))
                            <span id="helpBlock" class="help-block"><a href="{{$school->public_image}}" target="_blank">View current School image</a></span>
                        @else
                            <span id="helpBlock" class="help-block">There is no School Image uploaded.</span>
                        @endif
                    </div>
                </div>
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
                            <label for="description" class="control-label">Description: &nbsp</label>
                            <textarea id="description" name="description" placeholder="Description goes here" rows="20" cols="80">{!! $school->description !!}</textarea>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="doc-tab">
                            <label for="docs" class="control-label">Documentation: &nbsp</label>
                            <textarea id="docs" name="docs" placeholder="Docs" rows="20" cols="80">{!! $school->docs !!}</textarea>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="videos-tab">
                            <label for="video" class="control-label">Videos: &nbsp</label>
                            <textarea id="video" name="video" placeholder="You can use Youtube videos to teach a concept or method." rows="20" cols="80">{!! $school->videos !!}</textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="pull-right">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-danger" href="/admin/training-school/">Cancel</a>
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


