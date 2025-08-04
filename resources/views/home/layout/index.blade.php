<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIMSI Kampus UBSI Cut Mutia x Kalimalang</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/logo/himsi_cutmut.png') }}">
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

</body>
</html>