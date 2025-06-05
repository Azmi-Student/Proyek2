<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaturan Akun</title>
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pengaturan.css') }}">
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

            <div class="sidebar-item">
                <a href="{{ route('dokter.dashboard') }}" class="sidebar-link">
                    <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home Icon" class="sidebar-icon" />
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('dokter.daftar-reservasi') }}" class="sidebar-link">
                    <img src="{{ asset('assets/images/icon-pesan.png') }}" alt="Manajemen Reservasi Icon"
                        class="sidebar-icon" />
                    <span class="sidebar-text">Daftar <br> Reservasi</span>
                </a>
            </div>

            <div class="sidebar-item active">
                <img src="{{ asset('assets/images/icon-pengaturan-active.png') }}" alt="Pengaturan Icon"
                    class="sidebar-icon" />
                <span class="sidebar-text">Pengaturan</span>
            </div>
        </div>

        <div class="right-panel">
            <div class="pengaturan-box">
                <div class="pengaturan-header">
                    <h2 class="pengaturan-title">Pengaturan Akun</h2>
                    <button class="btn-kembali"
                        onclick="window.location.href='{{ route('dokter.dashboard') }}'">Kembali</button>
                </div>
                <div class="pengaturan-line"></div>

                <div class="profile-section active">
                    <img src="{{ asset('assets/images/icon-user.png') }}" alt="Profil Icon" class="profile-icon" />
                    <span class="profile-text">Profil Akun</span>
                </div>

                <form action="{{ route('dokter.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                            placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                            placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-update">Perbarui Profil</button>
                    </div>
                </form>









            </div>

            </iv>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('assets/js/pengaturan.js') }}"></script>

</body>

</html>
