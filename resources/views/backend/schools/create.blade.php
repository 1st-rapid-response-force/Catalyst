@extends('backend.layout.main_layout')

@section('title','Schools Manager')

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
    <li class="active">Create School</li>
@endsection

@section('content')
    <p>Add a new schools</p>
    <form class="form-horizontal" method="POST" action="{{ route('admin.schools.store')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name of School/Training">
            </div>
        </div>
        <div class="form-group">
            <label for="promotion_points" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" placeholder="Promotion Points Awarded for School/Training">
            </div>
        </div>
        <div class="form-group">
            <label for="prerequisites" class="col-sm-2 control-label">Prerequisite Courses: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" id="autocomplete" name="prerequisites" />
            </div>
        </div>
        <div class="form-group">
            <label for="prerequisites" class="col-sm-2 control-label">One of Courses: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" id="autocomplete2" name="oneofcourses" />
            </div>
        </div>
        <div class="form-group">
            <label for="minimumRankRequired" class="col-sm-2 control-label">Minimum Rank Required: &nbsp</label>
            <div class="col-sm-10">
                <select class="form-control" name="minimumRankRequired">
                    <option value="1">No Rank Requirement</option>
                    @foreach($ranks as $rank)
                        <option value="{{$rank->id}}">{{$rank->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Image: &nbsp</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </div>
        <div class="form-group">
            <label for="shortDescription" class="col-sm-2 control-label">Short Description: &nbsp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="shortDescription" name="short_description" placeholder="Short Description for the course.">
            </div>
        </div>
        <div class="form-group">
            <label for="shortDescription" class="col-sm-2 control-label">Description: &nbsp</label>
            <div class="col-sm-10">
                <label for="description" class="control-label">Description: &nbsp</label>
                <textarea id="description" name="description" placeholder="Description goes here" rows="20" cols="80"></textarea>
            </div>
        </div>

        <p>Before you can add content, you will first create the course. Then you can add sections with content.</p>
        <br>
        <div class="pull-right">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a class="btn btn-danger" href="/admin/schools">Cancel</a>
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
            $("#autocomplete").tokenInput("/admin/autocomplete/courses", {
                theme: "facebook",
                preventDuplicates: true,
                searchDelay: 300,
                hintText: 'Search by Course Name'

            });
            $("#autocomplete2").tokenInput("/admin/autocomplete/courses", {
                theme: "facebook",
                preventDuplicates: true,
                searchDelay: 300,
                hintText: 'Search by Course Name'

            });
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/ckeditor-admin/ckeditor.js" type="text/javascript"></script>
@endsection


