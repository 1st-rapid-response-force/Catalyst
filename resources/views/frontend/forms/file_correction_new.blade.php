@extends('frontend.layouts.master')

@section('title', 'VPF File Correction')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">VPF File Correction Form</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form" method="post" action="{{route('vpf.forms.store', 'vpf_cr')}}">
                {!! csrf_field() !!}
                <div class="text-center"><legend><strong>VIRTUAL PERSONNEL FILE CORRECTION FORM</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to report and correct issues with a members virtual personnel file.</p>
                <p><strong>ROUTINE USE(S): </strong> Used by S1 to correct issues with member files.</p>
                <p><strong>DISCLOSURE: </strong> Voluntary; however, failure to report issues with a virtual personnel file after becoming aware of an error and can lead to punitive action.</p>
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
                    <legend>B. CORRECTION SECTION</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>CORRECTION INFORMATION</label>
                            <textarea name="correction_summary" rows="15" placeholder="Specific exactly what is currently incorrect in your file and the correct value"></textarea>
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <p>Under unit policy all personnel files must be accurate. All VPF file corrections are viewed and processed within 48HRS per policy.</p>
                <button type="submit">File Correction Request</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
