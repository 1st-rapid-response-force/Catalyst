@extends('backend.layout.main_layout')
@section('title','Forms')

@section('sub-title','Manager')

@section('scripts-css-header')
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-list"></i> Forms Manager</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Forms Manager</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="pull-left" style="margin-bottom:10px">
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Forms <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('admin.forms.index')}}">Forms requiring attention</a></li>
                    <li><a href="{{route('admin.forms.all')}}">All Forms</a></li>
                </ul>
            </div>
        </div>

        <div class="clearfix"></div>
        <p>This shows all forms that are currently need review.</p>
        <table class="table table-striped table-bordered table-hover" id="user">
            <thead>
            <tr>
                <th>Form Type</th>
                <th>Filed By</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($forms as $form)
                <tr>
                    <td>{!! $form->form_name !!}</td>
                    <td>{!! $form->VPF !!}</td>
                    <td>{!! $form->updated_at->toFormattedDateString() !!}</td>
                    <td><a href="{{route('admin.forms.edit',array($form->VPF->id,$form->form_type,$form->id))}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        <a href="{{ route('admin.forms.destroy',array($form->form_type,$form->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable({
                "iDisplayLength" : 50,
                "order": [[2, "desc"]]
            });
        });
    </script>
@endsection


