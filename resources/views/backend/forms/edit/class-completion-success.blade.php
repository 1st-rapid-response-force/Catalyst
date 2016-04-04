@extends('backend.layout.main_layout')

@section('title','Class Completion Form')

@section('sub-title','Forms')

@section('scripts-css-header')
<meta name="csrf-param" content="_token">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
<li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="{{route('admin.vpf.index')}}">Virtual Personnel File</a></li>
<li><a href="{{route('admin.forms.index')}}"> Form Manager</a></li>
<li class="active">Class Completion Form - {{$form->id}}</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>This form is intended to simplify the process of crediting users with classes. Instead of doing it one by one, you can simply add the users name and select the class and all the users VPF files will be updated accordingly.</p>
                    <p>Forms have been simplified for admin purposes.</p>
                    <form action="{{route('admin.forms.school-completion.complete.post',[$form->VPF->id,$form->form_type,$form->id])}}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="comments">School</label>
                            <input type="text" class="form-control" readonly value="{{$form->date->school->name}}">
                            <input type="hidden" name="school_id" value="{{$form->date->school->id}}">
                        </div>
                        <div class="form-group">
                            <strong>Graduates: </strong>
                            <input type="text" id="autocomplete" name="graduates" /><br>
                        </div>
                        <div class="form-group">
                            <strong>Enrolled Students: </strong>
                            @if($enrolled->count() > 0)
                                @foreach($enrolled as $enroll)
                                    <li>{{$enroll}}</li>
                                @endforeach
                            @else
                                <li>No Students are enrolled in this class</li>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
@endsection

@section('page-script')
    <script type="text/javascript" src="/plugins/tokeninput/src/jquery.tokeninput.js"></script>
    <script type="text/javascript" src="/plugins/jQueryUI/jquery-ui.min.js"></script>
    <link href="/plugins/tokeninput/styles/token-input-facebook.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function () {
            $("#autocomplete").tokenInput("/autocomplete/users", {
                theme: "facebook",
                preventDuplicates: true,
                searchDelay: 300,
                hintText: 'Search by First or Last Name'

            });

        });
    </script>
@endsection

@section('page-script-include')
@endsection


