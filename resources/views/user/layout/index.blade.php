<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMSI UBSI Kampus Cut Mutia x Kalimalang</title>
    <link rel="icon" href="{{ asset('asset/logo/himsi_cutmut.png') }}" type="image/png">
    <link href="{{ asset('home/Bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/Bootstrap-icon/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/dashboard.css') }}">
    @yield('styles')
</head>
<body>
    @include('components.animation.upbutton')
    @include('components.animation.togglebtn')


    @include('components.dashboard.sidebar')
    <main class="main-content" id="mainContent">
        @yield('content')
    </main>

    <!-- Overlay untuk mobile -->
    <div class="sidebar-overlay" id="overlay"></div>

    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/dashboard/layout.js') }}"></script>
    @yield('scripts')
</body>
</html>
