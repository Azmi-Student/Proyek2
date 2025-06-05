<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tanya Dokter</title>
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tanya-dokter.css') }}">
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

            <a href="{{ url('/') }}" class="sidebar-link">
                <div class="sidebar-item">
                    <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home Icon" class="sidebar-icon" />
                    <span class="sidebar-text">Home</span>
                </div>
            </a>


            <div class="sidebar-item active">
                <img src="{{ asset('assets/images/icon-pesan-active.png') }}" alt="Tanya Dokter Icon"
                    class="sidebar-icon" />
                <span class="sidebar-text">Tanya Dokter</span>
            </div>

            <a href="{{ url('/pengaturan') }}" class="sidebar-link">
                <div class="sidebar-item">
                    <img src="{{ asset('assets/images/icon-pengaturan.png') }}" alt="Pengaturan Icon"
                        class="sidebar-icon" />
                    <span class="sidebar-text">Pengaturan</span>
                </div>
            </a>
        </div>

        <div class="right-panel">
            <div class="tanya-dokter-box">
                <div class="tanya-dokter-header">
                    <h2 class="tanya-dokter-title">Tanya Dokter</h2>
                    <button class="btn-kembali" onclick="window.location.href='{{ url('/') }}'">Kembali</button>
                </div>
                <div class="tanya-dokter-line"></div>

                <div class="doctor-list">
                    @foreach ($dokters as $dokter)
                        <div class="doctor-item" data-id="{{ $dokter->id }}">
                            <img src="{{ asset('assets/images/icon-dokter.png') }}" alt="Dokter {{ $dokter->name }}"
                                class="doctor-avatar" />
                            <div class="doctor-info">
                                <p class="doctor-name">{{ $dokter->name }}</p>
                                <p class="doctor-description">Dokter spesialis kehamilan</p>
                                <!-- Deskripsi bisa disesuaikan -->
                            </div>
                            <span class="doctor-time">{{ $dokter->available_time ?? '09:00' }}</span>
                            <!-- Waktu yang tersedia, bisa disesuaikan -->
                        </div>
                    @endforeach
                </div>


            </div>

            <div class="chat-panel" id="chat-panel">
                <div class="chat-header">
                    <p id="doctor-name">Chat dengan Dr. [Nama Dokter]</p>
                    <button class="close-chat-btn" id="close-chat-btn">X</button>
                </div>
                <div class="chat-body" id="chat-body">
                    <!-- Pesan chat akan muncul di sini -->
                </div>
                <div class="chat-input">
                    <input type="text" id="chat-message" placeholder="Ketik pesan...">
                    <button id="send-message">Kirim</button>
                </div>
            </div>

        </div>




    </div>
</body>





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('assets/js/tanya-dokter.js') }}"></script>

</html>
