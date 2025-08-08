<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIMSI UBSI Kampus Cut Mutia x Kalimalang</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/logo/himsi_cutmut.png') }}">
    <link rel="stylesheet" href="{{ asset('home/Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/Bootstrap-icon/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/login.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow rounded-3">
                            <div class="card-body">
                                <div class="text-center pb-3 mb-4">
                                    <div class="d-block mx-auto my-2">
                                        <img src="{{ asset('asset/logo/himsi.png') }}" alt="HIMSI Logo" class="img-fluid" style="max-height: 80px;">
                                        <img src="{{ asset('asset/logo/ubsi.png') }}" alt="" class="img-fluid" style="max-height: 80px;">
                                    </div>
                                    <h5 class="card-title mb-0 Spartan">HIMSI UBSI Kampus Cut Mutia x Kalimalang</h5>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0 list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div> 
                                @elseif (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('login.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter your NIM" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control password-field" id="password" name="password" placeholder="Enter your password" required>
                                            <span class="input-group-text">
                                                <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-login">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="{{ asset('home/js/login.js') }}"></script>
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>