<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MetaData -->
    <title>Login | {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ Vite::image('logo/logo-small.svg') }}"/>
    <meta name="description" content="{{ config('app.name', 'Laravel') . ' Login Admin Panel' }}">
    <!-- Scripts -->
    @vite(['resources/assets/js/app-admin.js'])
    @include('admin.parts.styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-panel-assets/css/pages/page-auth.css') }}">
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('admin-panel-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('admin-panel-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin-panel-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin-panel-assets/js/core/app.js') }}"></script>
<script src="{{ asset('admin-panel-assets/js/scripts/pages/page-auth-login.js') }}"></script>
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
</html>
