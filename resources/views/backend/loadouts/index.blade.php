@extends('backend.layout.main_layout')

@section('title','Loadout Manager')

@section('sub-title','Admin')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Virtual Personnel File</li>
    <li class="active">Loadout Manager</li>
@endsection

@section('content')
<p>The following are the loadout items that have been set up in the unit.</p>
<h4>Administrative Options</h4>
<p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#newLoadout">New Loadout Item</button>
</p>
<hr>
<br>
@if (count($loadouts) != 0)
    @if (count($loadouts) != 0)
        <table id="table" class="table table-bordered table-hover" >
            <thead>
            <tr>
                <th>Image</th>
                <th>Category</th>
                <th>Name</th>
                <th>Required Qualification</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($loadouts as $loadout)
                <tr>
                    <td><img class="img-responsive" src="/images/{{$loadout->public_image}}/small" class="center-block"></td>
                    <td>{{$loadout->category}}</td>
                    <td>{{$loadout->name}}</td>
                    <td>{{$loadout->qualification->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.loadouts.edit',array($loadout->id)) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.loadouts.destroy',array($loadout->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no Loadouts in the database, add one by using the Administrator tools.</p>
    @endif
@endif
@endsection
@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#table").DataTable();
        });
    </script>
@endsection

@section('page-script-include')
        <!-- Modal -->
    <div class="modal fade" id="newLoadout" tabindex="-1" role="dialog" aria-labelledby="newLoadoutModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="newRibbonModal">New Loadout</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name of Loadout Item">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Category: &nbsp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category">
                                    <option value="primary">Primary Weapon</option>
                                    <option value="secondary">Secondary Weapon</option>
                                    <option value="launcher">Launcher Weapon</option>
                                    <option value="thrown">Thrown</option>
                                    <option value="uniform">Uniform</option>
                                    <option value="vest">Vest</option>
                                    <option value="backpack">Backpack</option>
                                    <option value="helmet">Helmet</option>
                                    <option value="goggles">Goggles Slot</option>
                                    <option value="nightvision">Nightvision Slot</option>
                                    <option value="binoculars">Binoculars Slot</option>
                                    <option value="primary_attachments">Primary Attachments</option>
                                    <option value="secondary_attachments">Secondary Attachments</option>
                                    <option value="launcher_attachments">Launcher Attachments</option>
                                    <option value="items">Items</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Empty Item: &nbsp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="empty">
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="class_name" class="col-sm-2 control-label">Classname: &nbsp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Class Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Required Qualification: &nbsp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="qualification_id">
                                    @foreach($qualifications as $qualification)
                                        <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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


