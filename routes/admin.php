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
