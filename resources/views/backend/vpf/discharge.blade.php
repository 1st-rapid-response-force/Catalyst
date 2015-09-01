@extends('backend.layout.main_layout')


@section('title','Discharge Member')

@section('sub-title','')

@section('scripts-css-header')
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Discharge {{$vpf}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Using this interface you can discharge a member in the unit. <br><br> <strong>NOTE: This is an administrative discharge, if a member has filed a form use the Form Manager instead!</strong></p>
            <p>The following actions will occur</p>
            <ul>
                <li>A service history entry will be added</li>
                <li>Discharge form will be auto-generated</li>
                <li>Member ranks will be set to Civilian and permissions will be revoked by system</li>
                <li>Teamspeak clearance will be revoked</li>
                <li>Incase you simply need to modify the assignment can bypass the reassignment interface by simply modifying assignment in the profile editor</li>
            </ul>
            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Discharge Type</label>
                    <select class="form-control" name="discharge_type">
                        <option>General Discharge</option>
                        <option>Honorable Discharge</option>
                        <option>Dishonorable Discharge</option>
                        <option>Bad Conduct Discharge</option>
                        <option>Administrative Discharge</option>
                    </select>
                    <label>Reason for Discharge (autofilled)</label>
                    <textarea name="discharge_text" class="form-control" readonly> Discharge form was filed on behalf of member</textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Discharge User</button>
                </div>

            </form>


        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

@section('page-script')
@endsection

@section('page-script-include')
@endsection


