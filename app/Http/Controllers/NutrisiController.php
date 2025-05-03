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

        if ($minggu > 42) {
            return response()->json([
                'selesai' => true,
                'pesan' => '🎉 Mama telah menyelesaikan seluruh fase kehamilan. Selamat menanti buah hati dengan penuh cinta!',
                'rekomendasi' => [],
                'hindari' => [],
            ]);
        }

        $trimesterData = [
            1 => "Trimester 1 (0–13 minggu): Fokus pada perkembangan awal janin. Konsumsi rutin asam folat, zat besi, dan vitamin B. Hindari rokok dan alkohol.",
            2 => "Trimester 2 (14–27 minggu): Janin berkembang cepat. Perbanyak kalsium, vitamin D, protein, serta kontrol rutin tekanan darah.",
            3 => "Trimester 3 (28–40 minggu): Janin mulai siap lahir. Perbanyak serat, omega-3, dan lakukan latihan napas atau relaksasi ringan.",
        ];

        $bulananData = [
            1 => "Bulan 1: Tubuh mulai beradaptasi. Mual umum terjadi. Minum cukup air dan mulai konsumsi suplemen kehamilan.",
            2 => "Bulan 2: Perkembangan otak janin dimulai. Konsumsi makanan kaya DHA dan zat besi.",
            3 => "Bulan 3: Bentuk dasar janin mulai terbentuk. Kurangi stres dan istirahat cukup.",
            4 => "Bulan 4: Nafsu makan meningkat. Perbanyak protein, serat, dan mulai rutin berjalan kaki.",
            5 => "Bulan 5: Janin mulai aktif. Cek HB (hemoglobin), konsumsi daging tanpa lemak dan bayam.",
            6 => "Bulan 6: Tulang janin menguat. Perbanyak kalsium dari susu, keju, atau kacang almond.",
            7 => "Bulan 7: Berat janin naik cepat. Tambah kalori sehat dari alpukat dan telur rebus.",
            8 => "Bulan 8: Posisi janin mulai tetap. Hindari berdiri lama dan tetap aktif ringan.",
            9 => "Bulan 9: Persiapan lahir. Perbanyak air putih, hindari sembelit dan persiapkan perlengkapan bayi.",
        ];

        $mingguan = [
            1 => "Minggu ke-1: Istirahat cukup dan konsumsi vitamin B kompleks.",
            2 => "Minggu ke-2: Perbanyak buah dan hindari junk food.",
            3 => "Minggu ke-3: Jaga pola makan, mulai aktif olahraga ringan.",
            4 => "Minggu ke-4: Cek ke dokter bila muncul gejala mual berat.",
            5 => "Minggu ke-5: Jangan lupa konsumsi asam folat harian.",
            6 => "Minggu ke-6: Minum susu khusus ibu hamil setiap pagi.",
            7 => "Minggu ke-7: Hindari bau menyengat dan makanan berminyak.",
            8 => "Minggu ke-8: Perbanyak makanan berprotein seperti telur.",
            9 => "Minggu ke-9: Rutin konsumsi zat besi dan buah kaya vitamin C.",
            10 => "Minggu ke-10: Cek ke dokter untuk kontrol awal janin.",
            11 => "Minggu ke-11: Sering makan dalam porsi kecil.",
            12 => "Minggu ke-12: Usahakan tidur minimal 8 jam.",
            13 => "Minggu ke-13: Mulai olahraga ringan seperti jalan kaki.",
            14 => "Minggu ke-14: Cek tekanan darah dan gula darah.",
            15 => "Minggu ke-15: Janin mulai mendengar suara, ajak berbicara.",
            16 => "Minggu ke-16: Perbanyak konsumsi kalsium dan vitamin D.",
            17 => "Minggu ke-17: Konsumsi alpukat dan ikan berlemak sehat.",
            18 => "Minggu ke-18: Janin bergerak aktif, tetap aktif fisik ringan.",
            19 => "Minggu ke-19: Perbanyak serat dan minum air putih.",
            20 => "Minggu ke-20: USG kedua direkomendasikan minggu ini.",
            21 => "Minggu ke-21: Hindari duduk terlalu lama, lakukan peregangan.",
            22 => "Minggu ke-22: Konsumsi makanan dengan zat besi tinggi.",
            23 => "Minggu ke-23: Perhatikan postur duduk agar tidak sakit pinggang.",
            24 => "Minggu ke-24: Cek Hb, tekanan darah, dan gula darah.",
            25 => "Minggu ke-25: Minum air kelapa untuk cegah dehidrasi.",
            26 => "Minggu ke-26: Tidur miring kiri lebih baik untuk sirkulasi.",
            27 => "Minggu ke-27: Latihan pernapasan bisa dimulai.",
            28 => "Minggu ke-28: Jadwal kontrol dokter bisa lebih sering.",
            29 => "Minggu ke-29: Perbanyak makanan tinggi serat dan cairan.",
            30 => "Minggu ke-30: Istirahat total jika merasa lelah.",
            31 => "Minggu ke-31: Persiapkan perlengkapan bayi dan keperluan lahiran.",
            32 => "Minggu ke-32: Lakukan gerakan peregangan setiap pagi.",
            33 => "Minggu ke-33: Hindari berdiri lama atau terlalu capek.",
            34 => "Minggu ke-34: Perbanyak makanan ringan bergizi.",
            35 => "Minggu ke-35: Cek posisi janin melalui USG.",
            36 => "Minggu ke-36: Siapkan dokumen dan tas melahirkan.",
            37 => "Minggu ke-37: Latih teknik napas dan tetap tenang.",
            38 => "Minggu ke-38: Waspadai kontraksi dan pendarahan.",
            39 => "Minggu ke-39: Tetap tenang, hindari stres.",
            40 => "Minggu ke-40: Hari-H! Siapkan mental dan fisik.",
        ];


        $harian = [
            1 => "Hari ke-1: Mulai konsumsi vitamin prenatal.",
            2 => "Hari ke-2: Minum air putih 2L, hindari gorengan.",
            3 => "Hari ke-3: Konsumsi buah pisang sebagai camilan sehat.",
            4 => "Hari ke-4: Hindari aktivitas berat dan istirahat cukup.",
            5 => "Hari ke-5: Minum susu ibu hamil setelah sarapan.",
            6 => "Hari ke-6: Jalan kaki 15 menit di pagi hari.",
            7 => "Hari ke-7: Jangan lewatkan sarapan sehat.",
            8 => "Hari ke-8: Konsumsi telur rebus sebagai sumber protein.",
            9 => "Hari ke-9: Dengarkan musik menenangkan sebelum tidur.",
            10 => "Hari ke-10: Buat jurnal kehamilan untuk memantau perkembangan.",
            // Tambahkan lebih banyak lagi jika perlu...
        ];


        $rekomendasi = [
            1 => ['Asam folat (bayam, brokoli)', 'Vitamin B6 (pisang, gandum)', 'Zat besi (hati ayam, sayur hijau)', 'Susu ibu hamil'],
            2 => ['Protein (ikan, ayam, telur)', 'Kalsium (susu, keju)', 'Vitamin D (matahari pagi)', 'Buah segar (jeruk, kiwi)'],
            3 => ['Omega-3 (ikan salmon, flaxseed)', 'Serat (oat, pepaya, alpukat)', 'Cairan elektrolit', 'Karbo kompleks (beras merah, kentang)'],
        ];

        $hindari = [
            1 => ['Makanan mentah', 'Minuman beralkohol', 'Kafein tinggi', 'Obat tanpa resep dokter'],
            2 => ['Ikan tinggi merkuri (tuna besar, hiu)', 'Junk food', 'Minuman manis berlebih', 'Keju mentah'],
            3 => ['Makanan terlalu asin', 'Gorengan', 'Tidur terlalu malam', 'Stres berlebihan'],
        ];

        return response()->json([
            'selesai' => false,
            'panduan_trimester' => $trimesterData[$trimester] ?? '',
            'panduan_bulan' => $bulananData[$bulan] ?? '',
            'harian' => $harian[$hari] ?? "Hari ke-$hari: Istirahat cukup dan perhatikan gizi.",
            'mingguan' => $mingguan[$minggu] ?? "Minggu ke-$minggu: Jaga nutrisi dan kontrol ke dokter.",
            'bulanan' => $bulananData[$bulan] ?? "Bulan ke-$bulan: Pastikan kebutuhan nutrisi dan istirahat terpenuhi.",
            'rekomendasi' => $rekomendasi[$trimester] ?? [],
            'hindari' => $hindari[$trimester] ?? [],
        ]);
    }
}
