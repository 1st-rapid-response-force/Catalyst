@extends('backend.layout.main_layout')
@section('title','Prism')

@section('sub-title','Inbox')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.prism.index')}}"> <i class="fa fa-eye"></i> PRISM</li></a>
    <li class="active"> Show Thread</li>
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
        <h1>{!! $thread->subject !!}</h1>

        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="/avatar/{{$message->user->steam_id}}" alt="{!! $message->user->name !!}" style="max-width: 100px; max-height: 100px;" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">{!! $message->user->vpf !!}</h5>
                    <p>{!! \Crypt::decrypt($message->body) !!}</p>
                    <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!} {{($message->created_at != $message->updated_at) ? '| Edited '.$message->updated_at->diffForHumans() : ''}}</small></div>
                </div>
            </div>
            <hr>
        @endforeach
        <a href="{{route('admin.prism.index')}}" class="btn btn-primary">Return to PRISM Inbox</a>
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


