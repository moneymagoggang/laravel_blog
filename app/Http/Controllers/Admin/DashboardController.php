<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show Admin Dashboard
     * @return View
     */
    public function index(): View
    {
        return view('admin.dashboard.index');
    }
}
