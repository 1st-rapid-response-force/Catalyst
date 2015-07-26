@extends('layout.main_layout')

@section('title','Operations')

@section('sub-title','Manager')

@section('scripts-css-header')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="/js/rails.js" type="text/javascript"></script>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('operations') !!}
@endsection


@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Operations</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Operations Manager allows easy operations management from Catalyst.</p>
            <h4>Administrative Options</h4>
            <p><a class="btn btn-success" href="/admin/operations/create">New Operation</a></p>
            <hr>
            <br>
            @if (count($operations) != 0)
            <table id="operations" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Operation Name</th>
                    <th>Operation Date</th>
                    @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                    <th>Promotion Points</th>
                    @endif
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($operations as $operation)
                    <tr>
                        <td>{{$operation->name}}</td>
                        <td>{{ date('F j, Y, g:i a', strtotime($operation->date)) }}</td>
                        @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                            <td>{{$operation->promotionPoints}}</td>
                        @endif
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.operations.show',array($operation->id))}}">View</a>
                            <a class="btn btn-success" href="{{ route('admin.operations.edit',array($operation->id)) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('admin.operations.destroy',array($operation->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>There is no Operations in the database, add one by using the Administrator tools.</p>
            @endif
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
        <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $("#operations").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('modal')
@endsection


