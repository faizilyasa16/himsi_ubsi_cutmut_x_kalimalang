<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary Meta Tags -->
    <title>HIMSI UBSI Cut Mutia x Kalimalang | Himpunan Mahasiswa Sistem Informasi</title>
    <meta name="title" content="HIMSI UBSI Cut Mutia x Kalimalang | Himpunan Mahasiswa Sistem Informasi">
    <meta name="description" content="Situs resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UBSI Kampus Cut Mutia dan Kalimalang. Informasi kegiatan, event, artikel, dan layanan untuk mahasiswa sistem informasi.">
    <meta name="keywords" content="HIMSI, himpunan mahasiswa sistem informasi, UBSI, universitas bina sarana informatika, cut mutia, kalimalang, organisasi mahasiswa, sistem informasi, kegiatan mahasiswa, event kampus">
    <meta name="author" content="HIMSI UBSI Cut Mutia x Kalimalang">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="HIMSI UBSI Cut Mutia x Kalimalang | Himpunan Mahasiswa Sistem Informasi">
    <meta property="og:description" content="Situs resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UBSI Kampus Cut Mutia dan Kalimalang. Informasi kegiatan, event, artikel, dan layanan untuk mahasiswa sistem informasi.">
    <meta property="og:image" content="{{ asset('asset/logo/himsi_cutmut.png') }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="HIMSI UBSI Cut Mutia x Kalimalang | Himpunan Mahasiswa Sistem Informasi">
    <meta name="twitter:description" content="Situs resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UBSI Kampus Cut Mutia dan Kalimalang. Informasi kegiatan, event, artikel, dan layanan untuk mahasiswa sistem informasi.">
    <meta name="twitter:image" content="{{ asset('asset/logo/himsi_cutmut.png') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/logo/himsi_cutmut.png') }}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('home/Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/Bootstrap-icon/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/home.css') }}">

</head>
<body>
    @include('components.animation.splash')

    @include('components.beranda.header')

    <div class="content-wrapper" id="main-content">
        @yield('content')
    </div>
    
    @include('components.beranda.footer')

    @include('components.animation.upbutton')

    @yield('scripts')
    @include('sweetalert::alert')

    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>