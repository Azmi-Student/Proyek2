<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'dokter' => 'required|string',
            'jadwal' => 'required|string',
        ]);

        // Ambil nama pasien dan user_id yang sedang login
        $namaPasien = Auth::user()->name;
        $userId = Auth::id();  // Mengambil ID pengguna yang sedang login

        // Simpan data reservasi dengan user_id yang sesuai
        Reservasi::create([
            'nama_pasien' => $namaPasien,
            'dokter' => $request->dokter,
            'jenis_periksa' => 'Check-Up Kehamilan',
            'jadwal' => $request->jadwal,
            'status' => 'Belum Diajukan',
            'user_id' => $userId,  // Menambahkan user_id
        ]);

        return response()->json(['success' => true]);
    }

    public function data(): JsonResponse
    {
        // Ambil hanya data reservasi yang terkait dengan pengguna yang login
        $reservasi = Reservasi::where('user_id', auth()->id())->latest()->get();

        return response()->json($reservasi);
    }

    public function rekapDataCheckup()
    {
        // Ambil nama pasien yang sedang login
        $namaPasien = Auth::user()->name;

        // Ambil data hasil check-up untuk pasien yang sedang login
        $reservasis = Reservasi::where('nama_pasien', $namaPasien)
            ->whereNotNull('hasil_checkup') // Hanya yang sudah memiliki hasil check-up
            ->latest()
            ->get();

        // Kirim data hasil check-up ke tampilan rekap-data
        return view('fitur.rekap-data', compact('reservasis'));
    }



}
