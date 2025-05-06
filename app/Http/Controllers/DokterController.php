<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;

class DokterController extends Controller
{
    /**
     * Menampilkan daftar reservasi untuk dokter ini.
     */
    public function index()
    {
        $namaDokter = Auth::user()->name;

        // Ambil reservasi yang ditujukan ke dokter ini
        $reservasis = Reservasi::where('dokter', $namaDokter)->latest()->get();

        return view('dokter.dashboard', compact('reservasis'));
    }

    /**
     * Ubah status reservasi (opsional, jika nanti dibutuhkan).
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = $request->status;
        $reservasi->save();

        return redirect()->route('dokter.dashboard')->with('status', 'Reservasi berhasil diperbarui');
    }
}
