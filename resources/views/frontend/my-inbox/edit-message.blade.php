@extends('frontend.my-inbox.layouts.inbox')

@section('css-top-mail')
    <style>
        ul.token-input-list-facebook
        {
            width:100%;
        }
    </style>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('inbox')}}">Inbox</a></li>
        <li class="active">Editing Message</li>
    </ol>
@endsection

@section('sidebar-mail')
    <h3>Participants</h3>
    @foreach($thread->participants as $par)
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object img-circle"  src="/frontend/images/avatars/members/{{$par->user->steam_id}}.png" style="max-height: 40px; max-width: 40px;">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$par->user->vpf}}</h4>
            </div>
        </div>
    @endforeach
    <br>
    {!! Form::open(['route' => ['inbox.update', $thread->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <input type="text" id="autocomplete" name="recipents" />
    </div>
    <div class="form-group">
        <input type="hidden" name="action" value="addUsers">
        <input type="submit" class="btn btn-xs btn-success" value="Add Participants">
    </div>
    {!! Form::close() !!}
    <hr>

@endsection

@section('content-mail')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Inbox</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">
                <h1>{!! $thread->subject !!}</h1>
                <h2>Edit Message</h2>
                {!! Form::open(['route' => ['inbox.edit.message.update', $message->id], 'method' => 'PUT']) !!}
                <input type="hidden" name="action" value="AddReply">
                <!-- Message Form Input -->
                <div class="form-group">
                    <textarea name="body" class="form-control">
                        {!! $message->body !!}
                    </textarea>
                </div>
                <!-- Submit Form Input -->
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div><!-- /.mail-box-messages -->
        </div><!-- /.box-body -->
        <div class="box-footer no-padding">
            <div class="btn-group">
                {!! Form::open(['route' => ['inbox.removeThreads']]) !!}
                <input type="hidden" value="{{$thread->id}}" name="delete">
                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                {!! Form::close() !!}
            </div><!-- /.btn-group -->
        </div>
    </div><!-- /. box -->
@endsection

@section('js-bottom-mail')
    <script type="text/javascript" src="/plugins/tokeninput/src/jquery.tokeninput.js"></script>
    <script type="text/javascript" src="/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'body');
            $("#autocomplete").tokenInput("/autocomplete/users", {
                theme: "facebook"
            });
            $("ul.token-input-list-facebook").css({"width":"100%"});
        });
    </script>
    <link href="/plugins/tokeninput/styles/token-input-facebook.css" rel="stylesheet" type="text/css" />
@endsection

