<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admins/dashboard');
        }

        return back()->withErrors([
            'email' => 'Sai thông tin người dùng, vui lòng nhập lại.',
        ])->onlyInput('email');

    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|max:255|email',
           'password' => 'required|string|min:8',
        ]);

        $user = User::query()->create($data);

        Auth::login($user);

        return redirect()->intended('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
