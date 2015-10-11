
@extends('frontend.layouts.master')

@section('title', 'My Squad')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">My Squad</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Squad - {{$user->vpf}} - {{$user->vpf->assignment->group->name}}</h1>
        <p>Your Squad is your comrades in arms, you will train, deploy, and fight together.</p>
        <div class="row">
            <div class="col-lg-3">
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Squad Members</h4></div>
                    <div class="panel-body">
                        @foreach($user->vpf->assignment->group->members as $member)
                            <div class="media">
                                <div class="media-left">
                                    <a href="/roster/1">
                                        <img class="media-object img-circle" style="max-height: 30px; max-width: 30px;" src="/avatar/{{$member->user->steam_id}}" alt="Avatar">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="/roster/{{$member->user->id}}">{{$member}}</a></h5>
                                    <small>{{$member->assignment->name}}</small>
                                    <br>
                                    @if($member->hasReportedIn())
                                    <span class="label label-success">Reported in</span>
                                    @else
                                    <span class="label label-danger">Pending Report in</span>
                                    @endif
                                    @if($member->onCall())
                                        <span class="label label-primary">On-Call - {{$member->oncall_type}}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Unit Announcements</h4></div>
                    <div class="panel-body">
                        @if($unitAnnouncements->count() > 0)
                            @foreach($unitAnnouncements as $announcement)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="/roster/1">
                                            <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="/avatar/{{$announcement->creator->user->steam_id}}" alt="Avatar">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$announcement->creator}} - <small>{{$announcement->creator->assignment->name}}</small></h4>
                                        <p>{!! $announcement->short_message !!}</p>
                                        <p><a href="{{route('squad.announcement.view',$announcement->id)}}" class="btn btn-xs btn-primary pull-right">Read More</a></p>
                                        <div class="text-muted"><small>Posted {!! $announcement->created_at->diffForHumans() !!} {{($announcement->created_at != $announcement->updated_at) ? '| Edited '.$announcement->updated_at->diffForHumans() : ''}}</small></div>
                                    </div>
                                </div>
                            @endforeach

                        @else
                            <p>No announcements to display.</p>
                        @endif
                    </div>
                </div>
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Squad Announcements</h4></div>
                    <div class="panel-body">
                        @if($user->vpf->assignment->group->announcements->count() > 0)
                            @foreach($user->vpf->assignment->group->announcements->sortByDesc('created_at')->take(2) as $announcement)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="/roster/1">
                                            <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="/avatar/{{$announcement->creator->user->steam_id}}" alt="Avatar">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$announcement->creator}}</h4>
                                        <p>{!! $announcement->message !!}</p>
                                        @if($user->id == $announcement->creator->id)
                                        <small><a href="{{route('squad.announcement.edit',$announcement->id)}}">Edit Message</a></small>
                                        @endif
                                        <div class="text-muted"><small>Posted {!! $announcement->created_at->diffForHumans() !!} {{($announcement->created_at != $announcement->updated_at) ? '| Edited '.$announcement->updated_at->diffForHumans() : ''}}</small></div>
                                    </div>
                                </div>
                            @endforeach
                            <p class="pull-right"><a href="{{route('squad.announcement.index')}}">View all Squad Announcements</a></p>
                        @else
                            <p>No announcements to display.</p>
                        @endif
                    </div>
                    <div class="panel-footer"><small>Theses Announcements are posted by a member with NCO Role or Above</small></div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Options</h4></div>
                    <div class="panel-body">
                        @if(Auth::user()->hasRole(['nco','officer','superadmin']))
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#squadadd">Add Squad Announcement</button>
                        @endif
                        <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#oncall">Request On Call Assistance</button>
                        @if(!$user->vpf->hasReportedIn())
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#reportin">Report in</button>
                        @endif
                        @if(!$user->vpf->onCall())
                        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#callin">Setup On Call</button>
                        @else
                        <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#callin">Disable On Call</button>
                        @endif

                    </div>
                </div>
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Report In Status</h4></div>
                    <p>Per current report in period</p>
                    <div class="panel-body">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$user->vpf->assignment->group->squad_report_percentage()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$user->vpf->assignment->group->squad_report_percentage()}}%;">
                                {{$user->vpf->assignment->group->squad_report_percentage()}}%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Squad Chatterbox - <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#chatteradd">Reply</button></h3>
                @if($chatter->count() > 0)
                    @foreach($chatter as $message)
                    <div class="well well-sm">
                        <div class="media">
                            <div class="media-left">
                                <a href="/roster/1">
                                    <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="/avatar/{{$message->creator->user->steam_id}}" alt="Avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$message->creator}}</h4>
                                <p>{!! $message->message !!}</p>
                                <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!} {{($message->created_at != $message->updated_at) ? '| Edited '.$message->updated_at->diffForHumans() : ''}}</small></div>
                                @if($user->id == $message->creator->id)
                                    <small><a href="{{route('squad.chatter.edit',$message->id)}}">Edit Message</a></small>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                <div class="text-center">
                    {!! $chatter->render() !!}
                </div>
                @else
                    <p>No Squad Chatter to display.</p>
                @endif
                        <!-- Button trigger modal -->



            </div>
        </div>

    </div>
