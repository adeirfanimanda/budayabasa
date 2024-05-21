<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ $title }} - {{ $app->description_app }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="{{ $app->description_app }}">
    <link rel="icon" type="image/x-icon"
        href="@if (Storage::disk('public')->exists('logo-aplikasi')) {{ asset('storage/' . $app->logo) }} @else {{ asset('assets/img/logo-aplikasi/logo.png') }} @endif">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('homepage/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/style.css') }}">
    <style>
        .btn-outline-custom {
            color: white;
            background-color: #3c3c3c;
            text-transform: none;
            font-size: 14px;
        }

        .btn-outline-custom:hover {
            color: white;
            background-color: #696CFF;
        }

        @media screen and (min-width:1000px) {
            .height-300 {
                height: 270px
            }
        }

        @media screen and (min-width:768px) and (max-width:1000px) {
            .height-300 {
                height: 400px
            }
        }
    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('homepage/images/logo-light.svg') }}" alt="Logo">
            </a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item">
                        <a href="#home-section" class="nav-link">
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#menu-aplikasi" class="nav-link">
                            <span>Menu Aplikasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#layanan" class="nav-link">
                            <span>Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kamus" class="nav-link">
                            <span>Kamus</span>
                        </a>
                    </li>
                    @if (Auth::check())
                        @if (auth()->user()->is_admin)
                            <li class="nav-item">
                                <a href="/admin/dashboard" class="nav-link">
                                    <span><i class="bx bx-desktop" style="font-size:16px"></i>&nbsp;Dashboard</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/materi" class="nav-link">
                                    <span><i class="bx bx-book-content" style="font-size:16px"></i>&nbsp;Materi</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link">
                                <span><i class="bx bx-log-in-circle" style="font-size:16px"></i>&nbsp;Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">
                                <span><i class="bx bx-user" style="font-size:16px"></i>&nbsp;Daftar</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}

    {{-- Header --}}
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight d-none d-lg-block order-md-last img"
                            style="background-image:url(homepage/images/slider.jpg)">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <h1 class="mb-4 mt-3">Aplikasi Belajar <span>Bahasa Indramayu</span> dengan Mudah</h1>
                                <p>
                                    <a href="/register" class="btn btn-primary py-3 px-4"
                                        style="color:#fff!important">Gabung Sekarang
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- /Header --}}

    {{-- Informasi --}}
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row d-md-flex align-items-center">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text"><strong class="number"
                                data-number="{{ $users }}">0</strong><span>Total Pengguna</span></div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text"><strong class="number"
                                data-number="{{ $quizzes }}">{{ $quizzes }}</strong><span>Total
                                Latihan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text"><strong class="number"
                                data-number="{{ $threads }}">{{ $threads }}</strong><span>Threads
                                Forum</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- /Informasi --}}

    {{-- Menu Aplikasi --}}
    <section class="ftco-section ftco-no-pb" id="menu-aplikasi">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h2 class="mb-2">Menu Aplikasi</h2>
                    <p>Terdapat 6 menu yang bisa digunakan pengguna. Diantaranya sebagai berikut.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="resume-wrap ftco-animate height-300">
                        <span class="date">Kamus Bahasa Indramayu</span>
                        <p class="mt-4">Pengguna dapat mencari kosakata bahasa Indramayu dengan memasukkan kata
                            kunci berdasarkan Ngoko ataupun Krama.</p>
                    </div>
                    <div class="resume-wrap ftco-animate height-300"><span class="date">Latihan</span>
                        <p class="mt-4">Dalam menu 'Latihan' terdapat soal-soal yang bisa dikerjakan untuk melatih
                            pemahaman tentang bahasa Indramayu. Latihan ini bisa dikerjakan secara berulang-ulang.</p>
                    </div>
                    <div class="resume-wrap ftco-animate height-300"><span class="date">Forum</span>
                        <p class="mt-4">Forum digunakan untuk berdiskusi jika terdapat masalah mengenai materi yang
                            ada. Setiap pengguna bisa mengajukan pertanyaan dan nantinya pertanyaan tersebut bisa
                            dijawab oleh pengguna lain.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="resume-wrap ftco-animate height-300"><span class="date">Materi</span>
                        <p class="mt-4">Pengguna dapat melihat dan mengunduh materi pembelajaran bahasa Indramayu.
                        </p>
                    </div>
                    <div class="resume-wrap ftco-animate height-300"><span class="date">Nilai</span>
                        <p class="mt-4">Setiap selesai menjawab latihan, pengguna dapat melihat nilainya langsung di
                            menu 'Nilai'. Pengguna juga dapat melihat pertanyaan mana saja yang jawabannya benar dan
                            juga salah. Selain itu, pengguna juga bisa menghapus riwayat mengerjakan latihannya.</p>
                    </div>
                    <div class="resume-wrap ftco-animate height-300"><span class="date">Dokumentasi</span>
                        <p class="mt-4">Dalam dokumentasi, pengguna dapat melihat tutorial bagaimana cara menggunakan
                            aplikasi. Mulai dari membuat akun, cara menggunakan fitur kamus, melihat dan mengunduh
                            materi,
                            mengerjakan latihan, melihat nilai latihan,
                            mengubah kata sandi, dan masih banyak lagi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- /Menu Aplikasi --}}

    {{-- Layanan --}}
    <section class="ftco-section" id="layanan" style="padding: 0;">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-2">Layanan</h2>
                    <p>Berikut layanan yang bisa digunakan oleh pengguna.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a class="services-1">
                        <span class="icon"><i class="bx bx-book"></i></span>
                        <div class="desc">
                            <h3 class="mb-5">Kamus Bahasa Indramayu</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a class="services-1">
                        <span class="icon"><i class="bx bx-book-content"></i></span>
                        <div class="desc">
                            <h3 class="mb-5">Akses Materi</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a class="services-1">
                        <span class="icon"><i class="bx bx-joystick"></i></span>
                        <div class="desc">
                            <h3 class="mb-5">Latihan dan Evaluasi</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a class="services-1">
                        <span class="icon"><i class="bx bx-play-circle"></i></span>
                        <div class="desc">
                            <h3 class="mb-5">Audio Bahasa Indramayu</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a class="services-1">
                        <span class="icon"><i class="bx bx-message-dots"></i></span>
                        <div class="desc">
                            <h3 class="mb-5">Dukungan Komunitas</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a class="services-1">
                        <span class="icon"><i class="bx bx-infinite"></i></span>
                        <div class="desc">
                            <h3 class="mb-5">Akses Selamanya</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- /Layanan --}}

    {{-- Footer --}}
    <footer class="ftco-footer ftco-section" style="padding: 0; margin-top: 6em;">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Tentang Kami</h2>
                        <p>{{ $app->description_app }}</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate">
                                <a href="https://www.twitter.com">
                                    <span class="bx bxl-twitter"></span>
                                </a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://www.facebook.com">
                                    <span class="bx bxl-facebook"></span>
                                </a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://www.instagram.com">
                                    <span class="bx bxl-instagram"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="/"><span class="bx bx-right-arrow-alt mr-2"></span>Home</a></li>
                            <li>
                                <a href="#menu-aplikasi">
                                    <span class="bx bx-right-arrow-alt mr-2"></span>Menu Aplikasi
                                </a>
                            </li>
                            <li>
                                <a href="/kamus">
                                    <span class="bx bx-right-arrow-alt mr-2"></span>Kamus
                                </a>
                            </li>
                            @if (Auth::check())
                                @if (auth()->user()->is_admin)
                                    <li>
                                        <a href="/admin/dashboard">
                                            <span class="bx bx-right-arrow-alt mr-2"></span>Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/laporan">
                                            <span class="bx bx-right-arrow-alt mr-2"></span>Laporan
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="/materi"><span class="bx bx-right-arrow-alt mr-2"></span>Materi</a>
                                    </li>
                                    <li>
                                        <a href="/quiz"><span class="bx bx-right-arrow-alt mr-2"></span>Quiz</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Layanan</h2>
                        <ul class="list-unstyled">
                            <li>
                                <a href="/materi">
                                    <span class="bx bx-right-arrow-alt mr-2"></span>
                                    Audio Bahasa Indramayu
                                </a>
                            </li>
                            <li>
                                <a href="/docs/v1">
                                    <span class="bx bx-right-arrow-alt mr-2"></span>
                                    Dokumentasi
                                </a>
                            </li>
                            <li>
                                <a href="/view/discuss">
                                    <span class="bx bx-right-arrow-alt mr-2"></span>
                                    Forum
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="bx bx-map mr-2"></span>
                                    <span class="text">Jl. MT Haryono No. 56, Sindang, Kec. Sindang, Kabupaten
                                        Indramayu, Jawa Barat 45222
                                    </span>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="bx bx-phone mr-2"></span>
                                        <span class="text">(0234) 274190</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="bx bx-envelope mr-2"></span>
                                        <span class="text">dikbudindramayu@gmail.com</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- /Footer --}}

    {{-- Laoding --}}
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#696cff" />
        </svg>
    </div>
    {{-- /Loading --}}

    <script src="{{ asset('homepage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('homepage/js/popper.min.js') }}"></script>
    <script src="{{ asset('homepage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('homepage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('homepage/js/aos.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('homepage/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('homepage/js/main.js') }}"></script>
</body>

</html>
