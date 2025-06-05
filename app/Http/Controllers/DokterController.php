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
        'gambar_checkup' => 'nullable|array|max:3',
        'gambar_checkup.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $reservasi = Reservasi::findOrFail($id);

    // Simpan gambar yang diunggah
    if ($request->hasFile('gambar_checkup')) {
        $images = [];
        foreach ($request->file('gambar_checkup') as $image) {
            $images[] = $image->store('images', 'public');
        }
        $reservasi->gambar_checkup = json_encode($images);
    }

    $reservasi->hasil_checkup = $request->hasil_checkup;
    $reservasi->catatan = $request->catatan;
    $reservasi->usia = $request->usia;
    $reservasi->berat_badan = $request->berat_badan;
    $reservasi->detak_jantung_janin = $request->detak_jantung_janin;
    $reservasi->kondisi_cairan_ketuban = $request->kondisi_cairan_ketuban;
    $reservasi->keluhan = $request->keluhan;
    $reservasi->status = 'Selesai';
    
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
    $reservasi = Reservasi::findOrFail($id);

    // Jika hasil check-up ada, kembalikan data hasil check-up beserta data tambahan
    if ($reservasi->hasil_checkup) {
        return response()->json([
            'success' => true,
            'hasil_checkup' => $reservasi->hasil_checkup,
            'catatan' => $reservasi->catatan,
            'usia' => $reservasi->usia,
            'berat_badan' => $reservasi->berat_badan,
            'detak_jantung_janin' => $reservasi->detak_jantung_janin,
            'kondisi_cairan_ketuban' => $reservasi->kondisi_cairan_ketuban,
            'keluhan' => $reservasi->keluhan
        ]);
    }

    return response()->json([
        'success' => false,
        'hasil_checkup' => '',
        'catatan' => '',
        'usia' => '',
        'berat_badan' => '',
        'detak_jantung_janin' => '',
        'kondisi_cairan_ketuban' => '',
        'keluhan' => ''
    ]);
}

public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . auth()->id(), // Pastikan email unik kecuali milik dokter ini
                'password' => 'nullable|min:6',
            ]);

            $user = auth()->user();

            $dataToUpdate = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->password) {
                $dataToUpdate['password'] = Hash::make($request->password);
            }

            $user->update($dataToUpdate);

            return redirect()->route('dokter.pengaturan')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('dokter.pengaturan')->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
    


}
