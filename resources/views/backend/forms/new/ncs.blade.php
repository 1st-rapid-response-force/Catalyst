@extends('backend.layout.main_layout')

@section('title','Negative Counseling Statement')

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
<li class="active">NCS</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="grid-form" method="post">
                        {!! csrf_field() !!}
                        <div class="text-center"><legend><strong>NEGATIVE COUNSELING STATEMENT</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                        <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                        <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                        <p><strong>PRINCIPAL PURPOSE(S): </strong>  To correct the negative actions or behavior of their subordinates. The main requirement of the NCS is the verbal counseling of the soldier by their superior, in which the behavior is addressed and corrected. Superiors will cover the issue, any disciplinary action that will be taken and consequences of future recurrence.</p>
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
                            <legend>B. INFRACTION</legend>
                            <div data-row-span="4">
                                <div data-field-span="4">
                                    <label>COUNSELOR</label>
                                    <input type="text" name="counselor_name" readonly value="{{$user->vpf}}">
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>MISCONDUCT SUMMARY</label>
                                    <textarea name="summary_infraction" rows="15"></textarea>
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>Plan of Action</label>
                                    <textarea name="action_plan" rows="8"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>C. Unit Commander Approval</legend>
                            <div data-row-span="4">
                                <div data-field-span="1">
                                    <label></label>
                                    <label><input type="radio" name="approval" value="Approve plan of action." readonly> Approve plan of action.</label> &nbsp;
                                    <label><input type="radio" name="approval" value="I recommend no further action." readonly> I recommend no further action.</label> &nbsp;
                                </div>
                                <div data-field-span="3">
                                    <label>NAME OF COMMANDER</label>
                                    <input type="text" id="commander_name" name="commander_name" readonly value="{{$user->vpf->last_name.', '.$user->vpf->first_name}}">
                                </div>
                            </div>
                            <div data-row-span="4">
                                <div data-field-span="1">
                                    <label>RANK</label>
                                    <input type="text" id="commander_rank" name="commander_rank" readonly value="{{$user->vpf->rank->name}}">
                                </div>
                                <div data-field-span="2">
                                    <label>UNIT/POSITION</label>
                                    <input type="text" id="commander_assignment" name="commander_assignment" readonly value="{{$user->vpf->assignment->name}}">
                                </div>
                                <div data-field-span="1">
                                    <label>DATE</label>
                                    <input type="text" id="approval_date" name="approval_date" readonly value="{{\Carbon\Carbon::now()->toDateString()}}">
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


