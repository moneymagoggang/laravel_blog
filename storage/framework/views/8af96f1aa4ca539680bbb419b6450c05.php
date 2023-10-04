<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')([ 'resources/assets/js/app.js']); ?>
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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
 Blog
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="mx-5">
                           <form action="<?php echo e(route('post.search')); ?>" class="form-inline input-group rounded">
                                <input type="text" id="search-input" name="search" class="form-control  m-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

                                <button type="submit" class="btn btn-outline-primary m-0">search</button>
                           </form>
                        </li>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu "  aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="" href="<?php echo e(route('my-posts')); ?>">
                                        My Posts
                                    </a>
                                    <?php if(auth()->user()->subscription && auth()->user()->subscription->status === 'active'): ?>
                                        <a class="bg-danger dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="" href="<?php echo e(route('abort')); ?>">
                                            Cancel Subscription
                                        </a>
                                    <?php else: ?>
                                        <a class="bg-success dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="" href="<?php echo e(route('plans')); ?>">
                                            Buy Subscription
                                        </a>
                                    <?php endif; ?>
                                    <a class="dropdown-item dropdown-toggle " role="button" data-toggle="dropdown" id="logout" href="<?php echo e(route('logout'), url('/home')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mt-4 mx-auto w-75">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <script>
        // console.log(123123123);
        // $('#logout').onclick="event.preventDefault();
        // $('#logout-form').submit();
    </script>






</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>