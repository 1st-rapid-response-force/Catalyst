@if(\Auth::user())
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </li>
@endif