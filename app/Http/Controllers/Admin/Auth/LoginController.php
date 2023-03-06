<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/admin/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        if (auth('admin')) {
            return redirect('admin/home');
        }

        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()->withInput()->withErrors(['login' => 'These credentials don\'t match our records.']);
    }

    public function logout()
    {
        auth('admin')->logout();
        return response()->noContent();
    }
}
