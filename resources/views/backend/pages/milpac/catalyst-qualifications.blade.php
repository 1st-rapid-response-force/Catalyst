@extends('layout.main_layout')

@section('title','Qualifications')

@section('sub-title','Manager')

@section('scripts-css-header')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="/js/rails.js" type="text/javascript"></script>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('qualifications') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Qualifications</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>The following are the qualifications that have been set up in the unit.</p>
            <h4>Administrative Options</h4>
            <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#newQualifications">New Ribbon</button>
            </p>
            <hr>
            <br>
            @if (count($qualifications) != 0)
                <table id="qualification" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                            <th>Promotion Points</th>
                        @endif
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($qualifications as $qualification)
                        <tr>
                            <td><img src="{{$qualification->public_image}}"></td>
                            <td>{{$qualification->name}}</td>
                            <td>{{$qualification->description}}</td>
                            @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                                <td>{{$qualification->promotionPoints}}</td>
                            @endif
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.qualifications.edit',array($qualification->id)) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('admin.qualifications.destroy',array($qualification->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>There is no Qualifications in the database, add one by using the Administrator tools.</p>
            @endif
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
        <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $("#qualification").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('modal')
        <!-- Modal -->
<div class="modal fade" id="newQualifications" tabindex="-1" role="dialog" aria-labelledby="newQualificationsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="newQualificationsModal">New Qualification</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name of Qualification">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description: &nbsp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Brief Description">
                        </div>
                    </div>
                    @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Promotions Points: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="promotionPoints" name="promotionPoints" placeholder="Promotion Points Awarded for Qualification">
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="img" class="col-sm-2 control-label">Image: &nbsp</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

