@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>Application</h1>
            <p>Your application has been received by our command clerk. You can use this page to track the status of your application. You will also receive email updates.</p>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="grid-form">
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
                                    <input type="text" name="first_name" readonly value="{{$app->first_name}}">
                                </div>
                                <div data-field-span="1">
                                    <label>LAST NAME</label>
                                    <input type="text" name="last_name" readonly value="{{$app->last_name}}">
                                </div>
                                <div data-field-span="2">
                                    <label>MILITARY IDENTIFICATION NUMBER</label>
                                    <input type="text" name="steam_id" readonly value="{{$app->user->steam_id}}">
                                </div>
                            </div>
                            <div data-row-span="3">
                                <div data-field-span="1">
                                    <label>DATE OF BIRTH</label>
                                    <input type="text" id="dob" name="dob" placeholder="01/01/2000" readonly value="{{ date('m/d/Y', strtotime($app->dob)) }}">
                                </div>
                                <div data-field-span="2">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" placeholder="18" readonly value="{{$app->nationality}}">
                                </div>
                            </div>
                            <div data-row-span="4">
                                <div data-field-span="4" data-field-error="Please enter a valid email address">
                                    <label>E-mail</label>
                                    <input type="email" name="email" readonly value="{{$app->user->email}}">
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>B. ENLISTMENT SECTION</legend>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>REQUESTED ASSIGNMENT</label>
                                    <input type="text" name="assignment" readonly value="{{$app->mos->mos.' - '.$app->mos->name}}">
                                </div>
                            </div>
                            <BR>
                            <fieldset>
                                <legend>PREVIOUS EXPERIENCE</legend>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        <label>HAVE YOU BEEN IN A MILSIM UNIT BEFORE</label>
                                        <label><input type="radio" name="milsim_experience" value="1" disabled {{($app->milsim_experience == true) ? 'checked' : ''}}> YES</label> &nbsp;
                                        <label><input type="radio" name="milsim_experience" value="0" disabled {{($app->milsim_experience == false) ? 'checked' : ''}}> NO</label> &nbsp;
                                    </div>
                                    <div data-field-span="1">
                                        <label>HAVE YOU BEEN DISHONORABLY DISCHARGED/REMOVED FROM A UNIT</label>
                                        <label><input type="radio" name="milsim_badconduct" value="1" disabled {{($app->milsim_badconduct == true) ? 'checked' : ''}}> YES</label> &nbsp;
                                        <label><input type="radio" name="milsim_badconduct" value="0" disabled {{($app->milsim_badconduct == false) ? 'checked' : ''}}> NO</label> &nbsp;
                                    </div>
                                </div>
                            </fieldset>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>WHAT GROUPS HAVE YOU BEEN A PART OF:</label>
                                    <input type="text" name="milsim_grouplist" placeholder="LEAVE THE REST OF THIS SECTION BLANK, IF NOT APPLICABLE" readonly value="{{$app->milsim_grouplist}}">
                                </div>
                            </div>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>HIGHEST RANK ATTAINED</label>
                                    <input type="text" name="milsim_highestrank" placeholder="" readonly value="{{$app->milsim_highestrank}}">
                                </div>
                                <div data-field-span="1">
                                    <label>RELEVANT TRAINING:</label>
                                    <input type="text" name="milsim_previoustraining" placeholder="" readonly value="{{$app->milsim_previoustraining}}">
                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>REASON FOR DEPARTURE FROM PREVIOUS UNIT</label>
                                    <input type="text" name="milsim_depature" placeholder="" readonly value="{{$app->milsim_depature}}">
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>AGREEMENTS</legend>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        <label>I UNDERSTAND THAT I AM JOINING A MILITARY SIMULATION UNIT</label>
                                        <label><input type="radio" name="agreement_milsim" value="1" disabled {{($app->agreement_milsim == true) ? 'checked' : ''}}> YES</label> &nbsp;
                                        <label><input type="radio" name="agreement_milsim" value="0" disabled {{($app->agreement_milsim == false) ? 'checked' : ''}}> NO</label> &nbsp;
                                    </div>
                                    <div data-field-span="1">
                                        <label>I UNDERSTAND THAT BY SUBMITTING THIS FORM, IT WILL IN EFFECT CHANGE MY STATUS AS A CIVILIAN TO A MEMBER OF THE 1ST RRF AND WILL BE HELD TO UNIT GUIDELINES</label>
                                        <label><input type="radio" name="agreement_guidelines" value="1" disabled {{($app->agreement_guidelines == true) ? 'checked' : ''}}> YES</label> &nbsp;
                                        <label><input type="radio" name="agreement_guidelines" value="0" disabled {{($app->agreement_guidelines == false) ? 'checked' : ''}}> NO</label> &nbsp;
                                    </div>
                                </div>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        <label>I UNDERSTAND THAT I AM EXPECTED TO FOLLOW ORDERS GIVEN TO ME</label>
                                        <label><input type="radio" name="agreement_orders" value="1" disabled {{($app->agreement_orders == true) ? 'checked' : ''}}> YES</label> &nbsp;
                                        <label><input type="radio" name="agreement_orders" value="0" disabled {{($app->agreement_orders == false) ? 'checked' : ''}}> NO</label> &nbsp;
                                    </div>
                                    <div data-field-span="1">
                                        <label>I UNDERSTAND THAT I AM EXPECTED TO RESPECT RANKS, CUSTOMS AND COURTESIES</label>
                                        <label><input type="radio" name="agreement_ranks" value="1" disabled {{($app->agreement_ranks == true) ? 'checked' : ''}}> YES</label> &nbsp;
                                        <label><input type="radio" name="agreement_ranks" value="0" disabled {{($app->agreement_ranks == false) ? 'checked' : ''}}> NO</label> &nbsp;
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <legend>C. FINAL SECTION</legend>
                            <div data-row-span="3">
                                <div data-field-span="2">
                                    <label>SIGNATURE</label>
                                    <input type="text" name="signature" readonly value="{{$app->signature}}">
                                </div>
                                <div data-field-span="1">
                                    <label>DATE</label>
                                    <input type="text" name="signature_date" readonly value="{{$app->signature_date}}">
                                </div>
                            </div>
                            <br>
                            <legend>D. APPROVAL AND ACCEPTANCE BY SERVICE REPRESENTATIVE</legend>
                            <p>Section to be filled out by Command Element Office.<p>
                            <div data-row-span="3">
                                <div data-field-span="2">
                                    <label>NAME</label>
                                    <input type="text" name="processed_name" readonly value="{{$app->processed_name}}">
                                </div>
                                <div data-field-span="1">
                                    <label>Pay Grade</label>
                                    <input type="text" name="signature_date" readonly value="{{$app->processed_paygrade}}">
                                </div>
                            </div>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>Unit Name</label>
                                    <input type="text" name="processed_unitname" readonly value="{{$app->processed_unitname}}">
                                </div>
                                <div data-field-span="1">
                                    <label>Signature</label>
                                    <input type="text" name="processed_signature" readonly value="{{$app->processed_signature}}">
                                </div>
                            </div>
                            @if((($app->status == 'Accepted') || ($app->status == 'Rejected')))
                                <br>
                                <legend>E. ENLISTMENT DECISION BY COMMAND</legend>
                                <p>Section to be filled out by member of the Officer Corp with authority to accept or reject applications.<p>
                                <div data-row-span="3">
                                    <div data-field-span="2">
                                        <label>NAME</label>
                                        <input type="text" name="decision_name" readonly value="{{$app->decision_name}}">
                                    </div>
                                    <div data-field-span="1">
                                        <label>Pay Grade</label>
                                        <input type="text" name="decision_paygrade" readonly value="{{$app->decision_paygrade}}">
                                    </div>
                                </div>
                                <div data-row-span="2">
                                    <div data-field-span="1">
                                        <label>Unit Name</label>
                                        <input type="text" name="processed_unitname" readonly value="{{$app->decision_unitname}}">
                                    </div>
                                    <div data-field-span="1">
                                        <label>Signature</label>
                                        <input type="text" name="processed_signature" readonly value="{{$app->decision_signature}}">
                                    </div>
                                </div>
                            @endif
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>STATUS</label>
                                    @if(($app->status == 'Under Review'))
                                        <img height="200" width="200" style="transform: rotate(3deg);display: block;margin-left: auto;margin-right: auto;" src="/frontend/images/under_review.jpg">
                                    @endif
                                    @if(($app->status == 'Accepted'))
                                        <img height="200" width="200" style="transform: rotate(45deg);display: block;margin-left: auto;margin-right: auto;" src="/frontend/images/approved.gif">
                                    @endif
                                    @if(($app->status == 'Rejected'))
                                        <img height="150" width="400" style="transform: rotate(7deg);display: block;margin-left: auto;margin-right: auto;" src="/frontend/images/rejected.png">
                                    @endif
                                </div>
                                <div data-field-span="1">
                                    <label>Statement</label>
                                    <textarea readonly cols="5">{{$app->processed_statement}}</textarea>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
