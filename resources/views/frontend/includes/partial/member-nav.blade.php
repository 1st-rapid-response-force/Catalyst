@if(\Auth::user())
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->vpf}}<span class="caret"></span></a>
        <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-folder-open"></i> Virtual Personnel File</a></li>
                <li><a href="#"><i class="fa fa-users"></i> My Squad</a></li>
                <li><a href="#"><i class="fa fa-inbox"></i> My Inbox</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> My Loadout</a></li>
                <li role="separator" class="divider"></li>
                @if(Auth::user()->hasRole(['officer','superadmin']))
                <li><a href="/admin/"><i class="fa fa-lock"></i> Officer Panel</a></li>
                @endif
            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </li>
@endif