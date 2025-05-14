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

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $role = Auth::user()->role;

        // 🔁 Routing berdasarkan role
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'dokter') {
            return redirect()->route('dokter.dashboard'); // ⬅️ ini harus sesuai nama route kamu
        }

        return redirect('/'); // untuk role 'user' (pasien)
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
