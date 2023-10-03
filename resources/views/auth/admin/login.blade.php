@extends('layouts.auth-admin')

@section('content')
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="{{ route('home.index') }}" class="brand-logo">
                        <img src="{{ Vite::image('logo/logo-with-title.svg') }}" alt="{{ config('app.name', 'Laravel') }}">
                    </a>

                    <h4 class="card-title mb-1">Welcome to {{ config('app.name', 'Laravel') }}! 👋</h4>
                    <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

                    <form class="auth-login-form mt-2" action="{{ route('admin.auth.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="login-email" name="email" placeholder="example@example.com"
                                   value="{{ old('email') }}"
                                   aria-describedby="login-email" tabindex="1" autofocus/>
                            <span class="invalid-feedback"
                                  role="alert"><strong>@error('email'){{ $message }}@enderror</strong></span>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">Password</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">

                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror form-control-merge"
                                       id="login-password"
                                       name="password" tabindex="2" autocomplete="password"
                                       placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                       aria-describedby="login-password"/>
                                <span class="invalid-feedback"
                                      role="alert"><strong>@error('password'){{ $message }}@enderror</strong></span>
                                <div class="input-group-append" style="position: absolute; right: -1px; top: 0; height: 100%;">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember-me"
                                       tabindex="3" @checked(old('remember'))>
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
