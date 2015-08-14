@extends('backend.layout.main_layout')

@section('title','Article 15')

@section('sub-title','Forms')

@section('scripts-css-header')
<meta name="csrf-param" content="_token">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
<li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="{{route('admin.vpf.index')}}">Virtual Personnel File</a></li>
<li><a href="{{route('admin.vpf.show',$vpf->id)}}"> {{$vpf}}</a></li>
<li class="active">Article 15</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="grid-form" method="post">
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
                                    <input type="text" id="current_date" name="current_date" placeholder="01/01/2000" readonly value="{{\Carbon\Carbon::now()->toDateString()}}">
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>B. INFRACTION</legend>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>MISCONDUCT SUMMARY</label>
                                    <textarea name="misconduct" rows="15"></textarea>
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>The member was advised that no statement was required, but that any statement can be used against him or her in further proceedings. After considering all matters presented, the following punishments was imposed.</label>
                                    <label><input type="radio" name="plea" value="Guilty of all offenses"> Guilty of all offenses</label> &nbsp;
                                    <label><input type="radio" name="plea" value="NULL AND VOID, DESTROY THIS FORM. THIS MEMBER IS NOT GUILTY OF ANY CHARGES" checked> Not guilty of all offenses (do not file this form)</label> &nbsp;
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>Plan of Action</label>
                                    <textarea name="plan_of_action" rows="15"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>C. Counselor Data</legend>
                            <div data-row-span="4">
                                <div data-field-span="3">
                                    <label>NAME</label>
                                    <input type="text" name="counselor_name" readonly value="{{$user->vpf->last_name.', '.$user->vpf->first_name}}">
                                </div>
                                <div data-field-span="1">
                                    <label>GRADE</label>
                                    <input type="text" id="counselor_rank" name="counselor_rank" readonly value="{{$user->vpf->rank->name.'  '.$user->vpf->rank->pay_grade}}">
                                </div>
                            </div>
                            <div data-row-span="4">
                                <div data-field-span="4">
                                    <label>ORGANIZATION</label>
                                    <input type="text" name="counselor_organization" readonly value="1st Rapid Response Force">
                                </div>
                            </div>
                            <div data-row-span="4">
                                <div data-field-span="2">
                                    <label>SIGNATURE</label>
                                    <input type="text" id="counselor_signature" name="counselor_signature" readonly value="{{$user->vpf}}">
                                </div>
                                <div data-field-span="2">
                                    <label>DATE</label>
                                    <input type="text" id="counselor_sig_date" name="counselor_sig_date" readonly value="{{\Carbon\Carbon::now()->toDateTimeString()}}">
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-primary">File Form</button>
                    </form>
                </div>
            </div>
@endsection

@section('page-script')
@endsection

@section('page-script-include')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection


