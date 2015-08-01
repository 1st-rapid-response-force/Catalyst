@extends('backend.layout.main_layout')

@section('title','Schools Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li><a href="{{route('admin.schools.index')}}">Schools Manager</a></li>
    <li class="active">View School</li>
@endsection

@section('content')
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
                <p>Short Description</p>
                {{$school->short_description}}
                <hr>
                {!! $school->description !!}
                @if (!($school->storage_image == 'false'))
                    <div class="text-center">
                            <img class="img-responsive center-block" src="/images/{{$school->public_image}}/">
                    </div>
                @endif
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

@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection

@section('page-script-include')

@endsection


