@extends('frontend.layouts.master')

@section('title', 'Discharge')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">Assignment Change Request Form - {{$ac->created_at->toFormattedDateString()}}</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form" method="post" action="{{route('vpf.forms.store', 'assignment_change')}}">
                {!! csrf_field() !!}
                <div class="text-center"><legend><strong>ASSIGNMENT CHANGE REQUEST FORM</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to request an assignment change within the 1st Rapid Response Force.</p>
                <p><strong>ROUTINE USE(S): </strong> This form becomes a part of the Service's Enlisted Internal File.</p>
                <p><strong>DISCLOSURE: </strong> Voluntary; however, failure to furnish proper information or file request will result in no assignment change.</p>
                <fieldset>
                    <legend>A. IDENTIFICATION DATA</legend>
                    <div data-row-span="6">
                        <div data-field-span="2">
                            <label>NAME</label>
                            <input type="text" name="name" readonly value="{{$vpf->last_name.', '.$vpf->first_name}}">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" name="grade" readonly value="{{$vpf->rank->pay_grade}}">
                        </div>

                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>MILITARY IDENTIFICATION NUMBER</label>
                            <input type="text" name="military_id" readonly value="{{$vpf->user->steam_id}}">
                        </div>
                        <div data-field-span="1">
                            <label>CURRENT DATE</label>
                            <input type="text" id="date" name="date" placeholder="01/01/2000" readonly value="{{\Carbon\Carbon::now()->toDateString()}}">
                        </div>
                    </div>
                    <div data-row-span="4">
                        <d data-field-span="4">
                            <label>ORGANIZATION</label>
                            <input type="text" name="organization" readonly value="1st Rapid Response Force">
                        </d
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>B. ASSIGNMENT REQUEST</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>REQUESTED ASSIGNMENT</label>
                            <input type="text" readonly value="{{$ac->requestedAssignment->name}} - {{$ac->requestedAssignment->mos->mos}} - {{$ac->requestedAssignment->group->name}}">
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>REASON FOR ASSIGNMENT CHANGE</label>
                            <textarea name="request_reason" readonly rows="15">{{$ac->request_reason}}</textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>C. PROCESSING PARTY</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>HAS THIS ASSIGNMENT CHANGE FORM BEEN REVIEWED</label>
                            <label><input type="radio" name="reviewed" value="1" disabled {{($ac->reviewed == 1) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="reviewed" value="0" disabled {{($ac->reviewed == 0) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>HAS THIS REQUEST BEEN APPROVED</label>
                            <label><input type="radio" name="approved" value="1" disabled {{($ac->approved == 1) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="approved" value="0" disabled {{($ac->approved == 1) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>AUTHORITY:</label>
                            <input type="text" readonly name="discharger_name" value="{{$ac->approved_by}}">
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
