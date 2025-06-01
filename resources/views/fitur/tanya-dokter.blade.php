<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tanya Dokter</title>
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kalender-kehamilan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    <div id="splash-screen">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Splash Logo" class="splash-logo" />
    </div>

    <div class="main-wrapper">

        <div class="left-panel">
            <img src="{{ asset('assets/images/logo-mamacare-pink.png') }}" alt="MamaCare Logo" class="logo" />

            <div class="sidebar-item">
                <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home Icon" class="sidebar-icon" />
                <span class="sidebar-text">Home</span>
            </div>

            <div class="sidebar-item active">
                <img src="{{ asset('assets/images/icon-pesan-active.png') }}" alt="Tanya Dokter Icon"
                    class="sidebar-icon" />
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
                <div class="pregnancy-box">
                    <div class="kalender-kehamilan-header">
                        <h2 class="kalender-kehamilan-title">Hasil Check-Up</h2>
                        <button class="btn-kembali"
                            onclick="window.location.href='{{ url('/') }}'">Kembali</button>
                    </div>
                    <div class="kalender-kehamilan-line"></div>



                </div>


            </div>
        </div>

    </div>
</body>





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</html>
