<?php

namespace App\Http\Controllers;

use App\Models\Kehamilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KehamilanController extends Controller
{
    public function ambil()
    {
        $data = Kehamilan::where('user_id', Auth::id())->first();

        if ($data && \Carbon\Carbon::parse($data->hpht)->isFuture()) {
            Kehamilan::where('user_id', Auth::id())->delete();
            return response()->json(null);
        }
        

        return response()->json($data);
    }


    public function simpan(Request $request)
    {
        $request->validate([
            'hpht' => ['required', 'date', 'after_or_equal:1900-01-01'],
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        $hpht = new \Carbon\Carbon($request->hpht);

        // 🔍 CEK DULU: jika HPHT masa depan, hapus data lama dan jangan simpan
        if ($hpht->isFuture()) {
            Kehamilan::where('user_id', $userId)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Simulasi tidak disimpan ke database.',
            ]);
        }

        // ✅ Jika HPHT valid dan tidak di masa depan, baru simpan ke DB
        try {
            Kehamilan::updateOrCreate(
                ['user_id' => $userId],
                ['hpht' => $request->hpht]
            );

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server.',
            ], 500);
        }
    }
}
