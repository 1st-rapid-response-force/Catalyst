@extends('backend.layout.main_layout')

@section('title','Developmental Counseling Statement')

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
<li class="active">DCS</li>
@endsection

@section('content')
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="grid-form" method="post">
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
                            <legend>B. COUNSELING</legend>
                            <div data-row-span="4">
                                <div data-field-span="4">
                                    <label>COUNSELOR</label>
                                    <input type="text" name="counselor_name" readonly value="{{$user->vpf}}">
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>REASON FOR COUNSELING</label>
                                    <textarea name="reason_counseling" rows="10"></textarea>
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>KEYPOINTS</label>
                                    <textarea name="key_points" rows="5"></textarea>
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>Plan of Action</label>
                                    <textarea name="plan_of_action" rows="8"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>C. ASSESSMENT</legend>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>ASSESSMENT</label>
                                    <textarea name="assessment" rows="5"></textarea>
                                </div>
                            </div>
                            <div data-field-span="1">
                                <label>CURRENT DATE</label>
                                <input type="text" id="assessment_date" name="assessment_date" placeholder="01/01/2000" readonly value="{{\Carbon\Carbon::now()->toDateString()}}">
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


