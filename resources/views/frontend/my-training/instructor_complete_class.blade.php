@extends('frontend.layouts.master')

@section('title', 'Complete Class')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('training')}}">My Training</a> </li>
        <li><a href="{{route('training.instructor')}}">Instructor Panel</a> </li>
        <li class="active">Complete Class</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Training - Instructor Panel - <small>Class Completed</small></h1>
        <p>You are marking a class as completed sucessfully, this means you attended the course, taught it, and completed the course</p>
        <p>For reference the current UTC time is {{\Carbon\Carbon::now()->toDateTimeString()}}</p>
        <h2>Training Completion Form</h2>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <form method="post" action="{{route('training.instructor.class.complete.post', $date->id)}}">
                    {!! csrf_field() !!}
                    <div class="text-center"><legend><strong>TRAINING COMPLETION FORM</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                    <div class="text-center"><h5>PRIVACY ACT STATEMENT</h5></div>
                    <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                    <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to record the completion of a class within the 1st Rapid Response Force.</p>
                    <p><strong>ROUTINE USE(S): </strong> This form is used by Catalyst to credit users who attend a class.</p>
                    <p><strong>DISCLOSURE: </strong> Mandatory; All classes that are created must be completed or a cancellation form must be filed for investigation.</p>
                    <hr>
                    <div class="form-group">
                        <strong>Attendees: </strong>
                        <input type="text" id="autocomplete" name="attendees" /><br>
                        <strong>Observers: </strong> <small>This can be left blank</small>
                        <input type="text" id="autocomplete_observers" name="observers" /><br>
                        <strong>Class Co-Instructors or Helpers: </strong> <small>This can be left blank</small>
                        <input type="text" id="autocomplete_helpers" name="helpers" /><br>
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments/Concerns</label>
                        <textarea class="form-control" name="comments" rows="15" placeholder="Do you have any general comments about this class session, or general concerns about this class in general"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rewards">Rewards/Recogniztion</label>
                        <textarea class="form-control" name="rewards" rows="15" placeholder="Do you wish to recognize a class participants?"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comments">Issues/Negative Conduct</label>
                        <textarea class="form-control" name="issues" rows="15" placeholder="Where there any issues with the class, or issues with a class participant (note it here)"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success"> <a href="{{route('training.instructor')}}" class="btn btn-danger">Cancel</a>
                    <p><small>It is important to note that participants will not be credited with completing the school, they are being credited for attending the class session. This form is being sent to Command for review and admin will mark the school as complete once all courses, and sessions have been attended.</small> </p>

                </form>
            </div>
            <div class="col-lg-4">
                <div class="well well-sm">
                    <p>According to Catalyst Records the following individuals signed up for this course:</p>
                    @foreach($date->VPF as $student)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object img-circle" style="max-height: 100px; max-width: 100px;" src="/avatar/{{$student->user->steam_id}}" alt="School">
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">{{$student}}</h5>
                                <ul>
                                    <li>{{$student->assignment->name}}</li>
                                    <li>{{$student->assignment->group->name}}</li>
                                    <li>
                                        @if($student->hasReportedIn())
                                            <span class="label label-success">Reported in</span>
                                        @else
                                            <span class="label label-danger">Pending Report in</span>
                                        @endif
                                    </li>
                                    @if($student->onCall())
                                        <li>
                                            <span class="label label-primary">On-Call - {{$student->oncall_type}}</span>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>



    </div>
@endsection

@section('js-bottom')
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
            $("#autocomplete_observers").tokenInput("/autocomplete/users", {
                theme: "facebook",
                preventDuplicates: true,
                searchDelay: 300,
                hintText: 'Search by First or Last Name'

            });
            $("#autocomplete_helpers").tokenInput("/autocomplete/users", {
                theme: "facebook",
                preventDuplicates: true,
                searchDelay: 300,
                hintText: 'Search by First or Last Name'

            });

        });
    </script>

@endsection