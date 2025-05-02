<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <img src="{{ asset('assets/images/icon-pengaturan.png') }}" alt="Pengaturan Icon" class="sidebar-icon" />
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
                    <button class="btn-kembali" onclick="window.location.href='{{ url('/') }}'">Kembali</button>
                </div>
                <div class="reservasi-underline"></div>
                <p id="petunjukReservasi">Silakan pilih dokter atau jadwal untuk melakukan reservasi.</p>

                <div id="dokterList" class="dokter-grid">
                    <!-- Dokter 1 -->
                    <div class="dokter-card">
                        <img src="{{ asset('assets/images/icon-dokter.png') }}" alt="Foto Dokter" class="dokter-img">
                        <div class="dokter-info">
                            <h3>Dokter 1</h3>
                            <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or
                                even a very very short story.</p>
                            <div class="dokter-actions">
                                <button class="btn-outline">Tanya</button>
                                <button class="btn-filled" onclick="showForm()">Reservasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="dokter-card">
                        <img src="{{ asset('assets/images/icon-dokter.png') }}" alt="Foto Dokter" class="dokter-img">
                        <div class="dokter-info">
                            <h3>Dokter 2</h3>
                            <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or
                                even a very very short story.</p>
                            <div class="dokter-actions">
                                <button class="btn-outline">Tanya</button>
                                <button class="btn-filled" onclick="showForm()">Reservasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="dokter-card">
                        <img src="{{ asset('assets/images/icon-dokter.png') }}" alt="Foto Dokter" class="dokter-img">
                        <div class="dokter-info">
                            <h3>Dokter 1</h3>
                            <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or
                                even a very very short story.</p>
                            <div class="dokter-actions">
                                <button class="btn-outline">Tanya</button>
                                <button class="btn-filled" onclick="showForm()">Reservasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="dokter-card">
                        <img src="{{ asset('assets/images/icon-dokter.png') }}" alt="Foto Dokter" class="dokter-img">
                        <div class="dokter-info">
                            <h3>Dokter 1</h3>
                            <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or
                                even a very very short story.</p>
                            <div class="dokter-actions">
                                <button class="btn-outline">Tanya</button>
                                <button class="btn-filled" onclick="showForm()">Reservasi</button>
                            </div>
                        </div>
                    </div>



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
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap"
                            required>

                        <label for="jadwal">Pilih Jadwal</label>
                        <select id="jadwal" name="jadwal" required>
                            <option value="">-- Pilih Jadwal --</option>
                            <option value="senin">Senin, 08:00 - 10:00</option>
                            <option value="rabu">Rabu, 13:00 - 15:00</option>
                        </select>

                        <button type="submit" class="btn-filled">Kirim Reservasi</button>
                    </form>

                    <!-- Tabel Antrean -->
                    <div class="tabel-antrean">
                        <div class="tabel-header">
                            <div>No Antre</div>
                            <div>Tanggal</div>
                            <div>Jenis Periksa</div>
                            <div>Tempat</div>
                            <div>Ajukan</div>
                        </div>

                        <div class="tabel-row">
                            <div><input type="checkbox" /></div>
                            <div>10 Februari 2025</div>
                            <div>Check-Up Kehamilan</div>
                            <div>Klinik Sayang Ibu : Jl. Menuju surga berada di bawah restu ibu Rt. Kanan Rw. Kaki
                                Kiri</div>
                            <div>Belum Diajukan</div>
                        </div>
                    </div>
                </div>


            </div>



        </div>

    </div>

</body>

<script src="{{ asset('assets/js/reservasi.js') }}"></script>

</html>
