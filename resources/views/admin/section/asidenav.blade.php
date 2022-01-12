<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <div class="page-brand">
            <a class="link" href="#">
                    <span class="brand"><h3>RaiCalendar</h3>
                    </span>
            </a>
        </div>
        <div class="flexbox flex-1">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                </li>
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <!--//<img src="" />-->
                        <span></span>RaiCalendar</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </div>
    </header>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
            <div class="admin-block d-flex">
                <div>
                    <!--<img src="" width="45px" />-->
                </div>
                <div class="admin-info">
                    <div class="font-strong">RaiCalendar</div>
                    <small>Admin</small></div>
            </div>
            <ul class="side-menu metismenu">
                <li>
                    <a class="active" href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="heading">FEATURES</li>
                <li>
                    <a href="{{url('ewes/fullcalender')}}" target="_blank"><i class="sidebar-item-icon fa fa-puzzle-piece"></i>
                        <span class="nav-label"> Calendar</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END SIDEBAR-->
