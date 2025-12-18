<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Logic login dengan Auth::attempt
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            $request->session()->regenerate();
            return redirect()->intended('/blog')->with('success', 'Login berhasil.');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
