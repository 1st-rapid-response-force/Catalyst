@extends('frontend.layouts.master')

@section('css-top')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6">
            <h1>{!! $thread->subject !!}</h1>

            @foreach($thread->messages as $message)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->name !!}" class="img-circle">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{!! $message->user->name !!}</h5>
                        <p>{!! $message->body !!}</p>
                        <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                    </div>
                </div>
            @endforeach

            <h2>Add a new message</h2>
            {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                    <!-- Message Form Input -->
            <div class="form-group">
                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            </div>

            @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{!! $user->name !!}"><input type="checkbox" name="recipients[]" value="{!! $user->id !!}">{!! $user->name !!}</label>
                    @endforeach
                </div>
                @endif

                        <!-- Submit Form Input -->
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript">
        $(function () {
            $("#serviceHistoryTable").DataTable();
            $("#formHistoryTable").DataTable();
        });
    </script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection
