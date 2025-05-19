<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Login Mama</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('assets/images/logo-mamacare.png') }}" alt="MamaCare Logo" class="logo" />
            <p class="text">Dukung setiap langkah kehamilanmu dengan informasi dan layanan kesehatan dari MamaCare.
            </p>
        </div>
        <div class="right-side">
            <div class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#FF3EA5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Kembali
            </div>
            <img src="{{ asset('assets/images/logo.png') }}" alt="Flower Logo" class="small-logo" />
            <div class="welcome-text">
                <h2>Selamat Datang</h2>
                <p>Silahkan mengisi informasi akun Mama!</p>
            </div>

            @if ($errors->has('email'))
                <div class="popup-overlay" id="popupOverlay">
                    <div class="login-error-popup" id="loginErrorPopup">
                        <button class="close-btn" onclick="closePopup()">&times;</button>
                        <div class="popup-body">
                            <div class="popup-text">
                                <h3>Masuk akun gagal!</h3>
                                <p>
                                    @if ($errors->first('email') == 'Email yang Mama masukkan tidak terdaftar nih. Yuk coba lagi!')
                                        Email yang Mama masukkan tidak terdaftar nih. Yuk coba lagi!
                                    @elseif ($errors->first('email') == 'Password yang Mama masukkan kurang dari 3 karakter. Yuk coba lagi!')
                                        Password yang Mama masukkan kurang dari 3 karakter. Yuk coba lagi!
                                    @elseif ($errors->first('email') == 'Password yang Mama masukkan salah. Yuk coba lagi!')
                                        Password yang Mama masukkan salah. Yuk coba lagi!
                                    @else
                                        Ada kesalahan dalam login nih. Yuk coba lagi!
                                    @endif
                                </p>
                            </div>

                            <div class="popup-img">
                                <img src="{{ asset('assets/images/login-error.png') }}" alt="Ilustrasi gagal" />
                            </div>
                        </div>
                    </div>
                </div>
            @endif




            <form class="login-form" method="POST" action="{{ url('/login') }}">
                @csrf

                <!-- Input Email -->
                <div class="form-box">
                    <input type="email" id="email" name="email" placeholder=" " required />
                    <label for="email">Masukkan Email</label>
                    <div class="form-outline"></div>
                </div>

                <!-- Input Password -->
                <div class="form-box">
                    <input type="password" id="password" name="password" placeholder=" " required />
                    <label for="password">Masukkan Password</label>
                    <div class="form-outline"></div>

                    <!-- Ikon Eye dengan SVG -->
                    <span class="eye-icon" onclick="togglePassword()">
                        <svg id="eye-icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="#FF3EA5" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
                </div>

                <p class="reset-password"><a href="#">Reset Password</a></p>

                <button type="submit" class="login-button">Masuk</button>
            </form>

            <p class="daftar-text">
                Belum punya akun?
                <a href="{{ url('/register') }}" class="daftar-link">Silahkan Daftar</a>
            </p>

            <div class="or-menu">
                <span>OR</span>
            </div>

            <a href="{{ route('auth.google') }}" class="google-button">
                <img src="{{ asset('assets/images/icon-google.png') }}" alt="Google Icon" class="google-icon">
                Lanjutkan dengan Google
            </a>
        </div>
    </div>
</body>



<script src="{{ asset('assets/js/toggle-password.js') }}"></script>
<script src="{{ asset('assets/js/close-popup.js') }}"></script>

</html>
