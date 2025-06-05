<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function store(Request $request, $dokterId)
    {
        // Validasi input pesan
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Simpan pesan chat ke database
        $chat = new Chat();
        $chat->user_id = auth()->id(); // ID pengguna yang sedang login
        $chat->dokter_id = $dokterId; // ID dokter yang dipilih
        $chat->message = $request->message;
        $chat->save();

        return response()->json([
            'message' => 'Pesan terkirim!',
            'chat' => $chat
        ]);
    }
}
