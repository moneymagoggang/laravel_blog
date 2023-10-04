<?php

use App\Http\Controllers\Admin\BestDealsController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\PriceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;

Route::get('change/theme/{theme}', [SettingController::class, 'changeTheme']);

/**
 * @group Dashboard
 */
Route::prefix('dashboard/')
    ->name('dashboard.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
    });
Route::prefix('posts/')
    ->name('posts.')
    ->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::delete('/{post}', [\App\Http\Controllers\Admin\PostController::class, 'delete'])->name('delete');
        Route::get('/{post}/confirm', [\App\Http\Controllers\Admin\PostController::class, 'confirmPost'])->name('confirm');
        Route::get('/{post}/decline', [\App\Http\Controllers\Admin\PostController::class, 'declinePost'])->name('decline');
    });


