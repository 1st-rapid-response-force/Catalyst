@extends('backend.layout.main_layout')
@section('title','Prism')

@section('sub-title','Inbox')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-eye"></i> PRISM</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">PRISM Inbox</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>Read only collection of all messages (this recovers all even if they were deleted) sent through unit channels.</p>
            <table class="table table-hover table-striped" id="user">
                <thead>
                <tr>
                    <th></th>
                    <th class="mailbox-name">Creator</th>
                    <th class="mailbox-subject">Subject</th>
                    <th>Last Response</th>
                </tr>
                </thead>
                <tbody>
                @if($threads->count() > 0)
                    @foreach($threads as $thread)
                        <tr>
                            <td>{{$thread->id}}</td>
                            <td class="mailbox-name"><img class="img-circle" style="max-height: 30px; max-width: 30px;" src="/avatar/{{$thread->creator()->steam_id}}">  <a href="{{route('admin.prism.show',$thread->id)}}">{{$thread->creator()->vpf}}</a></td>
                            <td class="mailbox-subject">{{$thread->subject}}</td>
                            <td class="mailbox-date">{{$thread->latestMessage->user->vpf}}<br> {{$thread->latestMessage->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No Messages Found</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table><!-- /.table -->
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable({
                "iDisplayLength" : 25,
                "order": [[0, "desc"]]
            });
        });
    </script>

@endsection


