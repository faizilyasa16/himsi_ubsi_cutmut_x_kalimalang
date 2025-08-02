<div class="bg-white">
        <header class="mx-4 mt-3 d-flex justify-content-between align-items-center p-0">
            <div class="d-flex align-items-center">
                <img 
                    src="{{ asset('asset/logo/himsi_cutmut.png') }}" 
                    alt="Logo HIMSI" 
                    style="width: 120px; height: auto;"
                    class="me-1"
                >
                <div class="d-none d-md-flex align-items-center">
                    <div class="mx-1 rounded-3" style="width: 3px; height: 50px; background-color: #00008B;"></div>
                    <h3 class="ms-2 Spartan m-0" style=" color: #00008B;">
                        HIMSI Kampus UBSI Cut Mutia x Kalimalang
                    </h3>
                </div>
            </div>
            <div class="d-flex align-items-center Poppins">
                @if (Auth::check())
                    <div class="dropdown">
                        <div class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                            <span class="text-dark me-3">{{ Auth::user()->name }}</span>
                            <i class="bi bi-person-circle fs-1"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login mx-4 fs-5 Poppins">
                        Login
                    </a>
                @endif
            </div>
        </header>
        <nav class="navbar navbar-expand-lg mt-3 p-2 Poppins">
            <div class="container-fluid">
                <button class="navbar-toggler border-0 toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggle-icon">
                        <i class="bi bi-list text-white fs-1"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-3 mt-3 gap-4 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="{{ route('beranda') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white" href="#" id="navbarProfile">
                                Profile <i class="bi bi-caret-down-fill dropdown-arrow"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-responsive" aria-labelledby="navbarProfile">
                                <li><a class="dropdown-item mb-2" href="{{ route('about') }}">Tentang Kami</a></li>
                                <li><a class="dropdown-item mb-2" href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item mb-2" href="{{ route('pengurus') }}">Pengurus</a></li>
                                <li><a class="dropdown-item" href="{{ route('program') }}">Program Kerja</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link text-white" href="#" id="navbarLayanan">
                                Layanan <i class="bi bi-caret-down-fill dropdown-arrow"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-responsive" aria-labelledby="navbarLayanan">
                                <li><a class="dropdown-item mb-2" href="{{ route('acara') }}">Acara</a></li>
                                <li><a class="dropdown-item mb-2" href="{{ route('artikel') }}">Artikel</a></li>
                                <li><a class="dropdown-item" href="{{ route('voting') }}">Voting</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('gallery') }}">Gallery</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
