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
                    <p>Forms have been simplified for admin purposes.</p>
                    <form method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <strong>Attendees: </strong>
                                @if($attendees->count() > 0)
                                    @foreach($attendees as $att)
                                        <li>{{$att->vpf}}</li>
                                    @endforeach
                                @else
                                    <li>No Attendees</li>
                                @endif
                            <strong>Observers: </strong>
                                @if($observers->count() > 0)
                                    @foreach($observers as $obs)
                                    <li>{{$obs->vpf}}</li>
                                    @endforeach
                                @else
                                    <li>No Observers</li>
                                @endif
                            <strong>Class Co-Instructors or Helpers: </strong>
                                @if($helpers->count() > 0)
                                @foreach($helpers as $help)
                                        <li>{{$help->vpf}}</li>
                                @endforeach
                                @else
                                <li>No Co-Instructors or Helpers</li>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="comments">Comments/Concerns</label>
                            <textarea class="form-control" name="comments" rows="15" readonly placeholder="Do you have any general comments about this class session, or general concerns about this class in general">{{$form->comments}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="rewards">Rewards/Recogniztion</label>
                            <textarea class="form-control" name="rewards" rows="15" readonly placeholder="Do you wish to recognize a class participants?">{{$form->rewards}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="comments">Issues/Negative Conduct</label>
                            <textarea class="form-control" name="issues" rows="15" readonly placeholder="Where there any issues with the class, or issues with a class participant (note it here)">{{$form->issues}}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info">Mark as Reviewed (No Credit)</button>
                        <a href="{{route('admin.forms.school-completion.complete',[$form->VPF->id,$form->form_type,$form->id])}}" class="btn btn-success">Mark School as Complete</a>
                        <a href="#" class="btn btn-danger" disabled="disabled">Drop Students</a>
                        <p>Marking a school as reviewed is intended to be used for multi-series courses, the only time a School should be marked as complete is when the final class session has been completed.</p>
                    </form>
                </div>
            </div>
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


