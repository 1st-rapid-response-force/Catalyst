@extends('frontend.layouts.master')

@section('title', 'Infraction Report Form')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">IR - {{$ir->created_at->toFormattedDateString()}}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="grid-form" method="post" action="{{route('vpf.forms.store', 'ir')}}">
                    {!! csrf_field() !!}
                    <div class="text-center"><legend><strong>INFRACTION REPORT FORM</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                    <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                    <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                    <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to report conduct infractions within the unit.</p>
                    <p><strong>ROUTINE USE(S): </strong> This form is used to report conduct which will be reviewed by the Commanding Officer.</p>
                    <p><strong>DISCLOSURE: </strong> Voluntary; information is internally used and can only be viewed by Unit Commander</p>
                    <fieldset>
                        <legend>A. INFRACTION REPORT</legend>
                        <div data-row-span="4">
                            <div data-field-span="4">
                                <label>VIOLATOR NAME:</label>
                                <input type="text" value="{{$ir->violator_name}}" readonly>
                            </div>
                        </div>
                        <div data-row-span="1">
                            <div data-field-span="1">
                                <label>SUMMARY OF INTERACTION</label>
                                <textarea name="violation_summary" rows="15" readonly>{{$ir->violation_summary}}</textarea>
                            </div>
                        </div>
                    </fieldset>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
