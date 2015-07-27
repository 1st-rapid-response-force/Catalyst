<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/backend/img/user.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>CPT. Rodriguez.G</p>
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
                    <i class="fa fa-sitemap"></i> <span>Unit Structure</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="/admin/organization-structure"><i class="fa fa-list"></i> <span>Organization Structure</span></a></li>
                    <li> <a href="/admin/ranks"><i class="fa fa-pause"></i> <span>Ranks</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>General MILPAC</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="/admin/awards"><i class="fa fa-trophy"></i> <span>Awards</span></a></li>
                    <li> <a href="/admin/qualifications"><i class="fa fa-check-square-o"></i> <span>Qualifications</span></a></li>
                    <li> <a href="/admin/ribbons"><i class="fa fa-align-justify"></i> <span>Ribbons</span></a></li>
                    <li> <a href="/admin/operations"><i class="fa fa-calendar"></i> <span>Operations</span></a></li>
                    <li> <a href="/admin/training-school"><i class="fa fa-university"></i> <span>Training & Schools</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-server"></i> <span>Server Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="/admin/teamspeak"><i class="fa fa-volume-up"></i> <span>Teamspeak Management</span></a></li>
                    <li> <a href="/admin/game-servers"><i class="fa fa-gamepad"></i> <span>Game Server Management</span></a></li>
                    <li> <a href="/admin/forum-management"><i class="fa fa-quote-right"></i> <span>Forum Management</span></a></li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>