@extends('backend.layout.main_layout')

@section('title','Enlistment Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/backend/css/gridforms.css">
    <!-- Select2 -->
    <link href="/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.enlistments.index')}}"><i class="fa fa-file"></i> Enlistment Manager</a></li>
    <li class="active"><i class="fa fa-users"></i> Edit Enlistment Application</li>
@endsection

@section('content')
    @if(($app->status == 'Under Review'))
    <form class="grid-form" action="{{ route('admin.enlistments.update',array($app->id)) }}" method="post">
        <input name="_method" type="hidden" value="PUT">
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
                        <input type="text" name="first_name" value="{{$app->first_name}}">
                    </div>
                    <div data-field-span="1">
                        <label>LAST NAME</label>
                        <input type="text" name="last_name" value="{{$app->last_name}}">
                    </div>
                    <div data-field-span="2">
                        <label>MILITARY IDENTIFICATION NUMBER</label>
                        <input type="text" name="steam_id" readonly value="{{$app->user->steam_id}}">
                    </div>
                </div>
                <div data-row-span="3">
                    <div data-field-span="1">
                        <label>DATE OF BIRTH</label>
                        <input type="text" id="dob" name="dob" placeholder="01/01/2000" value="{{date('m/d/Y', strtotime($app->dob))}}">
                    </div>
                    <div data-field-span="2">
                        <label>Nationality</label>
                        <input type="text" name="nationality" placeholder="" value="{{$app->nationality}}">
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
                            <label><input type="radio" name="milsim_experience" value="1" {{($app->milsim_experience == true) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="milsim_experience" value="0" {{($app->milsim_experience == false) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                        <div data-field-span="1">
                            <label>HAVE YOU BEEN DISHONORABLY DISCHARGED/REMOVED FROM A UNIT</label>
                            <label><input type="radio" name="milsim_badconduct" value="1" {{($app->milsim_badconduct == true) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="milsim_badconduct" value="0" {{($app->milsim_badconduct == false) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                    </div>
                </fieldset>
                <div data-row-span="1">
                    <div data-field-span="1">
                        <label>WHAT GROUPS HAVE YOU BEEN A PART OF:</label>
                        <input type="text" name="milsim_grouplist" placeholder="LEAVE THE REST OF THIS SECTION BLANK, IF NOT APPLICABLE" value="{{$app->milsim_grouplist}}">
                    </div>
                </div>
                <div data-row-span="2">
                    <div data-field-span="1">
                        <label>HIGHEST RANK ATTAINED</label>
                        <input type="text" name="milsim_highestrank" placeholder="" value="{{$app->milsim_highestrank}}">
                    </div>
                    <div data-field-span="1">
                        <label>RELEVANT TRAINING:</label>
                        <input type="text" name="milsim_previoustraining" placeholder="" value="{{$app->milsim_previoustraining}}">
                    </div>
                </div>
                <div data-row-span="1">
                    <div data-field-span="1">
                        <label>REASON FOR DEPARTURE FROM PREVIOUS UNIT</label>
                        <input type="text" name="milsim_depature" placeholder="" value="{{$app->milsim_depature}}">
                    </div>
                </div>
                <br>
                <fieldset>
                    <legend>AGREEMENTS</legend>
                    <div data-row-span="2">
                        <div data-field-span="1">
                            <label>I UNDERSTAND THAT I AM JOINING A MILITARY SIMULATION UNIT</label>
                            <label><input type="radio" name="agreement_milsim" value="1" {{($app->agreement_milsim == true) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="agreement_milsim" value="0" {{($app->agreement_milsim == false) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                        <div data-field-span="1">
                            <label>I UNDERSTAND THAT BY SUBMITTING THIS FORM, IT WILL IN EFFECT CHANGE MY STATUS AS A CIVILIAN TO A MEMBER OF THE 1ST RRF AND WILL BE HELD TO UNIT GUIDELINES</label>
                            <label><input type="radio" name="agreement_guidelines" value="1" {{($app->agreement_guidelines == true) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="agreement_guidelines" value="0" {{($app->agreement_guidelines == false) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                    </div>
                    <div data-row-span="2">
                        <div data-field-span="1">
                            <label>I UNDERSTAND THAT I AM EXPECTED TO FOLLOW ORDERS GIVEN TO ME</label>
                            <label><input type="radio" name="agreement_orders" value="1" {{($app->agreement_orders == true) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="agreement_orders" value="0" {{($app->agreement_orders == false) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                        <div data-field-span="1">
                            <label>I UNDERSTAND THAT I AM EXPECTED TO RESPECT RANKS, CUSTOMS AND COURTESIES</label>
                            <label><input type="radio" name="agreement_ranks" value="1" {{($app->agreement_ranks == true) ? 'checked' : ''}}> YES</label> &nbsp;
                            <label><input type="radio" name="agreement_ranks" value="0" {{($app->agreement_ranks == false) ? 'checked' : ''}}> NO</label> &nbsp;
                        </div>
                    </div>
                </fieldset>
                <br>
                <legend>C. FINAL SECTION</legend>
                <div data-row-span="3">
                    <div data-field-span="2">
                        <label>SIGNATURE</label>
                        <input type="text" name="signature" value="{{$app->signature}}">
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
                        <input type="text" name="processed_name" value="{{$app->processed_name}}">
                    </div>
                    <div data-field-span="1">
                        <label>Pay Grade</label>
                        <input type="text" name="processed_paygrade" value="{{$app->processed_paygrade}}">
                    </div>
                </div>
                <div data-row-span="2">
                    <div data-field-span="1">
                        <label>Unit Name</label>
                        <input type="text" name="processed_unitname" value="{{$app->processed_unitname}}">
                    </div>
                    <div data-field-span="1">
                        <label>Signature</label>
                        <input type="text" name="processed_signature" value="{{$app->processed_signature}}">
                    </div>
                </div>
                <div data-row-span="1">
                    <div data-field-span="1">
                        <label>STATUS</label>
                        <input type="text" name="status_hold" disabled value="{{$app->status}}">
                    </div>
                </div>
                <div data-row-span="1">
                    <div data-field-span="1">
                        <label>Statement</label>
                        <!-- Button trigger modal -->
                        <input type="text" name="processed_statement_hold" disabled value="{{$app->processed_statement}}">
                    </div>
                </div>
            </fieldset>
        <br>
        <div class="text-center">
            <input type="hidden" name="user_id" value="{{$app->user->id}}">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approve">Approve</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject">Reject</button>
            <input class="btn btn-primary" value="Apply Application Changes" type="submit"><br>
            <small>You can only make modifications while the application is still under review, once a user is accepted or declined. The system will make this file read only</small>
        </div>
        </form>
        <br>

    <br><br><br>
    @else
    <p>This application has been processed. You cannot modify this application. <a href="{{ route('admin.enlistments.show', $app->id)}}">View Read Only Application File</a></p>
    @endif
@endsection

@section('page-script-include')
    <script type="text/javascript" src="/backend/js/gridforms.js"></script>

    <!-- Modal -->
    <div class="modal fade" id="approve" role="dialog" aria-labelledby="approveLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Approve Application?</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.enlistments.approve',array($app->id)) }}" method="post">
                        <textarea name="statement" class="form-control" rows="3" placeholder="Provide a brief statement regarding the decision (will be shown to user)"></textarea>
                        <br>
                        <p>You will need to assign this member an assignment, The user selected the following MOS</p>
                        <div class="form-group">
                            <input id="assignment" class="form-control" type="text" name="mos_selected" readonly value="{{$app->mos->name}}">
                        </div>
                        <select name="assignment_id" class="form-control select2" style="width: 100%;">
                            @foreach($assignments as $assign)
                                <option value="{{$assign->id}}">{{$assign->mos->mos.' - '.$assign->name.' - '.$assign->group->name}}</option>
                            @endforeach
                        </select>
                        {!! csrf_field() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-success" value="Accept User" type="submit"><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="reject" role="dialog" aria-labelledby="rejectLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reject Application?</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.enlistments.reject',array($app->id)) }}" method="post">
                        <textarea name="statement" class="form-control" rows="3" placeholder="Provide a brief statement regarding the decision (will be shown to user)"></textarea>
                    {!! csrf_field() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-danger" value="Reject User" type="submit"><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            //Initialize Select2 Elements
            $('select').select2();
        });
    </script>
@endsection