@endsection

@section('js-bottom')
        <!-- Modal -->
    <div class="modal fade" id="chatteradd" tabindex="-1" role="dialog" aria-labelledby="chatteraddlabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="chatteraddlabel">Add to Squad Chatter</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('squad.chatter.create')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <textarea class="form-control" name="chatter" rows="10" placeholder="Your Chatter Comment" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="squadadd" tabindex="-1" role="dialog" aria-labelledby="squadaddlabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="squadaddlabel">Add a Squad Announcement</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('squad.announcement.create')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" rows="10" placeholder="Squad Announcements" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reportin" tabindex="-1" role="dialog" aria-labelledby="reportin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="reportinlabel">Report in</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('squad.reportin.create')}}" method="POST">
                        {!! csrf_field() !!}
                        <p>By submitting this form you are reporting into the unit. You will need to report in on a weekly basis in order to maintain an active status.</p>
                        <p>Failure to report will result in negative action against you. </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(!$user->vpf->onCall())
    <!-- Modal -->
    <div class="modal fade" id="callin" tabindex="-1" role="dialog" aria-labelledby="callin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="callinlabel">Setup - On Call</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('squad.oncall.create')}}" method="POST">
                        {!! csrf_field() !!}
                        <p>The on call system allows for troops in the deployment environment to get in contact with you in case of MEDEVAC, logistics, and command assistance/guidance. This system will send you a message to your
                        phone number, email, and teamspeak message. When troops require your assistance. (Abuse of this system by anyone will result in immediate disciplinary acton.</p>
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>On Call Type:</label>
                                <select class="form-control" name="oncall_type">
                                    <option value="MEDEVAC">MEDEVAC</option>
                                    <option value="LOGISTICS">Logistics</option>
                                    <option value="TRANSPORT">Transport</option>
                                    <option value="CAS">Close Air Support</option>
                                    <option value="COMMAND">Command</option>
                                    <option value="ATC">Air Traffic Control</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>On Call Number:</label>
                                <input class="form-control" id="phone" name="oncall_phone" placeholder="+14155555555">
                                <small>Number must be in <a href="https://en.wikipedia.org/wiki/E.164">E164 format</a>, <strong>if you leave this field blank your only your Teamspeak will be contacted.</strong></small>
                            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- Modal -->
    <div class="modal fade" id="callin" tabindex="-1" role="dialog" aria-labelledby="callin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="callinlabel">Setup - On Call</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('squad.oncall.disable')}}" method="POST">
                        {!! csrf_field() !!}
                        <p>This allows you to disable your status on the call system. Upon removing yourself from on call system your phone will be removed from our systems and you will not be contacted for an on-call requests.</p>
                        {!! csrf_field() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="oncall" tabindex="-1" role="dialog" aria-labelledby="oncall">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="oncalllabel">Request On Call Assistance</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('squad.oncall.request')}}" method="POST">
                        {!! csrf_field() !!}
                        <p>The on call system will allow you to contact any on-call members for a specific assistance type. If none are available for a specific category you will be unable to select that category.
                            If no one is on call you will be unable to submit this form. (Abuse of this system by anyone will result in immediate disciplinary acton.</p>
                        {!! csrf_field() !!}
                        @if($oncallCat->count() > 0)
                        <div class="form-group">
                            <label>On Call Type:</label>
                            <select class="form-control" name="oncall_type" required>
                                @foreach($oncallCat as $cat)
                                    <option value="{{$cat['type']}}">{{$cat['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>GRID LOCATION:</label>
                            <input type="text" class="form-control" id="grid" name="grid" placeholder="1054 2015 (8 digit grid)" required>
                        </div>
                        <div class="form-group">
                            <label>CALLSIGN / FREQ:</label>
                            <input type="text" class="form-control" id="callsign" name="callsign" placeholder="ODIN 6 - CH 50" required>
                        </div>
                        <div class="form-group">
                            <label>URGENCY:</label>
                            <select class="form-control" name="urgency" required>
                                <option value="A">URGENT</option>
                                <option value="B">URGENT-SECONDARY</option>
                                <option value="C">PRIORITY</option>
                                <option value="D">ROUTINE</option>
                                <option value="E">CONVENIENCE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SECURITY:</label>
                            <select class="form-control" name="enemy_sit" required>
                                <option value="N">NO ENEMY TROOPS</option>
                                <option value="P">POSSIBLE ENEMY</option>
                                <option value="E">ENEMY TROOPS (CAUTION)</option>
                                <option value="X">ENEMY TROOPS (ARMED ESCORT)</option>
                                <option value="NA">NOT APPLICABLE</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <textarea class="form-control" id="other" name="other" rows="5" placeholder="Short message regarding request (not required)"></textarea>
                            </div>
                            @else
                            <p><strong>No Members are currently ON CALL</strong></p>
                            @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    @if($oncallCat->count() > 0)
                    <input type="submit" class="btn btn-success">
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
