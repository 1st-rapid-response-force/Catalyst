@extends('layout.main_layout')

@section('title','Promotions')

@section('sub-title','Manager')

@section('scripts-css-header')
    <!-- DATA TABLES -->
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Promotions</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>The following members have met the criteria set for a promotion.</p>
            <ul>
                <li><strong>Promote</strong> -  This option will notify the user of his/her promotion and update all relevant files to reflect the promotion.</li>
                <li><strong>Decline Promotion</strong> - This option will notify the user that his/her promotion was declined. The users Time in Grade will reset and will recycle through the promotion cycle.</li>
            </ul>
            <hr>
            <br>
            <table id="promotions" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Next Rank</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Captain</td>
                    <td>Guillermo Rodriguez</td>
                    <td>Major</td>
                    <td><a class="btn btn-success" href="#">Promote</a> <a class="btn btn-danger" href="#">Decline Promotion</a></td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
    <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $("#promotions").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
    <!-- Data Tables SCRIPT -->
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection


