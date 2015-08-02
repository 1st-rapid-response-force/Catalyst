@extends('backend.layout.main_layout')

@section('title','School Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/tokeninput/styles/token-input-facebook.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li><a href="{{route('admin.schools.index')}}">Schools Manager</a></li>
    <li class="active">Edit School</li>
@endsection

@section('content')
    <p>Edit a school/training</p>
    <form class="form-horizontal" method="POST" action="{{ route('admin.schools.update',array($school->id)) }}" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name of School/Training" value="{{$school->name}}">
            </div>
        </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" placeholder="Promotion Points Awarded for School/Training" value="{{$school->promotionPoints}}">
                </div>
            </div>
        <div class="form-group">
            <label for="prerequisites" class="col-sm-2 control-label">Prerequisite Courses: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" id="autocomplete" name="prerequisites" />
            </div>
        </div>
        <div class="form-group">
            <label for="minimumRankRequired" class="col-sm-2 control-label">Minimum Rank Required: &nbsp</label>
            <div class="col-sm-10">
                <select class="form-control" name="minimumRankRequired">
                    <option value="1">No Rank Requirement</option>
                    @foreach($ranks as $rank)
                        <option value="{{$rank->id}}" {{($school->minimumRankRequired == $rank->id) ? 'selected' : ''}}>{{$rank->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
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
                    <span id="helpBlock" class="help-block"><a href="/images/{{$school->public_image}}" target="_blank">View current School image</a></span>
                @else
                    <span id="helpBlock" class="help-block">There is no School Image uploaded.</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="shortDescription" class="col-sm-2 control-label">Short Description: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="shortDescription" name="short_description" value="{{$school->short_description}}" placeholder="Short Description for the course.">
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
    <br><br><br>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script type="text/javascript" src="/plugins/tokeninput/src/jquery.tokeninput.js"></script>
    <script type="text/javascript" src="/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace( 'description');
            CKEDITOR.replace( 'docs');
            CKEDITOR.replace( 'video');
            $("#autocomplete").tokenInput("/admin/autocomplete/courses", {
                theme: "facebook",
                preventDuplicates: true,
                searchDelay: 300,
                hintText: 'Search by Course Name',
                @if($json)
                prePopulate:
                    {!! $json !!}
                @endif
            });
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/ckeditor-admin/ckeditor.js" type="text/javascript"></script>
@endsection


