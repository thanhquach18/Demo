<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}">Admin</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{ route('website.index') }}" target="_blade"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ auth()->user()->name }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{ route('user.change.password') }}">
                        <i class="fa fa-gear fa-fw"></i> 
                        Change password
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout.get') }}">
                        <i class="fa fa-sign-out fa-fw"></i> 
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav in" id="side-menu">
                <li>
                    <a href="{{ route('blog.index') }}">
                        <i class="fa fa-book fa-fw"></i> Quản lý bài viêt
                    </a>
                </li>
              
            </ul>
        </div>
    </div>
</nav>