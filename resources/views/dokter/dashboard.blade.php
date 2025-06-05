<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Dokter</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dokter/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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
                <span class="sidebar-text">Dashboard</span>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('dokter.daftar-reservasi') }}" class="sidebar-link">
                    <img src="{{ asset('assets/images/icon-pesan.png') }}" alt="Manajemen Reservasi Icon"
                        class="sidebar-icon" />
                    <span class="sidebar-text">Daftar <br> Reservasi</span>
                </a>
            </div>



            <div class="sidebar-item">
                <a href="{{ route('dokter.pengaturan') }}" class="sidebar-link"><img
                        src="{{ asset('assets/images/icon-pengaturan.png') }}" alt="Pengaturan Icon"
                        class="sidebar-icon" />
                    <span class="sidebar-text">Pengaturan</span> </a>


            </div>
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
                    <h2>Selamat Datang, <strong>{{ Auth::user()->name }}!</strong>
                    </h2>

<p>Kelola data pengguna dengan mudah untuk mendukung pengelolaan kesehatan yang lebih baik.</p>
                    <!-- Menambahkan teks tambahan jika perlu -->
                    <p>Anda dapat melakukan berbagai tugas penting seperti mengelola reservasi, memeriksa rekap data, dan melakukan pengaturan akun.</p>                    
                    
                </div>

                <img src="{{ asset('assets/images/ibu-hamil.png') }}" alt="Ibu Hamil" class="ibu-hamil" />
            </div>





        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>


</html>
