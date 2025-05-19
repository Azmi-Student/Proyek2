<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}""> <!-- style css -->
        <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/svg+xml">
        <title>MamaCare</title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> <!-- font popins -->
    </head>
    <body>
        <div class="container"> <!-- KONTAINER -->
            <!-- NAVBAR -->
            <nav>
                <div class="nav-logo"> <!-- NAVBAR LOGO -->
                    <div class="logo-img">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" class="logo-spin">
                    </div>
                    <div class="logo-tag">
                        <h4>MamaCare</h4>
                    </div>
                </div>
                
                <div class="nav-menu"> <!-- NAVBAR LIST MENU -->
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#tentang">TENTANG</a></li>
                        <li><a href="#fitur">FITUR</a></li>
                        <li><a href="#layanan">LAYANAN</a></li>
                        <li><a href="#artikel">ARTIKEL</a></li>
                        <li><a href="#bantuan">BANTUAN</a></li>
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#footer">FOOTER</a></li>
                    </ul>
                    <div class="btn-login">
                        <button>Masuk</button>
                        <div class="btn-bg-lgn"></div>
                    </div>
                    <div class="btn-daftar">
                        <button>Daftar</button>
                        <div class="btn-bg-dft"></div>
                    </div>
                </div>
            </nav>
            
            <!-- HERO SECTION -->
            <div class="hero">
                <div id="text" class="fade-in-up">
                    <h2>Inovasi digital untuk asisten perawatan kesehatan fase kehamilan ibu hingga pasca persalinan</h2>
                    <div class="btn-hero">
                        <button>Get started</button>
                        <div class="btn-bg-hero"></div>
                    </div>
                </div>
                <div id="maskot" class="fade-in-up">
                    <div class="doctor">
                        <img src="{{ asset('assets/images/icon_docter.svg') }}" alt="doctor-mascot">
                    </div>
                </div>
                <div class="panel">
                    <img src="{{ asset('assets/images/hero-panel.svg') }}" alt="panel">
                </div>
            </div>
            
            <div class="wave1"> <!-- POLA WAVE 1 -->
                <img src="{{ asset('assets/images/wave_1.svg') }}" alt="wave 1">
            </div>
            
            <!-- TENTANG -->
            <div class="tentang" id="tentang">
                <div class="pola1">
                    <img src="{{ asset('assets/images/pola1.svg') }}" alt="pola">
                </div>
                <div class="love-spin1">
                    <img src="{{ asset('assets/images/lovespin1.svg') }}" alt="pola" class="lovespin1">
                </div>
                <!-- KONTEN ABOUT -->
                <div class="konten fade-in-up">
                    <div class="konten-kiri">
                        <h4>MamaCare</h4>
                        <ul>
                            <li><a href="#">Apa itu MamaCare?</a></li>
                            <li><a href="#about">Latar belakang</a></li>
                            <li><a href="#project">Tim pengembang</a></li>
                            <li><a href="#contact">Kebijakan privasi</a></li>
                        </ul>
                    </div>
                    <div class="konten-kanan">
                        <p>
                            MamaCare adalah aplikasi yang dirancang untuk membantu ibu hamil dalam menjaga kesehatan kandungan ibu secara optimal. Aplikasi ini berfokus pada penyediaan layanan kesehatan berbasis website yang memungkinkan penggunanya untuk memantau perkembangan kesehatan selama kehamilan, mendapatkan informasi nutrisi yang tepat, dan menerima pengingat otomatis untuk kontrol kesehatan serta imunisasi.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="line-bg"> <!-- GARIS PINK -->
                <div class="line"></div>
            </div>
            
            <!-- FITUR -->
            <div class="fitur" id="fitur">
                <!-- HEADER FITUR -->
                <div class="header fade-in-up">
                    <h2>Fitur Utama</h2>
                    <p>Fitur utama yang kami berikan untuk Mama sebagai bentuk komitmen dalam mewujudkan tools rekomendasi
                        perawatan kesehatan kehamilan ibu</p>
                </div>

                <div class="pola2">
                    <img src="{{ asset('assets/images/pola2.svg') }}" alt="pola">
                </div>
                <div class="lovespin2">
                    <img src="{{ asset('assets/images/lovespin2.svg') }}" alt="pola" class="spin">
                </div>
                <div class="konten-fitur fade-in-up">
                    <div class="fitur">
                        <div class="circular"></div>
                        <h3>Kalender Kehamilan</h3>
                        <p>Pantau setiap tahap perkembangan janin dengan informasi yang sesuai usia kehamilan.</p>
                    </div>
                    <div class="fitur">
                        <div class="circular"></div>
                        <h3>Jadwal Check-Up</h3>
                        <p>Atur dan kelola jadwal pemeriksaan kehamilan agar tidak terlewat.</p>
                    </div>
                    <div class="fitur">
                        <div class="circular"></div>
                        <h3>Pengingat Check-Up</h3>
                        <p>Notifikasi otomatis untuk memastikan ibu tidak melewatkan kontrol kesehatan penting.</p>
                    </div>
                    <div class="fitur">
                        <div class="circular"></div>
                        <h3>Panduan Nutrisi</h3>
                        <p>Rekomendasi makanan sehat untuk mendukung kesehatan ibu dan perkembangan janin.</p>
                    </div>
                    <div class="fitur">
                        <div class="circular"></div>
                        <h3>Tanya Dokter</h3>
                        <p>Dapatkan jawaban langsung dari tenaga medis profesional kapan saja.</p>
                    </div>
                    <div class="fitur">
                        <div class="circular"></div>
                        <h3>Komunitas Ibu Hamil</h3>
                        <p>Berbagi pengalaman dan mendapatkan dukungan dari sesama ibu hamil dalam forum interaktif.</p>
                    </div>
                </div>
            </div>
            
            <div class="wave2"> <!-- POLA WAVE 2 -->
                <img src="{{ asset('assets/images/wave_2.svg') }}" alt="wave 2">
            </div>

            <!-- LAYANAN -->
            <div class="layanan" id="layanan">
                <!-- HEADER LAYANAN -->
                <div class="header fade-in-up">
                    <h2>Mengapa MamaCare Penting untuk Kesehatan Kehamilan Mama?</h2>
                    <p>Nikmati kemudahan memantau kehamilan dengan layanan terpercaya untuk kesehatan ibu dan bayi!</p>
                </div>
                
                <div class="konten">
                    <div class="konten-kanan">
                        <div class="img-layanan">
                            <div class="img-layanan1"><img src="{{ asset('assets/images/layanan-img1.svg') }}" alt="" class="fade-in-up"></div>
                            <div class="img-layanan2"><img src="{{ asset('assets/images/layanan-img2.svg') }}" alt="" class="fade-in-up"></div>
                            <div class="img-layanan3"><img src="{{ asset('assets/images/layanan-img3.svg') }}" alt="" class="fade-in-up"></div>
                            <div class="img-layanan4"><img src="{{ asset('assets/images/layanan-img4.svg') }}" alt="" class="fade-in-up"></div>
                            <div class="img-layanan5"><img src="{{ asset('assets/images/layanan-img5.svg') }}" alt="" class="fade-in-up" id="layanan-spin1"></div>
                            <div class="img-layanan6"><img src="{{ asset('assets/images/layanan-img5.svg') }}" alt="" class="fade-in-up" id="layanan-spin2"></div>
                            <div class="img-layanan7"><img src="{{ asset('assets/images/layanan-img5.svg') }}" alt="" class="fade-in-up" id="float"></div>
                        </div>
                    </div>
                    <div class="konten-kiri fade-in-up">
                        <div class="layanan-info">
                            <div class="circular-check"></div>
                            <div class="ktn-layanan">
                                <h3>Membantu Ibu Hamil Tetap Sehat</h3>
                                <p>Pantau perkembangan kehamilan dengan mudah dan dapatkan rekomendasi kesehatan yang akurat.</p>
                            </div>
                        </div>
                        <div class="layanan-info">
                            <div class="circular-check"></div>
                            <div class="ktn-layanan">
                                <h3>Akses Informasi Nutrisi yang Tepat</h3>
                                <p>Dapatkan panduan nutrisi sesuai kebutuhan kehamilan untuk mendukung tumbuh kembang janin.</p>
                            </div>
                        </div>
                        <div class="layanan-info">
                            <div class="circular-check"></div>
                            <div class="ktn-layanan">
                                <h3>Pengingat Otomatis untuk Kontrol dan Imunisasi</h3>
                                <p>Tidak perlu khawatir lupa jadwal pemeriksaan dan imunisasi penting selama kehamilan.</p>
                            </div>
                        </div>
                        <div class="layanan-info">
                            <div class="circular-check"></div>
                            <div class="ktn-layanan">
                                <h3>Meningkatkan Kepercayaan Diri Ibu</h3>
                                <p>Dengan informasi yang tepat, ibu hamil dapat merasa lebih tenang dan siap menghadapi setiap tahap kehamilan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line2-bg"> <!-- GARIS PUTIH -->
                <div class="line2"></div>
            </div>

            <div class="info">
                <!-- HEADER KONTAK -->
                <div class="header fade-in-up">
                    <h2>Mengapa MamaCare Pilihan Terbaik untuk Ibu Hamil?</h2>
                    <p>Jaga kesehatan kehamilan dengan aplikasi yang menyediakan pemantauan lengkap, informasi nutrisi, dan pengingat otomatis untuk perawatan optimal!</p>
                </div>

                <div class="konten-info fade-in-up">
                    <div class="info">
                        <div class="circular"></div>
                        <h3>Pemantauan Kehamilan Akurat</h3>
                        <p>Catat dan pantau perkembangan janin dengan fitur yang mudah digunakan.</p>
                    </div>
                    <div class="info">
                        <div class="circular"></div>
                        <h3>Informasi Nutrisi Tepat</h3>
                        <p>Dapatkan rekomendasi makanan sehat sesuai dengan usia kehamilan Anda.</p>
                    </div>
                    <div class="info">
                        <div class="circular"></div>
                        <h3>Pengingat Jadwal Medis</h3>
                        <p>Tidak perlu khawatir lupa kontrol rutin dan imunisasi penting.</p>
                    </div>
                    <div class="info">
                        <div class="circular"></div>
                        <h3>Akses Cepat ke Artikel Kesehatan</h3>
                        <p>Informasi terpercaya dari sumber medis untuk memastikan kehamilan sehat.</p>
                    </div>
                    <div class="info">
                        <div class="circular"></div>
                        <h3>Komunitas Ibu Hamil</h3>
                        <p>Berbagi pengalaman dan mendapatkan dukungan dari sesama ibu hamil.</p>
                    </div>
                    <div class="info">
                        <div class="circular"></div>
                        <h3>Fitur Fleksibel & Personal</h3>
                        <p>Sesuaikan preferensi dan kebutuhan kehamilan Anda dengan fitur yang dapat disesuaikan.</p>
                    </div>
                </div>
            </div>

            <div class="wave3"> <!-- POLA WAVE 3 -->
                <img src="{{ asset('assets/images/wave_3.svg') }}" alt="">
            </div>


            <!-- ARTIKEL -->
            <div class="artikel-page" id="artikel">
                <div class="kotak">
                    <div class="kotak1"><img src="{{ asset('assets/images/decor1.svg') }}" alt="" class="decor1 slide-down delay-1"></div>
                    <div class="kotak1"><img src="{{ asset('assets/images/decor2.svg') }}" alt="" class="decor2 slide-down delay-2"></div>
                    <div class="kotak1"><img src="{{ asset('assets/images/decor3.svg') }}" alt="" class="decor3 slide-down delay-3"></div>
                    <div class="kotak1"><img src="{{ asset('assets/images/decor4.svg') }}" alt="" class="decor4 slide-down delay-4"></div>

                    <div class="kotak2"><img src="{{ asset('assets/images/decor4.svg') }}" alt="" class="decor1 slide-down delay-4"></div>
                    <div class="kotak2"><img src="{{ asset('assets/images/decor6.svg') }}" alt="" class="decor2 slide-down delay-3"></div>
                    <div class="kotak2"><img src="{{ asset('assets/images/decor7.svg') }}" alt="" class="decor3 slide-down delay-2"></div>
                    <div class="kotak2"><img src="{{ asset('assets/images/decor8.svg') }}" alt="" class="decor4 slide-down delay-1"></div>
                </div>

                <!-- HEADER ARTIKEL -->
                <div class="header fade-in-up">
                    <h2>MamaCare Artikel</h2>
                    <p>Tambah pengetahuan dalam menjaga dan merawat kehamilan</p>
                </div>

                <div class="artikel">
                    <div class="artikel-card">
                        <div class="card-bg"></div>
                        <div class="card">
                            <div class="img-card">
                                <img src="{{ asset('assets/images/artikel-img1.svg') }}" alt="">
                            </div>
                            <div class="tag">
                                <div class="dot-tag"></div>
                                <img src="{{ asset('assets/images/artikel-tag-img.svg') }}" alt="tag">
                                <p>Artikel</p>
                            </div>
                            <div class="deskripsi-artikel">
                                <h3>Alasan Ngidam Saat Hamil dan Tips Menghadapinya</h3>
                                <p>Ngidam merupakan hal yang umum dialami oleh setiap wanita di awal masa kehamilan. Meskipun belum diketahui penyebabnya, terdapat beberapa faktor yang bisa menjadi alasan mengapa ibu hamil tiba-tiba ingin mengonsumsi makanan tertentu.</p>
                            </div>
                            <div class="line"></div>
                            <div class="timestamp">
                                <img src="{{ asset('assets/images/artikel-clock-img.svg') }}" alt="clock">
                                <p>12 Mei 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="artikel-card">
                        <div class="card-bg"></div>
                        <div class="card">
                            <div class="img-card">
                                <img src="{{ asset('assets/images/artikel-img2.svg') }}" alt="">
                            </div>
                            <div class="tag">
                                <div class="dot-tag"></div>
                                <img src="{{ asset('assets/images/artikel-tag-img.svg') }}" alt="tag">
                                <p>Artikel</p>
                            </div>
                            <div class="deskripsi-artikel">
                                <h3>Alasan Ngidam Saat Hamil dan Tips Menghadapinya</h3>
                                <p>Ngidam merupakan hal yang umum dialami oleh setiap wanita di awal masa kehamilan. Meskipun belum diketahui penyebabnya, terdapat beberapa faktor yang bisa menjadi alasan mengapa ibu hamil tiba-tiba ingin mengonsumsi makanan tertentu.</p>
                            </div>
                            <div class="line"></div>
                            <div class="timestamp">
                                <img src="{{ asset('assets/images/artikel-clock-img.svg') }}" alt="clock">
                                <p>12 Mei 2025</p>
                            </div>
                        </div>
                    </div>
                    <div class="artikel-card">
                        <div class="card-bg"></div>
                        <div class="card">
                            <div class="img-card">
                                <img src="{{ asset('assets/images/artikel-img3.svg') }}" alt="">
                            </div>
                            <div class="tag">
                                <div class="dot-tag"></div>
                                <img src="{{ asset('assets/images/artikel-tag-img.svg') }}" alt="tag">
                                <p>Artikel</p>
                            </div>
                            <div class="deskripsi-artikel">
                                <h3>Alasan Ngidam Saat Hamil dan Tips Menghadapinya</h3>
                                <p>Ngidam merupakan hal yang umum dialami oleh setiap wanita di awal masa kehamilan. Meskipun belum diketahui penyebabnya, terdapat beberapa faktor yang bisa menjadi alasan mengapa ibu hamil tiba-tiba ingin mengonsumsi makanan tertentu.</p>
                            </div>
                            <div class="line"></div>
                            <div class="timestamp">
                                <img src="{{ asset('assets/images/artikel-clock-img.svg') }}" alt="clock">
                                <p>12 Mei 2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-art fade-in-up">
                    <div class="btn-selengkapnya">
                        <button>Selengkapnya</button>
                        <div class="btn-bg-art"></div>
                    </div>
                </div>

                <div class="artikel-img">
                    <img src="{{ asset('assets/images/mama-anak.svg') }}" alt="" class="img1">
                </div>
                <div class="artikel-img">
                    <img src="{{ asset('assets/images/fly-love.svg') }}" alt="" class="img2 fly-up">
                </div>
            </div>
            
            <div class="wave4"> <!-- POLA WAVE 4 -->
                <img src="{{ asset('assets/images/wave_4.svg') }}" alt="">
            </div>
            <!-- BANTUAN -->
            <div class="bantuan fade-in-up" id="bantuan">
                <div class="bantuan-kanan">
                    <div class="bantuan-img1"><img src="{{ asset('assets/images/bantuan-img1.svg') }}" alt=""></div>
                    <div class="bantuan-img2"><img src="{{ asset('assets/images/bantuan-img2.svg') }}" alt="" class="up-down1"></div>
                    <div class="bantuan-img3"><img src="{{ asset('assets/images/bantuan-img3.svg') }}" alt="" class="up-down3"></div>
                </div>
                <div class="bantuan-kiri">
                    <h3>Butuh bantuan?</h3>
                    <p>Kini aduan layanan kesehatan kehamilan dapat dilakukan secara online. MamaCare hadir sebagai bentuk komitmen dalam mewujudkan Generasi Emas yang Sehat. Sampaikan keluhan Mama melalui fitur yang tersedia, MamaCare akan menanggapi segera.</p>
                    <div class="btn1">
                        <div class="btn-manual-book">
                            <button>Manual Book</button>
                            <div class="btn-bg-mb"></div>
                        </div>
                    </div>
                    <div class="btn1">
                        <div class="btn-manual-book">
                            <button>WhatsApp</button>
                            <div class="btn-bg-mb"></div>
                        </div>
                    </div>
                    <div class="btn1">
                        <div class="btn-manual-book">
                            <button>Email</button>
                            <div class="btn-bg-mb"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line2-bg"> <!-- GARIS WHITE -->
                <div class="line2"></div>
            </div>
            
            <div class="form-lp">
                <!-- FORM REGISTRASI LANDING PAGE -->
                <h2 class="fade-in-up">Yuk daftar sekarang</h2>
                <div class="form fade-in-up">
                    <form action="">
                        <input type="text" placeholder="Email">
                    </form>
                </div>
                <div class="btn-form fade-in-up">
                    <button>Daftar</button>
                    <div class="btn-bg-form"></div>
                </div>
                <div class="form-img1"><img src="{{ asset('assets/images/balon-kiri.svg') }}" alt="" class="up-down1"></div>
                <div class="form-img2"><img src="{{ asset('assets/images/balon-tengah.svg') }}" alt="" class="up-down2"></div>
                <div class="form-img3"><img src="{{ asset('assets/images/balon-kanan.svg') }}" alt="" class="up-down3"></div>
                <div class="form-img4"><img src="{{ asset('assets/images/teddy-bear.svg') }}" alt=""></div>
            </div>
            
            <div class="wave5"> <!-- POLA WAVE 5 -->
                <img src="{{ asset('assets/images/wave_5.svg') }}" alt="">
            </div>

            <!-- FAQ -->
            <div class="faq" id="faq">
            <!-- HEADER FAQ -->
                <div class="header fade-in-up">
                    <h2>Pertanyaan Terkait Aplikasi MamaCare</h2>
                    <p>Temukan jawaban dari pertanyaan yang sering muncul</p>
                </div>

                <div class="faq-container fade-in-up">
                    <div class="faq-item">
                        <div class="faq-question">
                            Siapa yang dapat menggunakan aplikasi MamaCare?
                            <img src="{{ asset('assets/images/chevron.svg') }}" alt="">
                        </div>
                        <div class="faq-answer">Aplikasi MamaCare dapat digunakan oleh semua wanita yang sedang merencanakan kehamilan, ibu hamil, ibu menyusui, serta orang tua yang ingin memantau tumbuh kembang dan imunisasi anak mereka.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            Bagaimana cara menggunakan aplikasi MamaCare?
                            <img src="{{ asset('assets/images/chevron.svg') }}" alt="">
                        </div>
                        <div class="faq-answer">Setelah melakukan pendaftaran, pengguna dapat mengisi data kehamilan atau anak, lalu mulai menggunakan fitur-fitur seperti kalender kehamilan, pengingat kontrol, informasi nutrisi, dan notifikasi imunisasi secara otomatis.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            Apakah saya akan mendapatkan pengingat untuk jadwal kontrol kehamilan dan imunisasi anak saya?
                            <img src="{{ asset('assets/images/chevron.svg') }}" alt="">
                        </div>
                        <div class="faq-answer">Ya, MamaCare menyediakan pengingat otomatis untuk jadwal kontrol kehamilan, pemeriksaan kandungan, serta jadwal imunisasi anak berdasarkan usia dan data yang telah Anda masukkan.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            Apakah informasi kesehatan saya aman di MamaCare?
                            <img src="{{ asset('assets/images/chevron.svg') }}" alt="">
                        </div>
                        <div class="faq-answer">Ya. Data pengguna dienkripsi dan disimpan dengan protokol keamanan terbaik. MamaCare berkomitmen menjaga kerahasiaan dan privasi informasi pribadi serta kesehatan pengguna.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            Bagaimana cara menghubungi tim dukungan jika saya mengalami masalah dengan aplikasi?
                            <img src="{{ asset('assets/images/chevron.svg') }}" alt="">
                        </div>
                        <div class="faq-answer">Anda dapat menghubungi tim dukungan melalui menu "Bantuan" di dalam aplikasi, atau langsung kirim email ke mamacareplus05@gmail.com. Tim kami siap membantu Anda setiap hari kerja.</div>
                    </div>
                </div>
            </div>
            
            <div class="wave6"> <!-- POLA WAVE 6 -->
                <img src="{{ asset('assets/images/wave_6.svg') }}" alt="">
            </div>

            <!-- FOOTER -->
            <footer id="footer">
                <div class="footer-kiri fade-in-up">
                    <div class="footer-logo">
                        <div class="logo-img">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" class="logo-spin">
                        </div>
                        <div class="logo-tag">
                            <h2>MamaCare</h2>
                        </div>
                    </div>
                    <p>Politeknik Negeri Indramayu</p>
                    <p>Jl. Lohbener Lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252</p>
                </div>
                <div class="footer-tengah fade-in-up">
                    <h3>Site Map</h3>
                    <div class="footer-menu">
                        <div class="menu-kiri">
                            <ul>
                                <li><a href="">Tentang kami</a></li>
                                <li><a href="">Kebijakan privasi</a></li>
                                <li><a href="">Karier</a></li>
                                <li><a href="">Hubungi kami</a></li>
                                <li><a href="">Visi kami</a></li>
                            </ul>
                        </div>
                        <div class="menu-kanan">
                            <ul>
                                <li><a href="">Blog dan berita</a></li>
                                <li><a href="">Pusat bantuan</a></li>
                                <li><a href="">Masukkan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-kanan fade-in-up">
                    <h3>Kunjungan</h3>

                    <div class="sosmed">
                        <img src="{{ asset('assets/images/instagram.svg') }}" alt="">
                        <img src="{{ asset('assets/imagesemail.svg') }}" alt="">
                        <img src="{{ asset('assets/images/youtube.svg') }}" alt="">
                        <img src="{{ asset('assets/images/facebook.svg') }}" alt="">
                    </div>
                </div>
            </footer>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in-up');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } else {
                    entry.target.classList.remove('show'); // agar bisa diulang saat scroll naik-turun
                }
                });
            }, {
                threshold: 0.1
            });

            elements.forEach(el => observer.observe(el));
            });
        </script>

        <script>
            const questions = document.querySelectorAll('.faq-question');

            questions.forEach((question) => {
                question.addEventListener('click', () => {
                    const answer = question.nextElementSibling;
                    const isOpen = question.classList.contains('active');

                    // Tutup semua
                    document.querySelectorAll('.faq-answer').forEach(ans => ans.style.display = 'none');
                    document.querySelectorAll('.faq-question').forEach(q => q.classList.remove('active'));

                    // Buka jika sebelumnya tidak terbuka
                    if (!isOpen) {
                        answer.style.display = 'block';
                        question.classList.add('active');
                    }
                });
            });
        </script>

        <script>
            const elements = document.querySelectorAll('.slide-down');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                } else {
                    entry.target.classList.remove('active');
                }
                });
            }, { threshold: 0.2 });

            elements.forEach(el => observer.observe(el));
        </script>
    </body>
</html>