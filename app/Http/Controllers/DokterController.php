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

    // Cek jika status sudah "Selesai", maka tidak bisa diubah
    if ($reservasi->status == 'Selesai') {
        return redirect()->route('dokter.dashboard')->with('error', 'Status sudah selesai dan tidak dapat diubah.');
    }

    $reservasi->status = $request->status;
    $reservasi->save();

    return redirect()->route('dokter.dashboard')->with('status', 'Status berhasil diperbarui');
}

    public function updateHasilCheckup(Request $request, $id)
    {
        $request->validate([
            'hasil_checkup' => 'required|string',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->hasil_checkup = $request->hasil_checkup;
        $reservasi->status = 'Selesai'; // Anda bisa ubah status ke 'Selesai' setelah hasil check-up dimasukkan
        $reservasi->save();

        return redirect()->route('dokter.dashboard')->with('status', 'Hasil check-up berhasil diperbarui');
    }

}
