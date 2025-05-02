<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cek apakah user sudah ada
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Buat user baru kalau belum ada
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(), // ⬅️ Ambil foto dari Google
                'password' => Hash::make(uniqid()), // Random password
            ]);
        }

        Auth::login($user);

        return redirect('/'); // Redirect ke halaman utama
    }
}
