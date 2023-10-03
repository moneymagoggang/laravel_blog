<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{ session()->get('theme') !== null && session()->get('theme') === 'dark' ? 'dark-layout' : '' }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MetaData -->
    <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ Vite::image('logo/logo-small.svg') }}"/>
    <meta name="description" content="{{ config('app.name', 'Laravel') . ' Admin Panel' }}">
    <!-- Scripts -->

    @vite(['resources/assets/js/app-admin.js'])
    @include('admin.parts.styles')
    @stack('styles')
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed" data-open="click"
      data-menu="vertical-menu-modern" data-col="">
@include('admin.parts.confirmation-form')
@include('admin.parts.header')
@include('admin.parts.sidebar')
<div class="app-content content" id="app">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@yield('page-title')</h2>
                        @yield('breadcrumbs')
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('admin.parts.footer')
@include('admin.parts.scripts')
@vite(['resources/assets/js/admin/dashboard.js'])
{{--<script src="{{ mix('assets/js/admin/dashboard.js') }}"></script>--}}
<script type="module">
    @if(Session::has('message'))
    window.notify("{{ session('message') }}")
    @endif

    @if(Session::has('error'))
    window.notify("{{ session('error') }}", 'error')
    @endif

    @if(Session::has('info'))
    window.notify("{{ session('info') }}", 'info')
    @endif

    @if(Session::has('warning'))
    window.notify("{{ session('warning') }}", 'warning')
    @endif
</script>
@stack('scripts')
</body>
</html>
