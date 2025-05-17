<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Reservasi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dokter/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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

            <div class="sidebar-item active">
                <img src="{{ asset('assets/images/icon-pesan-active.png') }}" alt="Tanya Dokter Icon" class="sidebar-icon" />
                <span class="sidebar-text">Daftar<br>Reservasi</span>
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
                    <img src="{{ asset('assets/images/icon-bookmark.png') }}" class="icon" />
                    <img src="{{ asset('assets/images/icon-bell.png') }}" class="icon" />
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    @if (Auth::check() && Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="Profile" class="profile-pic"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            style="cursor: pointer;" />
                    @else
                        <img src="{{ asset('assets/images/profile-pic.png') }}" alt="Profile" class="profile-pic"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            style="cursor: pointer;" />
                    @endif


                </div>
            </div>

            <div class="container mt-5">
                <h2>Daftar Reservasi Pasien</h2>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Periksa</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasis as $index => $reservasi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $reservasi->nama_pasien }}</td>
                                <td>{{ $reservasi->jenis_periksa }}</td>
                                <td>{{ $reservasi->jadwal }}</td>
                                <td>{{ $reservasi->status }}</td>
                                <td>
                                    <form action="{{ route('dokter.updateStatus', $reservasi->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('POST')
                                        <select name="status" class="form-control" onchange="this.form.submit()"
                                            {{ $reservasi->status == 'Selesai' ? 'disabled' : '' }}>
                                            <option value="Belum Diajukan"
                                                {{ $reservasi->status == 'Belum Diajukan' ? 'selected' : '' }}>Belum
                                                Diajukan</option>
                                            <option value="Disetujui"
                                                {{ $reservasi->status == 'Disetujui' ? 'selected' : '' }}>Disetujui
                                            </option>
                                            <option value="Selesai"
                                                {{ $reservasi->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                            </option>
                                        </select>
                                    </form>
                                </td>

                                <td id="hasil-checkup-{{ $reservasi->id }}">
                                    <!-- Tombol input atau edit akan muncul berdasarkan status -->
                                    @if ($reservasi->status == 'Disetujui' && !$reservasi->hasil_checkup)
                                        <form action="{{ route('dokter.updateHasilCheckup', $reservasi->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('POST')
                                            <textarea name="hasil_checkup" class="form-control" placeholder="Masukkan hasil check-up"></textarea>
                                            <button type="submit" class="btn btn-success">Simpan Hasil</button>
                                        </form>
                                    @elseif ($reservasi->status == 'Selesai' && $reservasi->hasil_checkup)
                                        <form action="{{ route('dokter.updateHasilCheckup', $reservasi->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('POST')
                                            <!-- Jangan beri readonly agar bisa diedit -->
                                            <textarea name="hasil_checkup" class="form-control">{{ $reservasi->hasil_checkup }}</textarea>
                                            <button type="submit" class="btn btn-warning">Edit Hasil</button>
                                        </form>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            

            




        </div>

        <script src="{{ asset('assets/js/dokter/daftar-reservasi.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>


</html>
