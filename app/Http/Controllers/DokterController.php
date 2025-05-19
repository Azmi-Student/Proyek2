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
        return view('dokter.dashboard');

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
            return redirect()->route('dokter.daftar-reservasi')->with('error', 'Status sudah selesai dan tidak dapat diubah.');
        }

        $reservasi->status = $request->status;
        $reservasi->save();

        return redirect()->route('dokter.daftar-reservasi')->with('status', 'Status berhasil diperbarui');
    }

    public function updateHasilCheckup(Request $request, $id)
    {
        $request->validate([
            'hasil_checkup' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // Temukan reservasi berdasarkan ID
        $reservasi = Reservasi::findOrFail($id);

        // Simpan hasil check-up dan catatan
        $reservasi->hasil_checkup = $request->hasil_checkup;
        $reservasi->status = 'Selesai';  // Set status jadi selesai setelah check-up
        if ($request->catatan) {
            $reservasi->catatan = $request->catatan;
        }
        $reservasi->save();

        return response()->json(['success' => true]);
    }


    // Di DokterController.php
    public function daftarReservasi()
    {
        $namaDokter = Auth::user()->name;

        // Ambil data reservasi yang ditujukan untuk dokter yang sedang login
        $reservasis = Reservasi::where('dokter', $namaDokter)->latest()->get();

        // Kirim data reservasi ke tampilan daftar-reservasi
        return view('dokter.daftar-reservasi', compact('reservasis'));
    }

    public function getHasilCheckup($id)
{
    // Temukan reservasi berdasarkan ID
    $reservasi = Reservasi::findOrFail($id);

    // Jika hasil check-up ada, kembalikan data hasil check-up
    if ($reservasi->hasil_checkup) {
        return response()->json([
            'success' => true,
            'hasil_checkup' => $reservasi->hasil_checkup,
            'catatan' => $reservasi->catatan
        ]);
    }

    // Jika hasil check-up belum ada, kembalikan form kosong
    return response()->json([
        'success' => false,
        'hasil_checkup' => '',
        'catatan' => ''
    ]);
}



}
