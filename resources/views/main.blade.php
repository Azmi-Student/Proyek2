<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mamacare</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // Menyembunyikan dropdown jika klik di luar area dropdown
    window.onclick = function(event) {
        if (!event.target.matches('.profile-pic')) {
            const dropdown = document.getElementById('dropdown-menu');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    }
</script>

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

            <a href="{{ url('/tanya-dokter') }}" class="sidebar-link">
                <div class="sidebar-item">
                    <img src="{{ asset('assets/images/icon-pesan.png') }}" alt="Tanya Dokter Icon"
                        class="sidebar-icon" />
                    <span class="sidebar-text">Tanya Dokter</span>
                </div>
            </a>


            <a href="{{ url('/pengaturan') }}" class="sidebar-link">
                <div class="sidebar-item">
                    <img src="{{ asset('assets/images/icon-pengaturan.png') }}" alt="Pengaturan Icon"
                        class="sidebar-icon" />
                    <span class="sidebar-text">Pengaturan</span>
                </div>
            </a>


            <img src="{{ asset('assets/images/logo-donasi.png') }}" alt="MamaCare Logo" class="logo" />
            <!-- Tombol Donasi -->
            <button class="donasi-btn">Berikan Donasi</button>

        </div>

        <div class="right-panel">
            <div class="search-bar">
                <div class="search-left">
                    <img src="{{ asset('assets/images/Icon-search.png') }}" alt="Search" class="icon" />
                    <input type="text" placeholder="Cari berdasarkan judul..." />
                </div>
                <div class="search-right">
    <img src="{{ asset('assets/images/icon-bookmark.png') }}" class="icon" />
    <img src="{{ asset('assets/images/icon-bell.png') }}" class="icon" />
    
    <!-- Avatar dan Dropdown -->
    <div class="profile-container">
        <img src="{{ Auth::check() && Auth::user()->avatar ? Auth::user()->avatar : asset('assets/images/profile-pic.png') }}"
            alt="Profile" class="profile-pic" onclick="toggleDropdown()" style="cursor: pointer;" />
        
        <!-- Dropdown Menu -->
        <div id="dropdown-menu" class="dropdown-menu">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
    </div>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

            </div>

            <div class="pink-box">
                <div class="pink-shimmer"></div>
                <img src="{{ asset('assets/images/hero-panel.png') }}" alt="Puzzle Pattern" class="puzzle-img" />
                <div class="pink-text">
                    <h2>Hai, <strong>{{ Auth::user()->name }}</strong>
                    </h2>

                    <p>Nikmati kemudahan memantau kehamilan dengan layanan terpercaya untuk kesehatan ibu!</p>

                    <div class="fitur-container">
                        <a href="{{ url('/kalender-kehamilan') }}" class="fitur-item">
                            <img src="{{ asset('assets/images/fitur-kalender.png') }}" alt="Kalender Kehamilan"
                                class="fitur-icon" />
                            <p class="fitur-label">Kalender<br>Kehamilan</p>
                        </a>
                        <a href="{{ url('/reservasi-dokter') }}" class="fitur-item">
                            <img src="{{ asset('assets/images/fitur-reservasi.png') }}" alt="Kalender Kehamilan"
                                class="fitur-icon" />
                            <p class="fitur-label">Reservasi<br>Dokter</p>
                        </a>
                        <a href="{{ url('/rekap-data') }}" class="fitur-item">
                            <img src="{{ asset('assets/images/fitur-rekap.png') }}" alt="Fitur 2"
                                class="fitur-icon" />
                            <p class="fitur-label">Rekap Data <br> Check-up</p>
                        </a>

                    </div>
                </div>

                <img src="{{ asset('assets/images/ibu-hamil.png') }}" alt="Ibu Hamil" class="ibu-hamil" />
            </div>

            <div class="jadwal-kalender-wrapper">
                <div class="jadwal-box">
                    <div class="jadwal-content">
                        <img src="{{ asset('assets/images/icon-jadwal.png') }}" alt="Icon Jadwal"
                            class="jadwal-icon" />
                        <p class="jadwal-text">Tidak ada jadwal hari ini</p>
                    </div>
                </div>

                <div class="kalender-box">
                    <div class="kalender-header-wrapper">
                        <button class="kalender-nav prev">&larr;</button>
                        <div class="kalender-header" id="kalenderHeader">Mei 2025</div>
                        <button class="kalender-nav next">&rarr;</button>
                    </div>
                    <div class="kalender-grid" id="kalenderGrid">
                        <!-- Diisi lewat JavaScript -->
                    </div>
                </div>

            </div>

            <div class="aktivitas-mama">
                <h3 class="aktivitas-mama-title">AKTIVITAS FISIK PADA MASA KEHAMILAN</h3>
                <div class="aktivitas-mama-line"></div>

                <div class="aktivitas-kotak-container">
                    <img src="{{ asset('assets/images/aktivitas-1.png') }}" alt="Senam Hamil Bola Fitnes"
                        class="aktivitas-gambar" data-video="https://www.youtube.com/embed/IFcuN9z7X04">

                    <img src="{{ asset('assets/images/aktivitas-2.png') }}" alt="Aktivitas 2"
                        class="aktivitas-gambar" data-video="https://www.youtube.com/embed/C2ds5O8ghiA">

                    <img src="{{ asset('assets/images/aktivitas-3.png') }}" alt="Aktivitas 3"
                        class="aktivitas-gambar" data-video="https://www.youtube.com/embed/T0ElRyCPeQo">

                    <img src="{{ asset('assets/images/aktivitas-4.png') }}" alt="Aktivitas 4"
                        class="aktivitas-gambar" data-video="https://www.youtube.com/embed/o0bcQUBbJbw">

                    <img src="{{ asset('assets/images/aktivitas-5.png') }}" alt="Aktivitas 5"
                        class="aktivitas-gambar" data-video="https://www.youtube.com/embed/c47ONTAvo3E">

                    <img src="{{ asset('assets/images/aktivitas-6.png') }}" alt="Aktivitas 6"
                        class="aktivitas-gambar" data-video="https://www.youtube.com/embed/nBfbJ-3tUdc">

                </div>


            </div>

            <div class="artikel-mama">
                <h3 class="artikel-title">ARTIKEL INFORMASI</h3>
                <div class="garis-pendek"></div>

                <div class="artikel-container">
                    <div class="artikel-card">
                        <img src="{{ asset('assets/images/artikel-1.png') }}" alt="Artikel" class="artikel-img" />

                        <div class="artikel-label">
                            <img src="{{ asset('assets/images/icon-artikel.png') }}" alt="Icon Artikel"
                                class="artikel-icon" />
                            <span>Artikel</span>
                        </div>

                        <h4 class="artikel-judul">
                            Alasan Ngidam Saat Hamil dan Tips Menghadapinya
                        </h4>

                        <p class="artikel-deskripsi">
                            Ngidam merupakan hal yang umum dialami oleh setiap wanita di awal masa kehamilan. Meskipun
                            belum diketahui penyebabnya, terdapat beberapa faktor yang bisa menjadi alasan mengapa ibu
                            hamil tiba-tiba ingin mengonsumsi makanan tertentu.
                        </p>

                        <div class="artikel-footer">
                            <img src="{{ asset('assets/images/icon-jam.png') }}" class="artikel-icon-footer" />
                            <span class="artikel-tanggal">18 Januari 2025</span>
                        </div>
                    </div>

                    <div class="artikel-card">
                        <img src="{{ asset('assets/images/artikel-2.png') }}" alt="Artikel" class="artikel-img" />

                        <div class="artikel-label">
                            <img src="{{ asset('assets/images/icon-artikel.png') }}" alt="Icon Artikel"
                                class="artikel-icon" />
                            <span>Artikel</span>
                        </div>

                        <h4 class="artikel-judul">
                            Alasan Ngidam Saat Hamil dan Tips Menghadapinya
                        </h4>

                        <p class="artikel-deskripsi">
                            Ngidam merupakan hal yang umum dialami oleh setiap wanita di awal masa kehamilan. Meskipun
                            belum diketahui penyebabnya, terdapat beberapa faktor yang bisa menjadi alasan mengapa ibu
                            hamil tiba-tiba ingin mengonsumsi makanan tertentu.
                        </p>

                        <div class="artikel-footer">
                            <img src="{{ asset('assets/images/icon-jam.png') }}" class="artikel-icon-footer" />
                            <span class="artikel-tanggal">18 Januari 2025</span>
                        </div>
                    </div>

                    <div class="artikel-card">
                        <img src="{{ asset('assets/images/artikel-3.png') }}" alt="Artikel" class="artikel-img" />

                        <div class="artikel-label">
                            <img src="{{ asset('assets/images/icon-artikel.png') }}" alt="Icon Artikel"
                                class="artikel-icon" />
                            <span>Artikel</span>
                        </div>

                        <h4 class="artikel-judul">
                            Alasan Ngidam Saat Hamil dan Tips Menghadapinya
                        </h4>

                        <p class="artikel-deskripsi">
                            Ngidam merupakan hal yang umum dialami oleh setiap wanita di awal masa kehamilan. Meskipun
                            belum diketahui penyebabnya, terdapat beberapa faktor yang bisa menjadi alasan mengapa ibu
                            hamil tiba-tiba ingin mengonsumsi makanan tertentu.
                        </p>

                        <div class="artikel-footer">
                            <img src="{{ asset('assets/images/icon-jam.png') }}" class="artikel-icon-footer" />
                            <span class="artikel-tanggal">18 Januari 2025</span>
                        </div>
                    </div>


                </div>
            </div>

            <div class="footer-box">
                <p class="footer-text">Presented © By MamaCare 2025</p>
            </div>




        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>


</html>
