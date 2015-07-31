@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/backend/css/gridforms.css">
    <link rel="stylesheet" type="text/css" href="/plugins/datepicker/datepicker3.css">
    <script type="text/javascript" src="/plugins/datepicker/bootstrap-datepicker.js"></script>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/enlistment">Enlistment</a></li>
        <li class="active">My Application</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Registration</h1>
        <h2>1st Rapid Respond Force Enlistment Application</h2>
        <p>This paperwork is for a fictional organization, we are not affiliated or associated with any real life entity. We are simply a MILSIM oriented group for ARMA 3. The information you are providing is for your
            character.</p>
        <p>However your application must meet the following requirements</p>
        <ul>
            <li>Your name must be realistic but does not need to be your real name - an example of this would be "James Edward"</li>
            <li>The age field must be accurate, the 1st RRF has a 18+ age requirement. Failure to disclose your actual age will result in discharge from the unit.</li>
        </ul>
        <HR>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="grid-form" action="/enlistment/store" method="post">
                    {!! csrf_field() !!}
                    <div class="text-center"><legend><strong>ENLISTMENT/REENLISTMENT DOCUMENT</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                    <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                    <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                    <p><strong>PRINCIPAL PURPOSE(S): </strong> To record enlistment or reenlistment into the 1st Rapid Response Force. This information becomes a part of the subject'smilitary personnel records which are used to document promotion, reassignment, training, medical support, and other personnel management actions.</p>
                    <p><strong>ROUTINE USE(S): </strong> This form becomes a part of the Service's Enlisted Master File and Field Personnel File.</p>
                    <p><strong>DISCLOSURE: </strong> Voluntary; however, failure to furnish personal identification information may negate the enlistment/reenlistment application</p>
                    <fieldset>
                        <legend>A. ENLISTEE/REENLISTEE IDENTIFICATION DATA</legend>
                        <div data-row-span="4">
                            <div data-field-span="1">
                                <label>FIRST NAME</label>
                                <input type="text" name="first_name" required>
                            </div>
                            <div data-field-span="1">
                                <label>LAST NAME</label>
                                <input type="text" name="last_name" required>
                            </div>
                            <div data-field-span="2">
                                <label>MILITARY IDENTIFICATION NUMBER</label>
                                <input type="text" name="steam_id" readonly value="{{$user->steam_id}}">
                            </div>
                        </div>
                        <div data-row-span="3">
                            <div data-field-span="1">
                                <label>DATE OF BIRTH</label>
                                <input type="text" id="dob" name="dob" placeholder="MM/DD/YYYY">
                            </div>
                            <div data-field-span="2">
                                <label>Nationality</label>
                                @include('frontend.includes.auth.nationalities')
                            </div>
                        </div>
                        <div data-row-span="4">
                            <div data-field-span="4" data-field-error="Please enter a valid email address">
                                <label>E-mail</label>
                                <input type="email" name="email" readonly value="{{$user->email}}">
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>B. ENLISTMENT SECTION</legend>
                        <div data-row-span="1">
                            <div data-field-span="1">
                                <label>REQUESTED ASSIGNMENT</label>
                                <input type="hidden" name="mos_id" value="{{$mos->id}}">
                                <input type="text" name="mos" readonly value="{{$mos->mos.' - '.$mos->name}}">
                            </div>
                        </div>
                        <BR>
                        <fieldset>
                            <legend>PREVIOUS EXPERIENCE</legend>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>HAVE YOU BEEN IN A MILSIM UNIT BEFORE</label>
                                    <label><input type="radio" name="milsim_experience" value="1"> YES</label> &nbsp;
                                    <label><input type="radio" name="milsim_experience" value="0" checked> NO</label> &nbsp;
                                </div>
                                <div data-field-span="1">
                                    <label>HAVE YOU BEEN DISHONORABLY DISCHARGED/REMOVED FROM A UNIT</label>
                                    <label><input type="radio" name="milsim_badconduct" value="1"> YES</label> &nbsp;
                                    <label><input type="radio" name="milsim_badconduct" value="0" checked> NO</label> &nbsp;
                                </div>
                            </div>
                        </fieldset>
                        <div data-row-span="1">
                            <div data-field-span="1">
                                <label>WHAT GROUPS HAVE YOU BEEN A PART OF:</label>
                                <input type="text" name="milsim_grouplist" placeholder="LEAVE THE REST OF THIS SECTION BLANK, IF NOT APPLICABLE">
                            </div>
                        </div>
                        <div data-row-span="2">
                            <div data-field-span="1">
                                <label>HIGHEST RANK ATTAINED</label>
                                <input type="text" name="milsim_highestrank" placeholder="">
                            </div>
                            <div data-field-span="1">
                                <label>RELEVANT TRAINING:</label>
                                <input type="text" name="milsim_previoustraining" placeholder="">
                            </div>
                        </div>
                        <div data-row-span="1">
                            <div data-field-span="1">
                                <label>REASON FOR DEPARTURE FROM PREVIOUS UNIT</label>
                                <input type="text" name="milsim_depature" placeholder="">
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>AGREEMENTS</legend>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>I UNDERSTAND THAT I AM JOINING A MILITARY SIMULATION UNIT</label>
                                    <label><input type="radio" name="agreement_milsim" value="1"> YES</label> &nbsp;
                                    <label><input type="radio" name="agreement_milsim" value="0" checked> NO</label> &nbsp;
                                </div>
                                <div data-field-span="1">
                                    <label>I UNDERSTAND THAT BY SUBMITTING THIS FORM, IT WILL IN EFFECT CHANGE MY STATUS AS A CIVILIAN TO A MEMBER OF THE 1ST RRF AND WILL BE HELD TO UNIT GUIDELINES</label>
                                    <label><input type="radio" name="agreement_guidelines" value="1"> YES</label> &nbsp;
                                    <label><input type="radio" name="agreement_guidelines" value="0" checked> NO</label> &nbsp;
                                </div>
                            </div>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>I UNDERSTAND THAT I AM EXPECTED TO FOLLOW ORDERS GIVEN TO ME</label>
                                    <label><input type="radio" name="agreement_orders" value="1"> YES</label> &nbsp;
                                    <label><input type="radio" name="agreement_orders" value="0" checked> NO</label> &nbsp;
                                </div>
                                <div data-field-span="1">
                                    <label>I UNDERSTAND THAT I AM EXPECTED TO RESPECT RANKS, CUSTOMS AND COURTESIES</label>
                                    <label><input type="radio" name="agreement_ranks" value="1"> YES</label> &nbsp;
                                    <label><input type="radio" name="agreement_ranks" value="0" checked> NO</label> &nbsp;
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <legend>C. FINAL SECTION</legend>
                        <div data-row-span="3">
                            <div data-field-span="2">
                                <label>SIGNATURE</label>
                                <input type="text" name="signature" required>
                            </div>
                            <div data-field-span="1">
                                <label>DATE</label>
                                <input type="text" name="signature_date" readonly value="{{\Carbon\Carbon::now()->toDateTimeString()}}">
                            </div>
                        </div>
                        <br>
                        <div class="pull-right">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input class="btn btn-primary" type="submit">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#dob').datepicker({});
        });

    </script>
@endsection
