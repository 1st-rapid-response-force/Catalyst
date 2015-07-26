@extends('layout.main_layout')

@section('title','Training & Schools')

@section('sub-title','Manager')

@section('scripts-css-header')
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="/js/rails.js" type="text/javascript"></script>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('training') !!}
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training & Schools</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>The following are the Training and School that have been set up in the unit.</p>
            <h4>Administrative Options</h4>
            <p><a class="btn btn-success" href="{{route('admin.training-school.create')}}">New School/Training</a></p>
            <hr>
            <br>
            @if (count($schools) != 0)
            <table id="training" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>School Name</th>
                    <th>Promotion Points</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schools as $school)
                <tr>
                    <td>{{$school->name}}</td>
                    @if (\Setting::get('catalyst.enablePromotionPoints') == 'true')
                    <td>{{$school->promotionPoints}}</td>
                    @endif
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.training-school.show',array($school->id))}}">View</a>
                        <a class="btn btn-success" href="{{ route('admin.training-school.edit',array($school->id)) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.training-school.destroy',array($school->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>There is no Schools or Trainings in the database, add one by using the Administrator tools.</p>
            @endif
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
    <script type="text/javascript">
        $(function () {
            $("#training").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection


