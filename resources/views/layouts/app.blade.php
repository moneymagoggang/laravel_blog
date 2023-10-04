<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
{{--resources/assets/images/logo/logo-with-title.svg.--}}
    <!-- Scripts -->
    @vite([ 'resources/assets/js/app.js'])
</head>
<body>


<div id="app">

</div>

<div id="preloader" class="d-flex justify-content-center align-items-center">
    <div class="spinner-border" role="status">

    </div>
</div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'Blog') }}--}} Blog
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="mx-5">
                           <form action="{{ route('post.search') }}" class="form-inline input-group rounded">
                                <input type="text" id="search-input" name="search" class="form-control  m-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

                                <button type="submit" class="btn btn-outline-primary m-0">search</button>
                           </form>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu "  aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="" href="{{ route('my-posts') }}">
                                        My Posts
                                    </a>
                                    @if(auth()->user()->subscription && auth()->user()->subscription->status === 'active')
                                        <a class="bg-danger dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="" href="{{ route('abort') }}">
                                            Cancel Subscription
                                        </a>
                                    @else
                                        <a class="bg-success dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="" href="{{ route('plans') }}">
                                            Buy Subscription
                                        </a>
                                    @endif
                                    <a class="dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="logout" href="{{ route('logout'), url('/home') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mt-4 mx-auto w-75">
            @yield('content')
        </main>
    </div>
    <script>
        // console.log(123123123);
        // $('#logout').onclick="event.preventDefault();
        // $('#logout-form').submit();
    </script>
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}



</body>
</html>
