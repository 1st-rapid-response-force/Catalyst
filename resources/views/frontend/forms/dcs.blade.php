@extends('frontend.layouts.master')

@section('title', 'DCS')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">DCS - {{\Carbon\Carbon::createFromFormat('U',$dcs->date)->toFormattedDateString()}}</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form">
                {!! csrf_field() !!}
                <div class="text-center"><legend><strong>DEVELOPMENTAL COUNSELING STATEMENT</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                <p><strong>PRINCIPAL PURPOSE(S): </strong> To assist leaders in conducting and recording counseling data pertaining to subordinates.</p>
                <p><strong>ROUTINE USE(S): </strong> The Routine uses set forth at the beginning of the 1st RRF compilation of systems or records notices also apply to this system.</p>
                <p><strong>DISCLOSURE: </strong> Disclosure is voluntary</p>
                <fieldset>
                    <legend>A. IDENTIFICATION DATA</legend>
                    <div data-row-span="6">
                        <div data-field-span="2">
                            <label>NAME</label>
                            <input type="text" name="name" readonly value="{{$dcs->name}}">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" name="grade" readonly value="{{$dcs->grade}}">
                        </div>

                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>MILITARY IDENTIFICATION NUMBER</label>
                            <input type="text" name="military_id" readonly value="{{$vpf->user->steam_id}}">
                        </div>
                        <div data-field-span="1">
                            <label>CURRENT DATE</label>
                            <input type="text" id="date" name="date" placeholder="01/01/2000" readonly value="{{$dcs->date}}">
                        </div>
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="4">
                            <label>ORGANIZATION</label>
                            <input type="text" name="organization" readonly value="1st Rapid Response Force">
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>B. COUNSELING</legend>
                    <div data-row-span="4">
                        <div data-field-span="4">
                            <label>COUNSELOR</label>
                            <input type="text" name="counselor_name" readonly value="{{$dcs->counselor_name}}">
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>REASON FOR COUNSELING</label>
                            <textarea name="reason_counseling" rows="10" readonly>{{$dcs->reason_counseling}}</textarea>
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>KEYPOINTS</label>
                            <textarea name="key_points" rows="5" readonly>{{$dcs->key_points}}</textarea>
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>Plan of Action</label>
                            <textarea name="plan_of_action" rows="8" readonly>{{$dcs->plan_of_action}}</textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>C. ASSESSMENT</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>ASSESSMENT</label>
                            <textarea name="assessment" rows="5" readonly>{{$dcs->assessment}}</textarea>
                        </div>
                    </div>
                    <div data-field-span="1">
                        <label>CURRENT DATE</label>
                        <input type="text" id="assessment_date" name="assessment_date" placeholder="01/01/2000" readonly value="{{$dcs->assessment_date}}">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
