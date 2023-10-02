<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')
    ->as('admin.auth.')
    ->group(function () {
        Route::get('login', [AdminLoginController::class, 'login'])
            ->name('login');

        Route::post('login', [AdminLoginController::class, 'loginAdmin'])
            ->name('loginAdmin');

        Route::post('logout', [AdminLoginController::class, 'logout'])
            ->name('logout');
    });
