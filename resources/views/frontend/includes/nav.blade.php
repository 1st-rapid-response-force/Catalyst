<!-- Navigation -->
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="/frontend/images/logo.png" alt="">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Active::pattern('/')}}">
                    <a href="/" >Home</a>
                </li>
                <li class="{{ Active::pattern('about')}}">
                    <a href="/about">About</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servers<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Active::pattern('/servers')}}"><a href="/servers">Server List</a></li>
                        <li class="{{ Active::pattern('/modpack')}}"><a href="/modpack">Modpack</a></li>
                    </ul>
                </li>

                <li class="{{ Active::pattern('structure-assignments')}}">
                    <a href="/structure-assignments">Structure and Assignments</a>
                </li>
                @if(Auth::user())
                    @if(is_null(Auth::user()->application_id))
                        <li class="{{ Active::pattern('enlistment')}}">
                            <a href="/enlistment">Enlistment</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enlistment<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Active::pattern('enlistment/*')}}"><a href="/enlistment/my-application">My Application</a></li>
                            </ul>
                        </li>
                    @endif
                @endif
                <li class="{{ Active::pattern('faq')}}">
                    <a href="/faq">FAQ</a>
                </li>
                <li class="{{ Active::pattern('contact-us')}}">
                    <a href="/contact-us">Contact</a>
                </li>
                @if(Auth::user())
                    @if(Auth::user()->hasRole('user'))
                        @include('frontend.includes.partial.applicant-nav')
                    @elseif(Auth::user()->hasRole(['member','nco','officer','superadmin']))
                        @include('frontend.includes.partial.member-nav')
                    @endif
                @else
                    <li class="{{ Active::pattern('login')}}">
                        <a href="/login"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>