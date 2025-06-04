<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rekap Data Check Up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/rekap-data.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div id="splash-screen">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Splash Logo" class="splash-logo" />
    </div>

    <div class="main-wrapper">
        <div class="left-panel">
            <img src="{{ asset('assets/images/logo-mamacare-pink.png') }}" alt="MamaCare Logo" class="logo" />

            <div class="sidebar-item active">
                <img src="{{ asset('assets/images/icon-home-active.png') }}" alt="Home Icon" class="sidebar-icon" />
                <span class="sidebar-text">Home</span>
            </div>
            <div class="sidebar-item">
                <img src="{{ asset('assets/images/icon-pesan.png') }}" alt="Tanya Dokter Icon" class="sidebar-icon" />
                <span class="sidebar-text">Tanya Dokter</span>
            </div>
            <div class="sidebar-item">
                <img src="{{ asset('assets/images/icon-pengaturan.png') }}" alt="Pengaturan Icon"
                    class="sidebar-icon" />
                <span class="sidebar-text">Pengaturan</span>
            </div>
        </div>

        <div class="right-panel">
            <div class="rekap-data-box">
                <div class="rekap-data-header">
                    <h2 class="rekap-data-title">Hasil Check-Up</h2>
                    <button class="btn-kembali" onclick="window.location.href='{{ url('/') }}'">Kembali</button>
                </div>
                <div class="rekap-data-line"></div>

                <div class="filter-box">
                    <select class="jenis-check-up">
                        <option value="">Jenis Check-Up</option>
                        <option value="checkup1">Check-Up 1</option>
                        <option value="checkup2">Check-Up 2</option>
                    </select>
                    <input type="text" class="search-check-up" placeholder="Cari Hasil Check-Up" />
                </div>

                <div class="rekap-data-list">
    @foreach ($reservasis as $reservasi)
        <div class="rekap-item">
            <div class="rekap-item-header" onclick="toggleDetails('detail-{{ $reservasi->id }}')">
                <table class="rekap-item-table">
                    <tr>
                        <td><strong>No:</strong></td>
                        <td>{{ $loop->iteration }}</td> <!-- Nomor Urut Data -->
                    </tr>
                    <tr>
                        <td><strong>Nama Pasien:</strong></td>
                        <td>{{ $reservasi->nama_pasien }}</td>
                    </tr>
                    <tr>
                        <td><strong>Dokter:</strong></td>
                        <td>{{ $reservasi->dokter }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Pemeriksaan:</strong></td>
                        <td>{{ $reservasi->jadwal }}</td>
                    </tr>
                </table>
            </div>

            <!-- Detail Informasi (Hasil Check-Up dan Catatan) -->
            <div id="detail-{{ $reservasi->id }}" class="rekap-item-details" style="display: none;">
                <div class="rekap-item-printable">
                    <!-- Semua Data yang ingin Dicetak -->
                    <table class="rekap-item-table">
                        <tr>
                            <td><strong>No:</strong></td>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pasien:</strong></td>
                            <td>{{ $reservasi->nama_pasien }}</td>
                        </tr>
                        <tr>
                            <td><strong>Dokter:</strong></td>
                            <td>{{ $reservasi->dokter }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Pemeriksaan:</strong></td>
                            <td>{{ $reservasi->jadwal }}</td>
                        </tr>
                    </table>

                    <p class="rekap-item-info"><strong>Hasil Check-Up:</strong> {{ $reservasi->hasil_checkup }}</p>
                    <p class="rekap-item-catatan"><strong>Catatan:</strong> {{ $reservasi->catatan ?? 'Tidak ada catatan' }}</p>
                    <p><strong>Usia:</strong> {{ $reservasi->usia }} Tahun</p>
                    <p><strong>Berat Badan:</strong> {{ $reservasi->berat_badan }} kg</p>
                    <p><strong>Detak Jantung Janin:</strong> {{ $reservasi->detak_jantung_janin }} bpm</p>
                    <p><strong>Kondisi Cairan Ketuban:</strong> {{ $reservasi->kondisi_cairan_ketuban }}</p>
                    <p><strong>Keluhan:</strong> {{ $reservasi->keluhan }}</p>

                    @if ($reservasi->gambar_checkup)
                        <div class="rekap-item-images">
                            @foreach (json_decode($reservasi->gambar_checkup) as $image)
                                <div class="image-container">
                                    <p class="image-description">Keterangan: Gambar hasil pemeriksaan</p>
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gambar Hasil Check-Up" style="width: 100px; height: auto; margin-right: 10px;" onclick="openImage('{{ asset('storage/' . $image) }}')">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Tombol "Print PDF" hanya di detail -->
                <button class="btn-print-pdf" onclick="showPrintPopup('detail-{{ $reservasi->id }}')">Print PDF</button>
            </div>

            <!-- Tombol "Lihat Detail" untuk menampilkan detail lebih lanjut -->
            <div class="rekap-item-header">
                <button class="btn-detail" onclick="toggleDetails('detail-{{ $reservasi->id }}')">Lihat Detail</button>
            </div>
        </div>
    @endforeach
</div>








            </div>

            </iv>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('assets/js/rekap-data.js') }}"></script>

</body>

</html>
