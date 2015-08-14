@extends('frontend.layouts.master')

@section('title', 'Article 15')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">Article 15 - {{{\Carbon\Carbon::createFromFormat('U',$vcs->current_date)->toFormattedDateString()}}</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form">
                {!! csrf_field() !!}
                <div class="text-center"><legend><strong>ARTICLE 15</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                <p><strong>PRINCIPAL PURPOSE(S): </strong> A summarized Article 15 may be used to impose non-judicial punishment per the policies and procedures of the unit.</p>
                <p><strong>ROUTINE USE(S): </strong> This form becomes a part of the Service's Enlisted Master File and Field Personnel File.</p>
                <p><strong>DISCLOSURE: </strong> Not Applicable, filled out by Commanding Officer</p>
                <fieldset>
                    <legend>A. IDENTIFICATION DATA</legend>
                    <div data-row-span="6">
                        <div data-field-span="2">
                            <label>NAME</label>
                            <input type="text" name="name" readonly value="{{$art->name}}">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" name="grade" readonly value="{{$art->grade}}">
                        </div>

                    </div>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>MILITARY IDENTIFICATION NUMBER</label>
                            <input type="text" name="military_id" readonly value="{{$vpf->user->steam_id}}">
                        </div>
                        <div data-field-span="1">
                            <label>CURRENT DATE</label>
                            <input type="text" id="current_date" name="current_date" placeholder="01/01/2000" readonly value="{{$art->current_date}}">
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>B. INFRACTION</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>MISCONDUCT SUMMARY</label>
                            <textarea name="misconduct" rows="15" readonly>{{$art->misconduct}}</textarea>
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>The member was advised that no statement was required, but that any statement can be used against him or her in further proceedings. After considering all matters presented, the following punishments was imposed.</label>
                            <label><input readonly type="radio" name="plea" {{($art->plea == 'Guilty of all offenses') ? 'checked' : ''}} value="Guilty of all offenses"> Guilty of all offenses</label> &nbsp;
                            <label><input readonly type="radio" name="plea" {{($art->plea == 'NULL AND VOID, DESTROY THIS FORM. THIS MEMBER IS NOT GUILTY OF ANY CHARGES') ? 'checked' : ''}} value="NULL AND VOID, DESTROY THIS FORM. THIS MEMBER IS NOT GUILTY OF ANY CHARGES"> Not guilty of all offenses (do not file this form)</label> &nbsp;
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>Plan of Action</label>
                            <textarea name="plan_of_action" rows="15" readonly>{{$art->plan_of_action}}</textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>C. Counselor Data</legend>
                    <div data-row-span="4">
                        <div data-field-span="3">
                            <label>NAME</label>
                            <input type="text" name="counselor_name" readonly value="{{$art->counselor_name}}">
                        </div>
                        <div data-field-span="1">
                            <label>GRADE</label>
                            <input type="text" id="counselor_rank" name="counselor_rank" readonly value="{{$art->counselor_rank}}">
                        </div>
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="4">
                            <label>ORGANIZATION</label>
                            <input type="text" name="counselor_organization" readonly value="{{$art->counselor_organization}}">
                        </div>
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="2">
                            <label>SIGNATURE</label>
                            <input type="text" id="counselor_signature" name="counselor_signature" readonly value="{{$art->counselor_signature}}">
                        </div>
                        <div data-field-span="2">
                            <label>DATE</label>
                            <input type="text" id="counselor_sig_date" name="counselor_sig_date" readonly value="{{$art->counselor_sig_date}}">
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
