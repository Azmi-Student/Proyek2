<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kalender Kehamilan</title>
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
                <div class="pregnancy-box">
                    <div class="kalender-kehamilan-header">
                        <h2 class="kalender-kehamilan-title">Kalender Kehamilan</h2>
                        <button class="btn-kembali"
                            onclick="window.location.href='{{ url('/') }}'">Kembali</button>
                    </div>
                    <div class="kalender-kehamilan-line"></div>


                    <div class="kalender-kehamilan-card">
                        <div class="kalender-kehamilan-card-header">
                            <div>
                                <h3 class="judul-usia-kehamilan">Isi Data Awal Kehamilan ></h3>
                                <p class="tanggal-kehamilan">-</p>
                            </div>

                            <div class="text-end">
                                <button id="btnLihatInformasi" class="btn btn-outline-info me-2" style="display: none;">
                                    👁️ Lihat Informasi
                                </button>
                                <img src="{{ asset('assets/images/icon-edit.png') }}" alt="Edit" class="edit-icon"
                                    id="btnEditData">
                            </div>

                        </div>


                        <hr class="divider-line">

                        <div class="kalender-kehamilan-card-body">
                            <div class="left-info">
                                <h2 class="angka-besar">-</h2>
                                <p class="trimester-text">-</p>
                            </div>
                            <div class="right-info">
                                <h3 class="bulan-kehamilan">-</h3>
                                <p class="hari-kehamilan">-</p>
                            </div>

                        </div>

                        <!-- Progress Bar Minggu -->
                        <div class="progress-group" data-total="42">
                            <p class="progress-label">Minggu</p>
                            <div class="progress-bar">
                                <div class="progress-fill"></div>
                                <img src="{{ asset('assets/images/icon-panda.png') }}" class="progress-icon">
                                <input type="range" min="0" max="42" value="0"
                                    class="progress-slider minggu" disabled>

                            </div>
                            <p class="progress-text"><span class="current-val">0</span> dari 42 Minggu</p>
                        </div>

                        <!-- Progress Bar Trimester -->
                        <div class="progress-group" data-total="3">
                            <p class="progress-label">Trimester</p>
                            <div class="progress-bar">
                                <div class="progress-fill"></div>
                                <img src="{{ asset('assets/images/icon-panda.png') }}" class="progress-icon">
                                <input type="range" min="0" max="3" value="0"
                                    class="progress-slider trimester" disabled>

                            </div>
                            <p class="progress-text"><span class="current-val">0</span> dari 3 Trimester</p>
                        </div>




                        <p class="kalender-kehamilan-deskripsi" id="deskripsiKehamilan">
                        </p>


                    </div>

                </div>


            </div>
        </div>

    </div>
</body>

<script>
    window.currentUserId = {{ Auth::id() }};
</script>

<script src="{{ asset('assets/js/kalender.js') }}"></script>
<script src="{{ asset('assets/js/nutrisi.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</html>
