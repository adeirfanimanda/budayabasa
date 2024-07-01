<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ $app->name_app }} - {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="{{ $app->description_app }}">
    <link rel="icon" type="image/x-icon"
        href="@if (Storage::disk('public')->exists('logo-aplikasi')) {{ asset('storage/' . $app->logo) }} @else {{ asset('assets/img/logo-aplikasi/logo.png') }} @endif">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('homepage/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/style.css') }}">

    {{-- Style Kamus --}}
    <link rel="stylesheet" href="{{ asset('homepage/kamus/css/style.css') }}">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('homepage/images/logo-dark.svg') }}" alt="Logo">
            </a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item">
                        <a href="/#home-section" class="nav-link">
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/#menu-aplikasi" class="nav-link">
                            <span>Menu Aplikasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/#layanan" class="nav-link">
                            <span>Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#kbbi" class="nav-link">
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

    {{-- Content --}}
    <section class="ftco-section ftco-no-pb" id="kbbi" style="margin-top: 150px;">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h2 style="color: #14193F" class="mb-2">Selamat datang di Kamus Bahasa Indramayu</h2>
                    <p>Pemutakhiran terakhir: <strong>01 Januari 2024</strong></p>
                </div>
            </div>
            <div class="justify-content-center" style="margin-top: -40px;">
                <div class="justify-content-end">
                    <form action="/kamus/search">
                        <div class="input-group">
                            <input type="search" class="form-control" name="q" id="search"
                                style="border: 1px solid #d9dee3;" placeholder="Pencarian..." autocomplete="off" />
                        </div>
                    </form>
                </div>
                <!-- /Search -->
            </div>

            {{-- Footer --}}
            <footer class="content-footer footer bg-footer-theme" style="margin-top: 200px">
                <div class="d-flex justify-content-center align-items-center py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">&copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>&nbsp;<a href="/" target="_blank"
                            class="footer-link">{{ $app->name_app }}.</a>&nbsp;All rights reserved.
                    </div>
                </div>
            </footer>
            {{-- /Footer --}}
        </div>
    </section>
    {{-- /Content --}}

    {{-- Loading --}}
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
