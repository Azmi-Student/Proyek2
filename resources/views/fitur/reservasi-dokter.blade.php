<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Reservasi Dokter</title>
<link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/reservasi.css') }}">

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
            <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home Icon" class="sidebar-icon" />
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
        <div class="search-bar">
            <div class="search-left">
                <img src="{{ asset('assets/images/Icon-search.png') }}" alt="Search" class="icon" />
                <input type="text" placeholder="Cari berdasarkan judul..." />
            </div>
            <div class="search-right">
                <img src="{{ asset('assets/images/icon-bookmark.png') }}" alt="Bookmark" class="icon" />
                <img src="{{ asset('assets/images/icon-bell.png') }}" alt="Notification" class="icon" />
                <img src="{{ asset('assets/images/profile-pic.png') }}" alt="Profile" class="profile-pic" />
            </div>
        </div>

        <div class="reservasi-box">
            <div class="reservasi-header">
                <h2>Reservasi Dokter</h2>
                <button class="btn-kembali" onclick="handleKembali()">Kembali</button>
            </div>
            <div class="reservasi-underline"></div>
            <p id="petunjukReservasi">Silakan pilih dokter atau jadwal untuk melakukan reservasi.</p>




            <div id="dokterList" class="dokter-grid">
                <!-- Dokter 1 -->
                @foreach ($dokters as $dokter)
                    <div class="dokter-card">
                        <img src="{{ asset('assets/images/icon-dokter.png') }}" class="dokter-img"
                            alt="Foto Dokter">
                        <div class="dokter-info">
                            <h3>{{ $dokter->name }}</h3>
                            <p>Dokter spesialis kehamilan</p> {{-- deskripsi default --}}
                            <div class="dokter-actions">
                                <button class="btn-outline">Tanya</button>
                                <button class="btn-filled" onclick="showForm(event)">Reservasi</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                



            </div>

            <h3 style="margin-top: 30px;">Daftar Reservasi Anda</h3>
            <!-- ✅ Tabel Reservasi -->
            <div class="tabel-antrean" id="tabelReservasi">
                <div class="tabel-header">
                    <div>No</div>
                    <div>Nama Pasien</div>
                    <div>Dokter</div>
                    <div>Jenis Periksa</div>
                    <div>Jadwal</div>
                    <div>Status</div>
                </div>
                <!-- Data reservasi akan dimasukkan di sini via JS -->
            </div>

            <!-- Konten baru: Formulir + Tabel -->
            <div id="formReservasi" class="form-reservasi" style="display: none;">
                <div class="dokter-terpilih" id="dokterTerpilih">
                    <img src="" alt="Foto Dokter" id="gambarDokter" class="dokter-img" />
                    <div class="dokter-detail">
                        <h3 id="namaDokter">Nama Dokter</h3>
                        <p id="deskripsiDokter">Deskripsi singkat akan tampil di sini.</p>
                    </div>
                </div>

                <h3>Formulir Reservasi</h3>
                <p>Isi data berikut untuk melanjutkan reservasi:</p>

                <form id="formReservasiForm">

                    <div class="info-reservasi" style="margin-bottom: 15px;">
                        <p><strong>Pasien:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Dokter:</strong> <span id="namaDokter"></span></p>
                        <p><strong>Jenis Periksa:</strong> Check-Up Kehamilan</p>
                    </div>

                    <label for="jadwal">Pilih Jadwal</label>
                    <select id="jadwal" name="jadwal" required>
                        <option value="">-- Pilih Jadwal --</option>
                        <option value="Senin, 08:00 - 10:00">Senin, 08:00 - 10:00</option>
                        <option value="Rabu, 13:00 - 15:00">Rabu, 13:00 - 15:00</option>
                    </select>

                    <button type="submit" class="btn-filled">Kirim Reservasi</button>
                </form>



            </div>


        </div>



    </div>

</div>

</body>

<script src="{{ asset('assets/js/reservasi.js') }}"></script>

</html>
