@extends('frontend.my-inbox.layouts.home')

@section('css-top-mail')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">Mailbox</li>
    </ol>
@endsection

@section('sidebar-mail')
@endsection

@section('content-mail')
    {!! Form::open(['route' => ['inbox.removeThreads']]) !!}
        <div class="box box-primary">
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <div class="btn-group">
                        <a href="{{route('inbox.create')}}" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o "></i></a>
                        <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
                    </div><!-- /.btn-group -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td></td>
                            <td class="mailbox-name">Creator</td>
                            <td class="mailbox-subject">Subject</td>
                            <td class="mailbox-date">Last Response</td>
                        </tr>
                        <tbody>
                        @if($threads->count() > 0)
                        @foreach($threads as $thread)
                            <tr class="{{($thread->isUnread($user->id) == true) ? 'info' : ''}}">
                                <td><input type="checkbox" name="delete[{{$thread->id}}]" value="{{$thread->id}}"/></td>
                                <td class="mailbox-name"><img class="img-circle" style="max-height: 30px; max-width: 30px;" src="{{$thread->creator()->vpf->avatar}}">  <a href="{{route('inbox.show',$thread->id)}}">{{$thread->creator()->vpf}}</a></td>
                                <td class="mailbox-subject">{{$thread->subject}}</td>
                                <td class="mailbox-date">{{$thread->latestMessage->user->vpf}}<br> {{$thread->latestMessage->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                            @else
                            <tr>
                                <td class="mailbox-name">No Messages Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table><!-- /.table -->
                    {!! Form::close() !!}
                    <div class="text-center">
                        {!! $threads->render() !!}
                    </div>
                </div><!-- /.mail-box-messages -->
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div>

@endsection

@section('js-bottom-mail')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
@endsection
