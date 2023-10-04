<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <img src="{{ Vite::image('logo/logo-small.svg') }}" alt="{{ config('app.name', 'Laravel') }}">
          </span>
                    <h2 class="brand-text">{{ config('app.name') }}</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard.index' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard.index') }}">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>
            </li>

            <li class=" navigation-header">
                <span data-i18n="Lists &amp; Tables">Lists &amp; Tables</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.posts.index' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.posts.index') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Listings">Users</span></a>
            </li>
        </ul>
    </div>
</div>
