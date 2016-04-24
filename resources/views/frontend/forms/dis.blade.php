@extends('frontend.layouts.master')

@section('title', 'Discharge')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">Discharge Paperwork - {{$dis->created_at->toFormattedDateString()}}</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form">
                {!! csrf_field() !!}
                <div class="text-center"><legend><strong>DISCHARGE PAPERWORK</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to document a discharge/seperation from the 1st Rapid Response Force.</p>
                <p><strong>ROUTINE USE(S): </strong> This form becomes a part of the Service's Enlisted Internal File.</p>
                <p><strong>DISCLOSURE: </strong> Voluntary; however, failure to furnish proper information may negate the proper discharge and can lead to punitive action.</p>
                <fieldset>
                    <legend>A. IDENTIFICATION DATA</legend>
                    <div data-row-span="6">
                        <div data-field-span="2">
                            <label>NAME</label>
                            <input type="text" name="name" readonly value="{{$dis->name}}">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" name="grade" readonly value="{{$dis->grade}}">
                        </div>

                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>MILITARY IDENTIFICATION NUMBER</label>
                            <input type="text" name="military_id" readonly value="{{$dis->VPF->user->steam_id}}">
                        </div>
                        <div data-field-span="1">
                            <label>CURRENT DATE</label>
                            <input type="text" id="date" name="date" placeholder="01/01/2000" readonly value="{{$dis->date}}">
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
                    <legend>B. DISCHARGE</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>DISCHARGE NOTES</label>
                            <textarea name="discharge_text" rows="15" readonly>{{$dis->discharge_text}}</textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>C. PROCESSING PARTY</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>DISCHARGE TYPE</label>
                            <input type="text" readonly name="discharge_type" value="{{$dis->discharge_type}}">
                        </div>
                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>NAME</label>
                            <input type="text" readonly name="discharger_name" value="{{$dis->discharger_name}}">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" readonly name="discharger_grade" value="{{$dis->discharger_grade}}">
                        </div>
                    </div>
                    <div data-row-span="2">
                        <div data-field-span="2">
                            <label>ORGANIZATION</label>
                            <input type="text" readonly name="discharger_organization" value="{{$dis->discharger_organization}}">
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>SIGNATURE</label>
                            <input type="text" name="discharger_signature" readonly value="{{$dis->discharger_signature}}">
                        </div>
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
