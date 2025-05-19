<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Menangani form register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // ⬅️ default
        ]);

        return redirect('/register')->with('register_success', true);
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah email terdaftar
        $user = User::where('email', $request->email)->first();

        // Jika email tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email yang Mama masukkan tidak terdaftar nih. Yuk coba lagi!',
            ]);
        }

        // Cek apakah password kurang dari 3 karakter
        if (strlen($request->password) < 3) {
            return back()->withErrors([
                'email' => 'Password yang Mama masukkan kurang dari 3 karakter. Yuk coba lagi!',
            ]);
        }

        // Cek apakah password sesuai dengan yang ada di database
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Password yang Mama masukkan salah. Yuk coba lagi!',
            ]);
        }

        // Jika login berhasil
        Auth::login($user);
        $request->session()->regenerate();

        $role = Auth::user()->role;

        // Routing berdasarkan role
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'dokter') {
            return redirect()->route('dokter.dashboard');
        }

        return redirect('/'); // untuk role 'user' (pasien)
    }




    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
