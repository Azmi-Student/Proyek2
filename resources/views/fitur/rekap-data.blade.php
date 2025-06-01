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
            <div class="center-wrapper">
                <div class="rekap-data-box">
                    <div class="rekap-data-header">
                        <h2 class="rekap-data-title">Hasil Check-Up</h2>
                        <button class="btn-kembali"
                            onclick="window.location.href='{{ url('/') }}'">Kembali</button>
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
                        <div class="rekap-item">
                            <div class="rekap-item-header">
                                <h3 class="rekap-item-title">Nama Check-Up</h3>
                                <span class="rekap-item-date">DD/MM/YYYY</span>
                            </div>
                            <p class="rekap-item-info">Alamat/Nama Tempat Check-Up</p>
                            <p class="rekap-item-doctor">Nama Dokter/Bidan</p>
                        </div>
                        <div class="rekap-item">
                            <div class="rekap-item-header">
                                <h3 class="rekap-item-title">Nama Check-Up</h3>
                                <span class="rekap-item-date">DD/MM/YYYY</span>
                            </div>
                            <p class="rekap-item-info">Alamat/Nama Tempat Check-Up</p>
                            <p class="rekap-item-doctor">Nama Dokter/Bidan</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>

</html>
