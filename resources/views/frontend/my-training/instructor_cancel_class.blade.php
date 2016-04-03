@extends('frontend.layouts.master')

@section('title', 'Cancel Class')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('training')}}">My Training</a> </li>
        <li><a href="{{route('training.instructor')}}">Instructor Panel</a> </li>
        <li class="active">Cancel Class</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Training - Instructor Panel - <small>Class Canceled</small></h1>
        <p>You are marking a class as cancelled.</p>
        <p>For reference the current UTC time is {{\Carbon\Carbon::now()->toDateTimeString()}}</p>
        <h2>Training Cancellation Form</h2>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <form method="post" action="{{route('training.instructor.class.cancel.post', $date->id)}}">
                    {!! csrf_field() !!}
                    <div class="text-center"><legend><strong>TRAINING CANCELLATION FORM</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                    <div class="text-center"><h5>PRIVACY ACT STATEMENT</h5></div>
                    <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                    <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to record formally the cancellation of a class that was scheduled.</p>
                    <p><strong>ROUTINE USE(S): </strong> This form is used by Catalyst to formally record the cancellation and investigate the reasons for the cancellation.</p>
                    <p><strong>DISCLOSURE: </strong> Mandatory; All classes that are created must be completed or a cancellation form must be filed for investigation.</p>
                    <hr>
                    <p></p>
                    <div class="form-group">
                        <label for="comments">Reason for Cancellation:</label>
                        <textarea class="form-control" name="violation_summary" rows="15" placeholder="Why did you cancel this class session?"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success"> <a href="{{route('training.instructor')}}" class="btn btn-danger">Cancel</a>
                    <p><small>Cancellation should not happen unless Command has authorized them directly. Unit Policy demands that all cancellations be investigated.</small> </p>

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