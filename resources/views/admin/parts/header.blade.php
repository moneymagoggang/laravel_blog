<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item d-block">
                @if( session()->get('theme') !== null && session()->get('theme') === 'dark')
                    <a class="nav-link nav-link-style js-change-theme"><i class="ficon" data-feather="sun"></i></a>
                @else
                    <a class="nav-link nav-link-style js-change-theme"><i class="ficon" data-feather="moon"></i></a>
                @endif
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-flex header-setting">
                        <i data-feather='settings'></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"
                     onclick="event.preventDefault();document.getElementById('logout-admin-form').submit();">
                    <a class="dropdown-item" href="javascript:void('Logout')">
                        <i class="mr-50" data-feather="power"></i> Logout
                    </a>
                    <form id="logout-admin-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
