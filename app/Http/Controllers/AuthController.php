<?php

namespace App\Http\Controllers;

use App\Models\ThongTinCuaHang;
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
            return redirect()->intended('/');
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
        'email' => 'required|email|max:255|unique:users,email',
        'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Check if email is unique in the 'users' table
        'password' => 'required|string|min:8',
        ]);

        $user = User::query()->create(attributes: $data);

        Auth::login($user);

        return redirect()->intended('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'so_dien_thoai' => 'nullable|string',
            'gioi_tinh' => 'nullable|string',
            'dia_chi' => 'nullable|string',
            'ngay_sinh' => 'nullable|date|before:today',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Update basic fields
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->so_dien_thoai = $request->input('so_dien_thoai');
        $user->gioi_tinh = $request->input('gioi_tinh');
        $user->dia_chi = $request->input('dia_chi');
        $user->ngay_sinh = $request->input('ngay_sinh');

        // Handle avatar update
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->anh_dai_dien = $avatarPath;
        }

        // Save the updated user
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Cập nhật thông tin thành công!');
    }
    public function showProfile()
    {
        $thongTin = ThongTinCuaHang::first();
        return view('clients.profile',compact('thongTin'));
    }
}
