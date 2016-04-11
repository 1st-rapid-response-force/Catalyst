@extends('backend.layout.main_layout')

@section('title','VPF Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.vpf.index')}}"><i class="fa fa-dashboard"></i> VPF Manager</a></li>
    <li class="active"><i class="fa fa-users"></i> Show VPF</li>
@endsection

@section('content')
    <div class="panel panel-body">
        <h1>Virtual Personnel File - {{$vpf}}</h1>
        <div class="text-center">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="well well-sm">
                            <div class="panel-body">
                                <div class="row">
                                    <img style="max-width: 100px; max-height: 100px" src="{{$vpf->rank->showSmall()}}" class="center-block">
                                </div>
                                <div class="row">
                                    <h3>{{$vpf->rank->name.' '.$vpf->rank->pay_grade}}</h3>
                                    <h5>Assignment:</h5>
                                    <p>{{$vpf->assignment->name}} - {{$vpf->assignment->mos->mos}}</p>
                                    <h5>Group:</h5>
                                    {{$vpf->assignment->group->name}}
                                    <h5>Military Identification Number:</h5>
                                    {{$vpf->user->steam_id}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/frontend/images/faces/members/{{$vpf->user->steam_id}}.png">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#serviceHistory" aria-controls="serviceHistory" role="tab" data-toggle="tab">Service History</a></li>
                    <li role="presentation"><a href="#formHistory" aria-controls="formHistory" role="tab" data-toggle="tab">Form History</a></li>
                    <li role="presentation"><a href="#opqualschool" aria-controls="opqualschool" role="tab" data-toggle="tab">Operations, Qualifications, Schools</a></li>
                    <li role="presentation"><a href="#request-options" aria-controls="request-options" role="tab" data-toggle="tab">Options</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="serviceHistory">
                        <br>
                        @if($profile['serviceHistory']->count() > 0)
                            <table class="table table-bordered table-hover" id="serviceHistoryTable">
                                <thead>
                                <th>Date</th>
                                <th>Note</th>
                                <th></th>
                                </thead>
                                <tbody>

                                @foreach($profile['serviceHistory'] as $serviceHistory)
                                    <tr>
                                        <td class="col-lg-2">{{\Carbon\Carbon::createFromFormat('Y-m-d',$serviceHistory->date)->toFormattedDateString()}}</td>
                                        <td class="col-lg-10">{{$serviceHistory->note}}</td>
                                        <td> <a href="{{ route('admin.vpf.delete.serviceHistory',array($vpf->id,$serviceHistory->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Service History for this member.</p>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="formHistory">
                        <br>
                        @if($profile['forms']->count() > 0)
                            <table class="table table-bordered table-hover" id="formHistoryTable">
                                <thead>
                                <th>Date</th>
                                <th>Form</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($profile['forms'] as $form)
                                    <tr>
                                        <td class="col-lg-2">{{$form->updated_at->toFormattedDateString()}}</td>
                                        <td class="col-lg-10"><a href="/forms/show/{{$form->form_type}}/{{$form->id}}">{{$form->form_name}}</a></td>
                                        <td> <a href="{{ route('admin.vpf.delete.form',array($vpf->id,$form->form_type,$form->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Form History for this member.</p>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="opqualschool">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Qualifications</h3>
                                @if($profile['qualifications']->count() > 0)
                                    @foreach($profile['qualifications'] as $qualification)
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" style="max-height: 75px; max-width: 75px" src="{{$qualification->showSmall()}}" alt="{{$qualification->name}}">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$qualification->name}} <a href="{{ route('admin.vpf.delete.qualification',array($vpf->id,$qualification->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></h4>
                                                {{$qualification->description}}<br>Awarded on {{\Carbon\Carbon::createFromFormat('Y-m-d',$qualification->pivot->date_awarded)->toFormattedDateString()}}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No Qualifications to display.</p>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <h3>Operations</h3>
                                @if($profile['operations']->count() > 0)
                                    <table class="table table-bordered table-hover" id="formHistoryTable">
                                        <tbody>
                                        @foreach($profile['operations'] as $operation)
                                            <tr>
                                                <td class="col-lg-1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$operation->pivot->date_attended)->toFormattedDateString()}}</td>
                                                <td class="col-lg-4"><a href="/schools/">{{$operation->name}}</a>  -  <a href="{{ route('admin.vpf.delete.operations',array($vpf->id,$operation->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Schools attended on record.</p>
                                @endif
                                <h3>Schools</h3>
                                @if($profile['schools']->count() > 0)
                                    <h4>Completed Schools</h4>
                                    <table class="table table-bordered table-hover" id="formHistoryTable">
                                        <tbody>
                                        @foreach($profile['schools'] as $school)
                                            <tr>
                                                <td class="col-lg-1">{{\Carbon\Carbon::createFromFormat('Y-m-d',$school->pivot->date_attended)->toFormattedDateString()}}</td>
                                                <td class="col-lg-4"><a href="/schools/">{{$school->name}}</a> - <a href="{{ route('admin.vpf.delete.school',array($vpf->id,$school->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Schools attended on record.</p>
                                @endif
                                @if($vpf->schools()->where('completed','=',0)->get()->count() > 0)
                                    <h4>In Progress</h4>
                                    <table class="table table-bordered table-hover" id="formHistoryTable">
                                        <tbody>
                                        @foreach($vpf->schools()->where('completed','=',0)->get() as $school)
                                            <tr>
                                                <td class="col-lg-4"><a href="/schools/">{{$school->name}}</a> -  <a href="{{ route('admin.vpf.delete.school',array($vpf->id,$school->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Schools in progress on record.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="request-options">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Paperwork</h3>
                                <a class="btn btn-block btn-default" href="/admin/vpf/{{$vpf->id}}/forms/article15">New Article 15</a>
                                <a class="btn btn-block btn-default" href="/admin/vpf/{{$vpf->id}}/forms/ncs">New Negative Counseling Statement</a>
                                <a class="btn btn-block btn-default" href="/admin/vpf/{{$vpf->id}}/forms/dcs">New Developmental Counseling Statement</a>
                                <a class="btn btn-block btn-default" href="/admin/vpf/{{$vpf->id}}/forms/vcs">New Verbal Counseling Statement</a>
                                <hr>

                            </div>
                            <div class="col-lg-6">
                                <h3>Options</h3>
                                <a class="btn btn-block btn-primary" href="{{route('admin.vpf.promote',$vpf->id)}}">Promote Member</a>
                                <a class="btn btn-block btn-primary" href="{{route('admin.vpf.reassign',$vpf->id)}}">Reassign Member</a>
                                <a class="btn btn-block btn-danger" href="{{route('admin.vpf.discharge',$vpf->id)}}">Discharge Member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <hr>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#add">
                    Add to VPF
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editProfile">
                    Edit Profile
                </button>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable();
            $("select").select2();
        });
    </script>
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="addLabel">Add to VPF</h4>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#addServiceHistory" role="tab" data-toggle="tab">Service History</a></li>
                        <li><a href="#addRibbon" role="tab" data-toggle="tab">Ribbon</a></li>
                        <li><a href="#addQualifications" role="tab" data-toggle="tab">Qualifications</a></li>
                        <li><a href="#addOperations" role="tab" data-toggle="tab">Operations</a></li>
                        <li><a href="#addSchools" role="tab" data-toggle="tab">Schools</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="addServiceHistory">
                            <div style="padding-top: 10px"></div>
                            <form action="{{route('admin.vpf.update',$vpf->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="form_type" value="addServiceHistory">
                                <div class="form-group">
                                    <label for="dob">Date:</label>
                                    <input type="date" class="form-control" id="serviceHistoryDate" name="serviceHistoryDate" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Service History:</label>
                                    <input type="text" class="form-control" id="serviceHistoryNote" name="serviceHistoryNote" placeholder="Service History Note">
                                </div>
                                <button type="submit" class="btn btn-success">Add Service History</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="addRibbon">
                            <div style="padding-top: 10px"></div>
                            <form action="{{route('admin.vpf.update',$vpf->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="form_type" value="addRibbon">
                                <div class="form-group">
                                    <label for="dob">Ribbons:</label>
                                    <div class="form-group">
                                        <label for="dob">Date:</label>
                                        <input type="date" class="form-control" id="dateAwarded" name="dateAwarded" placeholder="Date">
                                    </div>
                                    <select name="ribbons" style="width: 100%;">
                                        @foreach($ribbons as $ribbon)
                                            <option value="{{$ribbon->id}}">{{$ribbon->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Add Ribbons</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="addQualifications">
                            <div style="padding-top: 10px"></div>
                            <form action="{{route('admin.vpf.update',$vpf->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="form_type" value="addQualifications">
                                <div class="form-group">
                                    <label for="dob">Date:</label>
                                    <input type="date" class="form-control" id="dateAwarded" name="dateAwarded" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Qualifications:</label>
                                    <select name="qualifications" style="width: 100%;">
                                        @foreach($qualifications as $qualification)
                                            <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Add Qualification</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="addPromotionPoints">
                            <div style="padding-top: 10px"></div>
                        </div>
                        <div class="tab-pane" id="addOperations">
                            <div style="padding-top: 10px"></div>
                            <div style="padding-top: 10px"></div>
                            <form action="{{route('admin.vpf.update',$vpf->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="form_type" value="addOperations">
                                <div class="form-group">
                                    <label for="dob">Operations:</label>
                                    <select name="operations" style="width: 100%;">
                                        @foreach($operations as $operation)
                                            <option value="{{$operation->id}}">{{$operation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Add Ribbons</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="addSchools">
                            <div style="padding-top: 10px"></div>
                            <p>Adding a school via this interface overrides the regular training flow and will override any requirements and prerequisites for the course.
                            You can also mark a course as completed via submitting the form with a completed mark.</p>
                            <h4>School's Current in Progress</h4>
                            <ul>
                                @foreach($vpf->schools()->where('completed','=',0)->get() as $inProgress)
                                    <li>{{$inProgress->name}}</li>
                                @endforeach
                            </ul>
                            <form action="{{route('admin.vpf.update',$vpf->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="form_type" value="addSchools">
                                <div class="form-group">
                                    <label for="dob">Schools:</label>
                                    <select name="schools" style="width: 100%;">
                                        @foreach($schools as $school)
                                            <option value="{{$school->id}}">{{$school->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" value="false" name="completed">
                                <div class="checkbox">
                                    <label>
                                        <input value="1" name="completed" type="checkbox"> Mark school as completed
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of School (leave blank if N/A):</label>
                                    <input type="date" class="form-control" id="dateAttended" name="dateAttended" placeholder="Date Attended">
                                </div>
                                <button type="submit" class="btn btn-success">Add Service History</button>
                            </form>

                        </div>
                        <div class="tab-pane" id="addTeamspeakUUIDs">
                            <div style="padding-top: 10px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="editProfileLabel">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#basic_info" role="tab" data-toggle="tab">Basic Info</a></li>
                        <li><a href="#unit_info" role="tab" data-toggle="tab">Unit Info</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <form action="{{route('admin.vpf.update',$vpf->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="form_type" value="profile">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic_info">
                            <input type="hidden" name="vpf_id" value="{{$vpf->id}}">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="input" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{$vpf->first_name}}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="input" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$vpf->last_name}}">
                            </div>
                            <div class="form-group">
                                <label for="user_id">Related User:</label>
                                <select name="user_id" class="form-control" style="width: 100%;">
                                    <!--email_off-->
                                    @foreach($users as $us)
                                        <option value="{{$us->id}}" {{($us->id == $vpf->user->id) ? 'selected' : ''}}>{{$us->email}}</option>
                                    @endforeach
                                    <!--/email_off-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="face_id">Face ID:</label>
                                <input type="input" class="form-control" id="face_id" name="face_id" placeholder="Face ID" value="{{$vpf->face_id}}">
                            </div>
                        </div>
                        <div class="tab-pane" id="unit_info">
                            <div class="form-group">
                                <label for="ranks">Ranks:</label>
                                <select name="rank_id" class="form-control" style="width: 100%;">
                                    @foreach($ranks as $rank)
                                        <option value="{{$rank->id}}" {{($rank->id == $vpf->rank->id) ? 'selected' : ''}}>{{$rank->abbreviation.' - '.$rank->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option {{($vpf->status == 'Active') ? 'selected' : ''}} value="Active">Active</option>
                                    <option {{($vpf->status == 'LOA') ? 'selected' : ''}} value="LOA">LOA</option>
                                    <option {{($vpf->status == 'Discharged') ? 'selected' : ''}} value="Discharged">Discharged</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Clearance Level:</label>
                                <select name="clearance" class="form-control" style="width: 100%;">
                                    <option {{($vpf->clearance == '33') ? 'selected' : ''}} value="33">No Clearance</option>
                                    <option {{($vpf->clearance == '34') ? 'selected' : ''}} value="34">Confidential Clearance</option>
                                    <option {{($vpf->clearance == '35') ? 'selected' : ''}} value="35">Secret Clearance</option>
                                    <option {{($vpf->clearance == '36') ? 'selected' : ''}} value="36">Top Secret Clearance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assignments">Assignments (that are available):</label>
                                <select name="assignment_id" class="form-control" style="width: 100%;">
                                    @foreach($assignments as $assignment)
                                        <option value="{{$assignment->id}}" {{($assignment->id == $vpf->assignment->id) ? 'selected' : ''}}>{{$assignment->id.' - '.$assignment->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


