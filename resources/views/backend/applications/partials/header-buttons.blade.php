    <div class="pull-left" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Applications <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
              <li><a href="{{route('admin.applications.index')}}">View Under Review Applications</a></li>
            <li><a href="{{route('admin.applications.accepted')}}">View Accepted Applications</a></li>
              <li><a href="{{route('admin.applications.rejected')}}">View Rejected Applications</a></li>
          </ul>
        </div>
    </div>

    <div class="clearfix"></div>