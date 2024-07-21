<!DOCTYPE html>
<html lang="id">

<head>
    <title>{{ $app->name_app }} - {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Dokumentasi aplikasi {{ $app->name_app }}">
    <link rel="icon" type="image/x-icon"
        href="@if (Storage::disk('public')->exists('logo-aplikasi')) {{ asset('storage/' . $app->logo) }} @else {{ asset('assets/img/logo-aplikasi/logo.png') }} @endif" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <script defer="defer" src="{{ asset('docs/assets/fontawesome/js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('docs/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('docs/assets/plugins/prism/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('docs/assets/plugins/elegant_font/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('docs/assets/plugins/simplelightbox/simple-lightbox.min.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('docs/assets/css/styles.css') }}">
</head>

<body class="body-primary">
    <div class="page-wrapper">
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <img src="{{ asset('homepage/images/logo-light.svg') }}" alt="Logo" class="h-auto"
                        style="width: 200px;">
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/docs/v1">Beranda</a></li>
                    <li class="breadcrumb-item active">Dokumentasi</li>
                </ol>
            </div>
        </header>
        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title" style="font-weight:700"><span aria-hidden="true"
                            class="icon_documents_alt icon"></span>&nbsp;Dokumentasi</h1>
                    <div class="meta"><i class="far fa-clock"></i>&nbsp;Terakhir diperbarui: 1 Januari 2024</div>
                </div>
                <div class="doc-body row">
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="pendahuluan" class="doc-section">
                                <h2 class="section-title">Pendahuluan</h2>
                                <div class="section-block">
                                    <p>Di dalam menu pendahuluan terdapat beberapa poin penting seperti, tutorial cara
                                        melakukan registrasi dan syarat registrasi.</p>
                                </div>
                                <div class="section-block" id="registrasi">
                                    <h4 class="block-title">Bagaimana cara melakukan registrasi akun?</h4>
                                    <p>Cara melakukan registrasi sebenarnya cukup mudah. Selain melakukan registrasi
                                        secara manual, Anda juga bisa melakukan registrasi dengan menggunakan akun
                                        Google atau menghubungi admin secara langsung. Untuk melakukan registrasi
                                        manual, silahkan simak langkah-langkahnya sebagai berikut:
                                    </p>
                                    <ol class="list">
                                        <li><b>Pertama-tama</b>, silahkan kunjungi tautan <a href="/register"
                                                target="_blank"><b>Registrasi</b></a>.</li>
                                        <li><b>Kedua</b>, silahkan isi formulir yang sudah tersedia. Masukkan nama
                                            lengkap, username, email, jenis kelamin dan juga kata sandi.</li>
                                        <li><b>ketiga</b>, ceklis pada bagian <b>'Saya setuju dengan syarat &
                                                ketentuan'</b> kemudian klik tombol <b>Daftar</b>.</li>
                                    </ol>
                                    <div class="callout-block callout-success"
                                        style="margin-top:20px;background-color:#696cff">
                                        <div class="content">
                                            <p><i class="fa-solid fa-bullhorn"></i><b> Tips :</b> Jangan gunakan<i><b>
                                                        nama</b></i>,<i><b> username</b></i>,<i><b> tanggal
                                                        lahir</b></i> atau<i><b> email</b></i> sebagai kata sandi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-block" id="registrasi-google">
                                    <h4 class="block-title">Bagaimana cara melakukan registrasi dengan akun Google?</h4>
                                    <p>Untuk melakukan masuk atau registrasi dengan akun Google, silahkan simak
                                        langkah-langkahnya sebagai berikut:
                                    </p>
                                    <ol class="list">
                                        <li><b>Pertama-tama</b>, silakan kunjungi tautan <a href="/login"
                                                target="_blank"><b>Masuk</b></a>.</li>
                                        <li><b>Kedua</b>, klik tombol <b>Masuk atau Daftar dengan Google</b>.</li>
                                        <li><b>Ketiga</b>, ikuti petunjuk yang diberikan oleh Google dan pastikan Anda
                                            menyetujui syarat & ketentuan yang berlaku.</li>
                                    </ol>
                                </div>
                            </section>
                            <section id="kamus" class="doc-section">
                                <h2 class="section-title">Kamus Bahasa Indramayu</h2>
                                <div class="section-block">
                                    <p>Dalam menu Kamus, pengguna dapat mencari dan melihat kosa kata dalam bahasa
                                        Indramayu beserta artinya.</p>
                                </div>
                                <div id="search-entri" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mencari kosa kata?</h4>
                                    <p>Untuk mencari kosa kata, silakan kunjungi tautan <a href="/kamus"
                                            target="_blank"><b>ini</b></a>. Masukkan kata yang ingin dicari di kolom
                                        pencarian dan tekan tombol <b>'Cari'</b>. Anda dapat mencari dengan kata kunci
                                        dalam bahasa Ngoko, Krama, atau bahasa Indonesia.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/search-entri.png') }}"
                                            alt="cara mencari kosa kata {{ $app->name_app }}"></p>
                                </div>
                                <div id="results-entri" class="section-block">
                                    <h4 class="block-title">Bagaimana cara melihat hasil pencarian kosa kata?</h4>
                                    <p>Setelah melakukan pencarian, hasilnya akan ditampilkan di bawah kolom pencarian.
                                        Anda dapat melihat arti dari kata yang dicari beserta contohnya dalam kalimat.
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/results-entri.png') }}"
                                            alt="cara melihat hasil pencarian kosa kata {{ $app->name_app }}"></p>
                                </div>
                            </section>
                            <section id="materi" class="doc-section">
                                <h2 class="section-title">Materi</h2>
                                <div class="section-block">
                                    <p>Dalam menu materi, Pengguna dapat melihat serta mengunduh materi pembelajaran
                                        bahasa Indramayu dalam bentuk dokumen seperti PDF.</p>
                                </div>
                                <div id="akses-materi" class="section-block">
                                    <h4 class="block-title">Bagaimana cara melihat materi?</h4>
                                    <p>Untuk melihat materi, silahkan kunjungi tautan <a href="/materi"
                                            target="_blank"><b>ini</b></a>.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/materi.png') }}"
                                            alt="cara akses materi {{ $app->name_app }}"></p>
                                </div>
                                <div id="voice" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mengunduh materi?</h4>
                                    <p>Untuk mengunduh materi pembelajaran, silakan kunjungi menu materi melalui tautan
                                        <a href="/materi" target="_blank"><b>ini</b></a>. Setelah itu, pilih materi
                                        yang
                                        ingin Anda unduh dan klik tombol <b>'Unduh'</b>. Materi akan otomatis diunduh ke
                                        perangkat Anda.
                                    </p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/unduh-materi.png') }}"
                                            alt="cara unduh materi {{ $app->name_app }}"></p>
                                </div>
                            </section>
                            <section id="quiz" class="doc-section">
                                <h2 class="section-title">Latihan</h2>
                                <div class="section-block">
                                    <p>Dalam menu 'Latihan' terdapat soal-soal yang bisa dikerjakan untuk melatih
                                        pemahaman tentang bahasa Indramayu. Latihan ini bisa dikerjakan secara
                                        berulang-ulang.</p>
                                </div>
                                <div id="akses-quiz" class="section-block">
                                    <h4 class="block-title">Bagaimana cara akses latihan?</h4>
                                    <p>Untuk akses latihan, silahkan kunjungi tautan <a href="/quiz"
                                            target="_blank"><b>ini</b></a>.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/akses-latihan.png') }}"
                                            alt="cara akses latihan {{ $app->name_app }}"></p>
                                </div>
                                <div id="detail-quiz" class="section-block">
                                    <h4 class="block-title">Bagaimana cara lihat detail latihan?</h4>
                                    <p>Untuk melihat detail latihan, Anda bisa mengklik icon kecil disudut kanan atas
                                        pada Latihan.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/detail-latihan.png') }}"
                                            alt="cara lihat detail quiz {{ $app->name_app }}"></p>
                                </div>
                                <div id="akses-soal" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mengerjakan latihan?</h4>
                                    <p>Untuk mengerjakan latihan, silahkan kunjungi menu latihan terlebih dahulu melalui
                                        tautan <a href="/quiz" target="_blank"><b>ini</b></a>. Anda bisa menekan
                                        salah salah satu tombol <b>"Mulai Latihan"</b>. Untuk mengakhiri mengerjakan
                                        latihan, Anda bisa menekan tombol <b>"Selesai"</b> kemudian klik <b>"Kirim"</b>.
                                    </p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/akses-soal.png') }}"
                                            alt="cara mengerjakan soal quiz {{ $app->name_app }}"></p>
                                </div>
                                <div id="akses-nilai-quiz" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mengakses nilai latihan?</h4>
                                    <p>Untuk mengakses nilai latihan, silahkan kunjungi menu nilai melalui tautan <a
                                            href="/nilai" target="_blank"><b>ini</b></a>. Anda juga bisa melihat
                                        nilai latihan setelah mengerjakan soal latihan.</p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/nilai-latihan.png') }}"
                                            alt="cara akses soal nilai quiz {{ $app->name_app }}"></p>
                                </div>
                            </section>
                            <section id="forum" class="doc-section">
                                <h2 class="section-title">Forum</h2>
                                <div class="section-block">
                                    <p>Forum digunakan untuk berdiskusi jika terdapat masalah mengenai materi yang ada
                                        atau hal lainnya.
                                        Setiap pengguna bisa mengajukan pertanyaan dan nantinya pertanyaan tersebut bisa
                                        dijawab oleh pengguna lain melalui komentar.</p>
                                </div>
                                <div id="add-thread" class="section-block">
                                    <h4 class="block-title">Bagaimana cara menambah thread?</h4>
                                    <p>Untuk menambah thread, silahkan kunjungi tautan <a href="/view/discuss"
                                            target="_blank"><b>ini</b></a>. Setelah itu, klik tombol <b>Tambah
                                            Thread</b>. Tunggu hingga pop-up muncul. Terakhir masukkan <b>judul</b> dan
                                        <b>deskripsi</b> thread lalu tekan tombol <b>"Kirim"</b>.
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/add-thread.png') }}"
                                            alt="cara tambah thread {{ $app->name_app }}"></p>
                                </div>
                                <div id="delete-thread" class="section-block">
                                    <h4 class="block-title">Bagaimana cara menghapus thread?</h4>
                                    <p>Untuk menghapus thread, Anda bisa melihat icon kecil di sudut kanan atas pada
                                        thread. Tekan, kemudian pilih opsi <b>'Hapus'</b>. Tunggu hingga muncul pop-up
                                        konfirmasi. Setelah itu, Anda bisa klik tombol <b>'Ya, Hapus!'</b>.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/delete-thread.png') }}"
                                            alt="cara delete thread {{ $app->name_app }}"></p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/confirm-delete.png') }}"
                                            alt="pop up delete thread {{ $app->name_app }}"></p>
                                </div>
                                <div id="add-comment" class="section-block">
                                    <h4 class="block-title">Bagaimana cara menambah komentar thread?</h4>
                                    <p>Untuk menambah komentar pada thread, silahkan kunjungi menu forum terlebih
                                        dahulu melalui tautan <a href="/view/discuss" target="_blank"><b>ini</b></a>.
                                        Anda bisa pilih salah satu thread yang ingin Anda komentari. Klik tombol
                                        <b>'Tambah Komentar'</b>. Masukkan komentar Anda di formulir yang telah
                                        tersedia. Anda juga bisa membalas komentar orang lain.
                                    </p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/add-comment.png') }}"
                                            alt="cara tambah komentar thread {{ $app->name_app }}"></p>
                                </div>
                                <div id="delete-comment" class="section-block">
                                    <h4 class="block-title">Bagaimana cara menghapus komentar thread?</h4>
                                    <p>Untuk menghapus komentar pada thread, Anda bisa menekan tombol <b>hapus</b> pada
                                        komentar yang ingin Anda hapus. kemudian tunggu hingga muncul pop-up konfirmasi,
                                        lalu klik <b>'Ya, Hapus!'</b>.</p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/delete-comment.png') }}"
                                            alt="cara delete komentar thread {{ $app->name_app }}"></p>
                                </div>
                                <div id="user-like" class="section-block">
                                    <h4 class="block-title">Bagaimana cara melihat siapa saja yang like thread saya?
                                    </h4>
                                    <p>Untuk melihat total dan siapa saja yang like thread saya, Anda bisa klik di salah
                                        satu thread Anda. Setelah itu, klik icon <b>'heart'</b> di samping icon share
                                        pada sudut kanan atas.</p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/who-like.png') }}"
                                            alt="cara melihat siapa saja yang like thread saya {{ $app->name_app }}">
                                    </p>
                                </div>
                                <div id="like-thread" class="section-block">
                                    <h4 class="block-title">Bagaimana cara like pada thread?</h4>
                                    <p>Untuk melakukan like pada thread, Anda bisa klik icon 'heart' di salah satu
                                        thread. Setelah itu, klik icon <b>'heart'</b> di samping icon comment pada
                                        thread. Tunggu hingga warna berubah menjadi merah.</p>
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/like-thread.png') }}"
                                            alt="cara melakukan like pada thread {{ $app->name_app }}"></p>
                                </div>
                            </section>
                            <section id="pengaturan" class="doc-section">
                                <h2 class="section-title">Pengaturan</h2>
                                <div class="section-block">
                                    <p>Dalam pengaturan, pengguna dapat melihat dan mengubah identitas diri seperti
                                        nama, alamat, foto profil, dan lain-lain. Pengguna juga dapat mengubah kata
                                        sandi.</p>
                                </div>
                                <div id="change-email" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mengganti email akun?</h4>
                                    <p>Untuk mengganti email, silahkan kunjungi pengaturan atau bisa melalui tautan <a
                                            href="/pengaturan" target="_blank"><b>ini</b></a>. Setelah itu, klik icon
                                        <b>'pensil'</b>. Tunggu hingga pop-up muncul. Masukkan kata sandi untuk
                                        verifikasi. Terakhir, masukkan <b>email baru</b> lalu klik tombol
                                        <b>'Simpan'</b>.
                                    </p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/change-email.png') }}"
                                            alt="cara ganti email {{ $app->name_app }}"></p>
                                </div>
                                <div id="change-username" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mengganti username akun?</h4>
                                    <p>Untuk mengganti username, silahkan kunjungi <a href="/pengaturan"
                                            target="_blank"><b>pengaturan</b></a>. Masukkan username pada form input
                                        yang tersedia, kemudian klik tombol <b>'Simpan'</b>.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/change-username.png') }}"
                                            alt="cara ganti username {{ $app->name_app }}"></p>
                                </div>
                                <div id="change-password" class="section-block">
                                    <h4 class="block-title">Bagaimana cara mengganti kata sandi?</h4>
                                    <p>Untuk mengganti kata sandi, silahkan kunjungi <a href="/pengaturan"
                                            target="_blank"><b>pengaturan</b></a>. Setelah itu, klik tab <b>'Kata
                                            Sandi'</b>.
                                        Masukkan kata sandi lama, setalah itu masukkan kata sandi baru dan
                                        konfirmasi kata sandi. Terakhir, klik tombol <b>'Simpan'</b>. Jika Anda lupa
                                        kata sandi lama, Anda bisa menghubungi admin untuk mereset kata sandi atau bisa
                                        melalui fitur <b>'Lupa Kata Sandi'</b> yang ada pada halaman masuk</a>.</p>
                                    <p><img class="img-responsive w-75 border border-primary"
                                            src="{{ asset('docs/assets/img/change-password.png') }}"
                                            alt="cara ganti password {{ $app->name_app }}"></p>
                                </div>
                                <div class="callout-block callout-success"
                                    style="margin-top:20px;background-color:#696cff">
                                    <div class="content">
                                        <p><i class="fa-solid fa-bullhorn"></i><b> Tips :</b> Jangan gunakan<i><b>
                                                    nama</b></i>,<i><b> username</b></i>,<i><b> tanggal lahir</b></i>
                                            atau<i><b> email</b></i> sebagai kata sandi.</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex">
                        <div id="doc-nav" class="doc-nav">
                            <nav id="doc-menu" class="nav doc-menu flex-column sticky">
                                <li class="nav-item"><a class="nav-link scrollto" href="#pendahuluan">Pendahuluan</a>
                                </li>
                                <nav class="nav doc-sub-menu nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#registrasi">Registrasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#registrasi-google">
                                            Registrasi dengan Akun Google
                                        </a>
                                    </li>
                                </nav>
                                <li class="nav-item">
                                    <a class="nav-link scrollto" href="#kamus">Kamus Bahasa Indramayu</a>
                                </li>
                                <nav class="nav doc-sub-menu nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#search-entri">Pencarian Kosa Kata</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#results-entri">
                                            Hasil Pencarian Kosa Kata
                                        </a>
                                    </li>
                                </nav>
                                <li class="nav-item"><a class="nav-link scrollto" href="#materi">Materi</a></li>
                                <nav class="nav doc-sub-menu nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#akses-materi">Lihat Materi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#voice">Mengunduh Materi</a>
                                    </li>
                                </nav>
                                <li class="nav-item"><a class="nav-link scrollto" href="#quiz">Latihan</a></li>
                                <nav class="nav doc-sub-menu nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#akses-quiz">Akses Latihan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#detail-quiz">Lihat Detail Latihan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#akses-soal">Mengerjakan Latihan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#akses-nilai-quiz">Akses Nilai Latihan</a>
                                    </li>
                                </nav>
                                <li class="nav-item"><a class="nav-link scrollto" href="#forum">Forum</a></li>
                                <nav class="nav doc-sub-menu nav flex-column">
                                    <li class="nav-item"><a class="nav-link scrollto" href="#add-thread">Tambah
                                            Thread</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#delete-thread">Hapus
                                            Thread</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#add-comment">Tambah
                                            Komentar</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#delete-comment">Hapus
                                            Komentar</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#user-like">Like Threads
                                            Saya?</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#like-thread">Like
                                            Threads</a></li>
                                </nav>
                                <li class="nav-item"><a class="nav-link scrollto" href="#pengaturan">Pengaturan</a>
                                </li>
                                <nav class="nav doc-sub-menu nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#change-email">Ganti Email Akun</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#change-username">Ganti Username Akun</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link scrollto" href="#change-password">Ganti Kata Sandi</a>
                                    </li>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="promo-block" class="promo-block" style="background-color:#696cff">
            <div class="container">
                <div class="promo-block-inner">
                    <h3 id="about" class="promo-title text-center">
                        <p><em class="fa fa-trophy text-white"></em> Tentang {{ $app->name_app }}</p>
                    </h3>
                    <div class="row">
                        <div class="figure-holder col-md-5 col-sm-12 col-xs-12">
                            <div class="figure-holder-inner"><a href="" target="_blank"><img
                                        class="img-responsive w-100"
                                        src="{{ asset('docs/assets/img/budayabasa.png') }}"
                                        alt="{{ $app->name_app }}"></a><a class="mask" href="/"><i
                                        class="icon fa fa-trophy" style="color:#696cff"></i></a></div>
                        </div>
                        <div class="content-holder col-md-7 col-xs-12">
                            <div class="content-holder-inner">
                                <div class="desc">
                                    <h4 class="content-title">
                                        <p><strong>Apa itu&nbsp;{{ $app->name_app }}&nbsp;?</strong></p>
                                    </h4>
                                    <p>{{ $app->description_app }}</p>
                                    <h4 class="content-title">
                                        <p><strong>Bagaimana cara menggunakan&nbsp;{{ $app->name_app }}&nbsp;?</strong>
                                        </p>
                                    </h4>
                                    <p>Cara menggunakan aplikasi ini cukup mudah, pertama, Anda bisa langsung mendaftar
                                        melalui tautan <a href="/register" class="text-white"
                                            style="text-decoration:none"><i><b>ini</b></i></a>. Setalah mendaftar, Anda
                                        bisa mengakses semua fitur pengguna yang ada di
                                        aplikasi&nbsp;{{ $app->name_app }}</p>
                                    <p class="author">Author:&nbsp;<a href="https://www.instagram.com/adeirfanimd"
                                            target="_blank" class="text-white"
                                            style="text-decoration:none">@adeirfanimanda</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="footer text-center">
        <div class="container"><small class="copyright">Copyright&nbsp;
                <script>
                    document.write((new Date).getFullYear())
                </script>&nbsp;<a href="/"
                    class="text-decoration-none"><b>{{ $app->name_app }}</b>.</a>&nbsp;All rights reserved
            </small></div>
    </footer>
    <script src="{{ asset('docs/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('docs/assets/plugins/prism/prism.js') }}"></script>
    <script src="{{ asset('docs/assets/plugins/stickyfill/dist/stickyfill.min.js') }}"></script>
    <script src="{{ asset('docs/assets/plugins/gumshoe/gumshoe.polyfills.min.js') }}"></script>
    <script src="{{ asset('docs/assets/plugins/simplelightbox/simple-lightbox.min.js') }}"></script>
    <script src="{{ asset('docs/assets/js/main.js') }}"></script>
</body>

</html>
