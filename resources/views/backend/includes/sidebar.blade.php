<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/frontend/images/avatars/members/{{\Auth::User()->vpf->avatar}}.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{\Auth::User()->vpf}}</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">ADMIN NAVIGATION</li>
            <li> <a href="/admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="{{route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Members Management</span></a></li>
                    <li> <a href="{{route('admin.enlistments.index')}}"><i class="fa fa-folder"></i> <span>Enlistment Manager</span></a></li>
                    <li> <a href="/admin/promotions"><i class="fa fa-child"></i> <span>Promotions</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span>Unit Manager</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="{{route('admin.announcements.index')}}"><i class="fa fa-newspaper-o"></i> <span>Announcements Manager</span></a></li>
                    <li> <a href="{{route('admin.assignments.index')}}"><i class="fa fa-list"></i> <span>Assignments Manager</span></a></li>
                    <li> <a href="{{route('admin.groups.index')}}"><i class="fa fa-users"></i> <span>Groups Manager</span></a></li>
                    <li> <a href="{{route('admin.perstat.index')}}"><i class="fa fa-line-chart"></i> <span>PERSTAT Manager</span></a></li>
                    <li> <a href="{{route('admin.oncall.index')}}"><i class="fa fa-phone-square"></i> <span>On Call Manager</span></a></li>
                    <li> <a href="{{route('admin.prism.index')}}"><i class="fa fa-eye"></i> <span>Prism Inbox</span></a></li>
                    <li> <a href="/admin/ranks"><i class="fa fa-pause"></i> <span>Ranks</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Virtual Personnel File</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="{{route('admin.vpf.index')}}"><i class="fa fa-file"></i> <span>Virtual Personnel File</span></a></li>
                    <li> <a href="{{route('admin.forms.index')}}"><i class="fa fa-archive"></i> <span>Forms Manager</span></a></li>
                    <li> <a href="{{route('admin.qualifications.index')}}"><i class="fa fa-check-square-o"></i> <span>Qualifications</span></a></li>
                    <li> <a href="{{route('admin.ribbons.index')}}"><i class="fa fa-align-justify"></i> <span>Ribbons</span></a></li>
                    <li> <a href="{{route('admin.operations.index')}}"><i class="fa fa-calendar"></i> <span>Operations</span></a></li>
                    <li> <a href="{{route('admin.schools.index')}}"><i class="fa fa-university"></i> <span>Schools</span></a></li>
                    <li> <a href="{{route('admin.loadouts.index')}}"><i class="fa fa-file-text"></i> <span>Loadout Items</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-server"></i> <span>Server Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="{{route('admin.teamspeak.index')}}"><i class="fa fa-volume-up"></i> <span>Teamspeak Management</span></a></li>
                    <li> <a href="/admin/game-servers"><i class="fa fa-gamepad"></i> <span>Game Server Management</span></a></li>
                    <li> <a href="{{route('admin.infil.index')}}"><i class="fa fa-gamepad"></i> <span>Infil - Launcher Annoucements</span></a></li>
                </ul>
            </li>
            <li> <a href="/admin/log-viewer"><i class="fa fa-cogs"></i> <span>Log Viewer</span></a></li>
    </section>
    <!-- /.sidebar -->
</aside>