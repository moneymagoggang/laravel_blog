<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected string $redirectTo = '/admin/dashboard';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Display Admin Login Form
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth.admin.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function loginAdmin(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')
            ->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.dashboard.index'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}
