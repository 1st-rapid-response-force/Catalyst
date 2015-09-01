@extends('frontend.layouts.master')

@section('title', 'Discharge')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">Discharge Request</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form" method="post" action="{{route('vpf.forms.store', 'discharge')}}">
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
                            <label>REASON FOR DISCHARGE</label>
                            <textarea name="discharge_text" rows="15"></textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>C. PROCESSING PARTY</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>DISCHARGE TYPE</label>
                            <input type="text" readonly name="discharge_type" value="PENDING REVIEW">
                        </div>
                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>NAME</label>
                            <input type="text" readonly name="discharger_name" value="">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" readonly name="discharger_grade" value="">
                        </div>
                    </div>
                    <div data-row-span="2">
                        <div data-field-span="2">
                            <label>ORGANIZATION</label>
                            <input type="text" readonly name="discharger_organization" value="">
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>SIGNATURE</label>
                            <input type="text" name="discharger_signature" readonly value="">
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <p>The only section you need to fillout is the reason for discharge section. Once you submit this form and it is processed, you will be notified via email and your permissions and rank will be removed.</p>
                <button type="submit">File for Discharge</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
