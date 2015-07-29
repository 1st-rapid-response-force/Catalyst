<?$user = \Auth::user()?>

    <a href="{{route('inbox.create')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools">
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">{{$user->threads->count()}}</span></a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
            </ul>
        </div><!-- /.box-body -->
    </div><!-- /. box -->