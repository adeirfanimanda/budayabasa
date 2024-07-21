<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ $app->name_app }} - {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{ $app->name_app }} Dokumentasi">
    <link rel="icon" type="image/x-icon"
        href="@if (Storage::disk('public')->exists('logo-aplikasi')) {{ asset('storage/' . $app->logo) }} @else {{ asset('assets/img/logo-aplikasi/logo.png') }} @endif" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <script defer="defer" src="{{ asset('docs/assets/fontawesome/js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('docs/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('docs/assets/plugins/elegant_font/css/style.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('docs/assets/css/styles.css') }}">
</head>
<style>
    ::-webkit-scrollbar {
        display: none
    }
</style>

<body class="landing-page">
    <div class="page-wrapper">
        <header class="header text-center" style="border-top: 5px solid #696cff">
            <div class="container">
                <div class="branding">
                    <h1 class="logo"><span aria-hidden="true" class="icon_documents_alt icon"
                            style="color:#696cff"></span><span class="text-bold"> Dokumentasi</span></h1>
                </div>
                <div class="tagline">
                    <p>Berkembang Lebih Cepat dengan Bantuan Dokumentasi.</p>
                    <p>Temukan, Pelajari dan Kuasai.</p>
                </div>
            </div>
        </header>
        <section class="cards-section text-center">
            <div class="container">
                <h2 class="title">Getting Started is Easy!</h2>
                <div class="intro">
                    <p>Selamat Datang di {{ $app->name_app }} Dokumentasi. Silakan temukan informasi yang anda butuhkan
                        di sini.</p>
                    <div class="cta-container"><a class="btn btn-primary btn-cta" style="background-color:#696cff;"
                            href="/docs/v1/start" target="_blank"><i class="fas fa-book-open"></i>Baca Dokumentasi</a>
                    </div>
                </div>
                <div id="cards-wrapper" class="cards-wrapper row">
                    <div class="item item-green col-lg-4 col-6">
                        <div class="item-inner">
                            <div class="icon-holder"><i class="icon fa fa-paper-plane"></i></div>
                            <h3 class="title">Pendahuluan</h3>
                            <p class="intro">Bagaimana cara melakukan daftar akun?</p><a class="link"
                                href="/docs/v1/start#pendahuluan"><span></span></a>
                        </div>
                    </div>
                    <div class="item item-orange col-lg-4 col-6">
                        <div class="item-inner">
                            <div class="icon-holder"><i class="icon fa fa-book"></i></div>
                            <h3 class="title">Kamus Bahasa Indramayu</h3>
                            <p class="intro">Bagaimana cara mencari kosa kata Bahasa Indramayu?</p><a class="link"
                                href="/docs/v1/start#kamus"><span></span></a>
                        </div>
                    </div>
                    <div class="item item-purple col-lg-4 col-6">
                        <div class="item-inner">
                            <div class="icon-holder"><i class="icon fa fa-book-open"></i></div>
                            <h3 class="title">Materi</h3>
                            <p class="intro">Bagaimana cara melihat materi? Bagaimana cara mengunduh materi?</p>
                            <a class="link" href="/docs/v1/start#materi"><span></span></a>
                        </div>
                    </div>
                    <div class="item item-pink item-2 col-lg-4 col-6">
                        <div class="item-inner">
                            <div class="icon-holder"><i class="icon fa fa-gamepad"></i></div>
                            <h3 class="title">Latihan</h3>
                            <p class="intro">Bagaimana cara mengakses latihan? Bagaimana cara melihat nilai latihan?
                            </p><a class="link" href="/docs/v1/start#quiz"><span></span></a>
                        </div>
                    </div>
                    <div class="item item-primary col-lg-4 col-6">
                        <div class="item-inner">
                            <div class="icon-holder"><i class="icon fa fa-comments"></i></div>
                            <h3 class="title">Forum</h3>
                            <p class="intro">Bagaimana cara menambahkan thread? Bagaimana cara menambahkan komentar?
                            </p><a class="link" href="/docs/v1/start#forum"><span></span></a>
                        </div>
                    </div>
                    <div class="item item-blue col-lg-4 col-6">
                        <div class="item-inner">
                            <div class="icon-holder"><i class="icon fa fa-cog"></i></div>
                            <h3 class="title">Pengaturan</h3>
                            <p class="intro">Bagaimana cara mengganti username? Bagaimana cara mengganti kata sandi?
                            </p>
                            <a class="link" href="/docs/v1/start#pengaturan"><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer text-center">
        <div class="container"><small class="copyright">Copyright&nbsp;
                <script>
                    document.write((new Date).getFullYear())
                </script>&nbsp;<a href="/" class="text-decoration-none"
                    style="color: #696cff; font-weight:bold">{{ $app->name_app }}.</a>&nbsp;All rights reserved
            </small></div>
    </footer>
    <script src="{{ asset('docs/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('docs/assets/plugins/stickyfill/dist/stickyfill.min.js') }}"></script>
    <script src="{{ asset('docs/assets/js/main.js') }}"></script>
</body>

</html>
