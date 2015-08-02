<?$user = \Auth::user()?>

    <a href="{{route('inbox.create')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>
<hr>
    <div class="box box-solid">
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{route('inbox')}}"><i class="fa fa-inbox"></i> Inbox @include('frontend.my-inbox.unread-count')<span class="label label-primary pull-right">{{$user->threads->count()}}</span></a></li>
            </ul>
        </div><!-- /.box-body -->
    </div><!-- /. box -->