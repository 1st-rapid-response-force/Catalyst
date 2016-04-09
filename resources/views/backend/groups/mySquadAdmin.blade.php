
@extends('frontend.layouts.master')

@section('title', 'My Squad')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.groups.index')}}"><i class="fa fa fa-users"></i> Group Manager</li></a>
        <li class="active"><i class="fa fa fa-users"></i> My Squad - ADMIN</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Squad - ADMIN - {{$group->name}}</h1>
        <p>Your Squad is your comrades in arms, you will train, deploy, and fight together.</p>
        <div class="row">
            <div class="col-lg-3">
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Squad Members</h4></div>
                    <div class="panel-body">
                        @if(count($group->members) == 0)
                        No members in this group
                        @endif
                        @foreach($group->members as $member)
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
                                            <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="/frontend/images/avatars/members/{{$announcement->creator->user->steam_id}}.png" alt="Avatar">
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
                        @if($group->announcements->count() > 0)
                            @foreach($group->announcements->sortByDesc('created_at')->take(2) as $announcement)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="/roster/1">
                                            <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="/frontend/images/avatars/members/{{$announcement->creator->user->steam_id}}.png" alt="Avatar">
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

                    </div>
                </div>
                @if(count($group->members) != 0)
                <div class="well well-sm">
                    <div class="panel-heading"><h4>Report In Status</h4></div>
                    <p>Per current report in period</p>
                    <div class="panel-body">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$group->squad_report_percentage()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$group->squad_report_percentage()}}%;">
                                {{$group->squad_report_percentage()}}%
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
                                    <img class="media-object img-circle" style="max-height: 50px; max-width: 50px;" src="/frontend/images/avatars/members/{{$message->creator->user->steam_id}}.png" alt="Avatar">
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
                    <form action="{{route('admin.groups.chatter.create',$group->id)}}" method="POST">
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
                    <form action="{{route('admin.groups.squadannouce.create',$group->id)}}" method="POST">
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
@endsection
