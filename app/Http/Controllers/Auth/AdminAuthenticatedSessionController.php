<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AdminAuthenticatedSessionController extends Controller
{
    public function create(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return to_route('admin.dashboard');
        }

        return Inertia::render('auth/admin/login', [
            'canResetPassword' => false,
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (! Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
        $request->session()->regenerate();
        return to_route('admin.dashboard');
    }
}
