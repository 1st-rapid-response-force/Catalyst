@extends('frontend.my-inbox.layouts.inbox')

@section('title','My Inbox')

@section('css-top-mail')
        <!-- Select2 -->
<link href="/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
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
                {!! Form::label('autocomplete','Users') !!}
                {!! Form::select('autocomplete[]', [], null, ['class' => 'form-control', 'id' => 'names', 'multiple']) !!}
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
    <script type="text/javascript" src="/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'message');
        });

        $('#names').select2({
            placeholder: 'Search 1RRF Members',
            minimumInputLength: 3,
            ajax: {
                url: '/autocomplete/vpf',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                results: function (data, page) {
                    return {results: data};
                }
            },

        });
    </script>

@endsection
