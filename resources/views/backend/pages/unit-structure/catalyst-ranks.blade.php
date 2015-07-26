@extends('layout.main_layout')

@section('title','Ranks')

@section('sub-title','Manager')

@section('scripts-css-header')
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Ranks</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>The following are the ranks that have been set up in the unit.</p>
            <hr>
            <br>
            <table id="ranks" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Next Rank</th>
                    <th>Weight</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Placeholder</td>
                    <td>Private</td>
                    <td>Private First Class</td>
                    <td>1</td>
                    <td><a class="btn btn-success" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


