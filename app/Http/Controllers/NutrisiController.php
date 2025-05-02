<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutrisiController extends Controller
{
    public function getNutrisi(Request $request)
    {
        $trimester = (int) $request->query('trimester');
        $bulan = (int) $request->query('bulan');
        $minggu = (int) $request->query('minggu');
        $hari = (int) $request->query('hari');

        $trimesterData = [
            1 => "Trimester pertama: Fokus konsumsi asam folat, vitamin B, dan zat besi.",
            2 => "Trimester kedua: Tambah kalsium, protein, dan vitamin D.",
            3 => "Trimester ketiga: Perbanyak serat, omega-3, dan zat besi.",
        ];

        if ($minggu > 42) {
            return response()->json([
                'selesai' => true,
                'pesan' => '🎉 Mama telah menyelesaikan seluruh fase kehamilan. Selamat menanti buah hati!',
                'rekomendasi' => [],
                'hindari' => [],
            ]);
        }

        $bulananData = [
            1 => "Bulan 1: Mulai konsumsi vitamin prenatal dan hindari stres.",
            2 => "Bulan 2: Hindari bau tajam, makan sering porsi kecil.",
            3 => "Bulan 3: Rutin cek ke dokter, pantau mual dan kelelahan.",
            4 => "Bulan 4: Tambah makanan kaya zat besi dan protein.",
            5 => "Bulan 5: Jaga postur duduk dan mulai senam hamil ringan.",
            6 => "Bulan 6: Cek tekanan darah, cukup istirahat.",
            7 => "Bulan 7: Siapkan mental menghadapi kelahiran.",
            8 => "Bulan 8: Kontrol rutin makin intensif.",
            9 => "Bulan 9: Perbanyak makanan ringan, hindari konstipasi.",
        ];

        $rekomendasi = [
            1 => ['Sayuran hijau', 'Kacang-kacangan', 'Buah segar', 'Daging tanpa lemak'],
            2 => ['Susu rendah lemak', 'Bayam', 'Ikan rendah merkuri', 'Telur'],
            3 => ['Ikan salmon', 'Oatmeal', 'Sayuran berdaun gelap', 'Kacang-kacangan'],
        ];

        $hindari = [
            1 => ['Makanan mentah', 'Minuman beralkohol', 'Kafein berlebihan'],
            2 => ['Ikan tinggi merkuri', 'Makanan cepat saji', 'Minuman bersoda'],
            3 => ['Makanan terlalu asin', 'Makanan mentah', 'Kafein berlebihan'],
        ];

        $harian = [
            1 => "Hari ke-1: Mulai konsumsi vitamin prenatal.",
            2 => "Hari ke-2: Minum air putih 2L, hindari gorengan.",
            7 => "Hari ke-7: Jangan lewatkan sarapan sehat.",
            168 => "Hari ke-168: Cukup istirahat dan konsumsi zat besi.",
            // ... bisa tambahkan hingga hari ke-280 ...
        ];

        $mingguan = [
            1 => "Minggu ke-1: Istirahat cukup dan konsumsi vitamin B kompleks.",
            2 => "Minggu ke-2: Perbanyak buah & hindari junk food.",
            24 => "Minggu ke-24: Cek tekanan darah dan konsumsi protein.",
        ];

        $bulanan = [
            5 => "Bulan ke-5: Jaga postur tubuh & banyak minum air.",
            6 => "Bulan ke-6: Mulai belajar teknik pernapasan & kontrol ke dokter.",
        ];

        return response()->json([
            'selesai' => false,
            'panduan_trimester' => $trimesterData[$trimester] ?? '',
            'panduan_bulan' => $bulananData[$bulan] ?? '',
            'harian' => $harian[$hari] ?? "Hari ke-$hari: Jaga pola makan dan tetap aktif.",
            'mingguan' => $mingguan[$minggu] ?? "Minggu ke-$minggu: Pertahankan gizi seimbang dan tidur cukup.",
            'bulanan' => $bulanan[$bulan] ?? "Bulan ke-$bulan: Rutin kontrol dan pantau kondisi tubuh.",
            'rekomendasi' => $rekomendasi[$trimester] ?? [],
            'hindari' => $hindari[$trimester] ?? [],
        ]);
    }

}
