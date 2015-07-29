@extends('frontend.my-inbox.layouts.inbox')

@section('css-top-mail')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li><a href="{{route('inbox')}}">Inbox</a></li>
        <li class="active">Composing Message</li>
    </ol>
@endsection

@section('sidebar-mail')
@endsection

@section('content-mail')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Compose new message</h3>
            {!! Form::open(['route' => 'inbox.store']) !!}
                    <!-- Subject Form Input -->
            <div class="form-group">
                {!! Form::label('autocomplete', 'Recipients', ['class' => 'control-label']) !!}
                <input type="text" id="autocomplete" name="recipents" />
            </div>
            <div class="form-group">
                {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
                {!! Form::text('subject', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Submit Form Input -->
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        </div>
        {!! Form::close() !!}
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
    </div>
@endsection


@section('js-bottom-mail')
    <script type="text/javascript" src="/plugins/tokeninput/src/jquery.tokeninput.js"></script>
    <script type="text/javascript" src="/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'message');
            $("#autocomplete").tokenInput("/autocomplete/users", {
                theme: "facebook"
            });
        });
    </script>
    <link href="/plugins/tokeninput/styles/token-input-facebook.css" rel="stylesheet" type="text/css" />


@endsection
