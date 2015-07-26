@extends('layout.main_layout')

@section('title','Applications')

@section('sub-title','Manager')

@section('scripts-css-header')
    <!-- DATA TABLES -->
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Applications</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>The applications module tracks all applications to the unit. It seperates applications into three categories depending on the status of the application. Members who's applications are approved are removed from this section and moved to the members section</p>
            <ul>
                <li><strong>New Applications</strong> - Are applications that have not been initially processed (VAC Ban checks, Toxicity Check, etc)</li>
                <li><strong>In Progress</strong> - Are applications that have passed the initial screening process, they are awaiting final approval by the correct authority</li>
                <li><strong>Dropped</strong> - Applicants that did not make the cut.</li>
            </ul>
            <p>Applicants can keep track of their application by accessing Catalyst with their login credentials</p>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#new" aria-controls="active" role="tab" data-toggle="tab">New Applications</a></li>
                <li role="presentation"><a href="#in_progress" aria-controls="in_progress" role="tab" data-toggle="tab">In Progress</a></li>
                <li role="presentation"><a href="#dropped" aria-controls="dropped" role="tab" data-toggle="tab">Dropped</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="new">
                    <br>
                    <table id="new_applicants" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Application Date</th>
                            <th>Application Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Guillermo Rodriguez</td>
                            <td>Oct 22nd, 2015</td>
                            <td>New Application</td>
                            <td><a class="btn btn-success" href="#">Edit</a> <a class="btn btn-danger" href="#">Remove</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="in_progress">
                    <br>
                    <table id="in_progress_applicants" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Application Date</th>
                            <th>Application Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Guillermo Rodriguez</td>
                            <td>Oct 22nd, 2015</td>
                            <td>In Progress</td>
                            <td><a class="btn btn-success" href="#">Edit</a> <a class="btn btn-danger" href="#">Remove</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="dropped">
                    <br>
                    <table id="dropped_applicants" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Application Date</th>
                            <th>Application Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Guillermo Rodriguez</td>
                            <td>Oct 22nd, 2015</td>
                            <td>Dropped</td>
                            <td><a class="btn btn-success" href="#">Edit</a> <a class="btn btn-danger" href="#">Remove</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
    <script type="text/javascript">
        $(function () {
            $("#new_applicants").DataTable();
            $("#in_progress_applicants").DataTable();
            $("#dropped_applicants").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
    <!-- Data Tables SCRIPT -->
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection


