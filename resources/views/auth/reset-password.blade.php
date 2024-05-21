<!DOCTYPE html>
<html lang="id" class="light-style customizer-hide" dir="ltr" data-theme="theme-default">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{ $app[0]->name_app }} - {{ $title }}</title>
    <meta name="description" content="{{ $app[0]->description_app }}" />
    <link rel="icon" type="image/x-icon"
        href="@if (Storage::disk('public')->exists('logo-aplikasi')) {{ asset('storage/' . $app[0]->logo) }} @else {{ asset('assets/img/logo-aplikasi/logo.png') }} @endif" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Boxicons -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/assets/vendor/css/theme.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/assets/css/demo.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendors/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/assets/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('assets/vendors/assets/vendor/js/helpers.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendors/libs/sweetalert2/sweetalert.css') }}">
    <script src="{{ asset('assets/vendors/libs/sweetalert2/sweetalert.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/toast.css') }}">
    <script src="{{ asset('assets/vendors/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                {{-- Logo --}}
                <div class="app-brand justify-content-center">
                    <a href="/" class="app-brand-link gap-2">
                        <img src="{{ asset('homepage/images/logo-dark.svg') }}" alt="Logo" class="h-auto"
                            style="width: 280px;">
                        {{-- <img src="@if (Storage::disk('public')->exists('logo-aplikasi')) {{ asset('storage/' . $app[0]->logo) }} @else {{ asset('assets/img/logo-aplikasi/logo.png') }} @endif"
                            class="h-auto" style="width: 160px;" alt="Logo-{{ $app[0]->name_app }}"> --}}
                    </a>
                </div><br>
                {{-- End Logo --}}
                <!-- Forgot Password -->
                <div class="card" style="">
                    <div class="card-body">
                        <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Masukkan email" autofocus />
                            </div>
                            <div class="mb-2 form-password-toggle">
                                <label class="form-label required-label" for="password">Kata Sandi Baru</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="form-text" style="color: #ff3e1d;">
                                        {{ $message }}
                                    </div>
                                @else
                                    <div class="form-text"><i class='bx bx-error' style="font-size: 100%;"></i>&nbsp;Kata
                                        sandi minimal 8 karakter termasuk huruf
                                        kapital & kecil (A-Z), (a-z), angka (1-9), dan karakter unik (@,#,%,dll)</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label required-label" for="password2">Ulangi Kata Sandi Baru</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password2" class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" autocomplete="off" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Reset Kata Sandi</button>
                        </form>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendors/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendors/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendors/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendors/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendors/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/buttons.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>
