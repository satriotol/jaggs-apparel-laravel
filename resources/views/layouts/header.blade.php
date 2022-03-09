<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>

        <div class="navbar-right ml-auto">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ asset('assets/img/user/user.png') }}" class="user-image" alt="User Image" />
                        <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="dropdown-header">
                            <img src="{{ asset('assets/img/user/user.png') }}" class="img-circle"
                                alt="User Image" />
                            <div class="d-inline-block">
                                {{ Auth::user()->name }} <small
                                    class="pt-1">{{ Auth::user()->email }}</small>
                            </div>
                        </li>
                        <li class="dropdown-footer">
                            <a href="{{ route('setting.index') }}"> <i class="mdi mdi-account"></i> Setting </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();"> <i class="mdi mdi-logout"></i> Log Out </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


</header>
