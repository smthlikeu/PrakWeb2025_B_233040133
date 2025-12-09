<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // Modul 2-2 START - Authentikasi Manual Sederhana
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Generate username (slug of name) and ensure uniqueness
        $baseUsername = Str::of($request->name)->slug('-');
        $username = (string) $baseUsername;
        $i = 1;
        while (User::where('username', $username)->exists()) {
            $username = (string) $baseUsername . '-' . $i++;
        }

        try {
            // Membuat user baru
            User::create([
                'name' => $request->name,
                'username' => $username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            // Jika ada error (mis. DB), kembalikan dengan pesan
            return back()->withInput()->with('error', 'Terjadi kesalahan saat registrasi: ' . $e->getMessage());
        }
    }
    // Modul 2-2 END - Authentikasi Manual Sederhana
}
