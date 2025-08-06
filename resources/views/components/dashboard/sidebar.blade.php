<!-- Sidebar menggunakan Bootstrap Nav -->
<div class="sidebar bg-dark overflow-auto" id="sidebar">
    <div class="sidebar-content p-3">
        <!-- Welcome Section di Sidebar -->
        <div class="sidebar-welcome mb-3 pb-3">
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('asset/logo/himsi_cutmut_dark.png') }}" alt="" style="width: 100px; height: 100px;">
                </div>
                <div>
                    <h5 class="mb-1 text-white text-center">Selamat Datang, {{ Auth::user()->name }}</h5>
                </div>
            </div>
        </div>
        
        <ul class="nav flex-column">
            @if(Auth::user()->role === 'admin')
                <!-- Beranda (Admin) -->
                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('anggota.*') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-house me-3"></i>
                        <span class="flex-grow-1">Beranda</span>
                    </a>
                </li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-grid me-3"></i>
                        <span class="flex-grow-1">Dashboard</span>
                    </a>
                </li>

                <!-- Profile (Admin) -->
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('profile') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-person me-3"></i>
                        <span class="flex-grow-1">Profile</span>
                    </a>
                </li>

                <!-- Pengguna -->
                <li class="nav-item">
                    <a href="{{ route('pengurus-user.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('pengurus-user.*') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-people me-3"></i>
                        <span class="flex-grow-1">Pengguna</span>
                    </a>
                </li>
                <!-- Struktur Organisasi -->
                <li class="nav-item">
                    <a href="{{ route('struktur.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('struktur.*') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-diagram-3 me-3"></i>
                        <span class="flex-grow-1">Struktur Organisasi</span>
                    </a>
                </li>
                <!-- Pemilu admin menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('pemilihan.*') || request()->routeIs('kandidat.*') ? 'active text-white bg-primary' : 'text-light' }} collapsed" data-bs-toggle="collapse" data-bs-target="#pemiluMenu" role="button">
                        <i class="bi-envelope-open me-3"></i>
                        <span class="flex-grow-1">Pemilihan Umum</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="pemiluMenu">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a href="{{ route('pemilihan.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('pemilihan.*') ? 'text-white' : 'text-light' }} py-2">Pemilihan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kandidat.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kandidat.*') ? 'text-white' : 'text-light' }} py-2">Kandidat</a>
                            </li>
                        </ul>
                    </div>
                </li>


            @else
                <!-- Non-admin user -->
                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('anggota.*') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-house me-3"></i>
                        <span class="flex-grow-1">Beranda</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('profile') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-person me-3"></i>
                        <span class="flex-grow-1">Profile</span>
                    </a>
                </li>
            @endif

            @if(
                    Auth::user()->role === 'admin' ||
                    (Auth::user()->role === 'bph' && Auth::user()->divisi === 'rsdm')
                )
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('kegiatan-absensi.*') || request()->routeIs('kelola-absensi.*') ? 'active text-white bg-primary' : 'text-light' }} collapsed" data-bs-toggle="collapse" data-bs-target="#ordersMenu" role="button">
                        <i class="bi bi-card-checklist me-3"></i>
                        <span class="flex-grow-1">Kelola Absensi Himsi</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="ordersMenu">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a href="{{ route('kegiatan-absensi.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kegiatan-absensi.*') ? 'text-white' : 'text-light' }} py-2">Kegiatan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-absensi.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kelola-absensi.*') ? 'text-white' : 'text-light' }} py-2">Kelola Absensi</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'bph')
            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('kategori-acara.*') || request()->routeIs('kegiatan-acara.*') ? 'active text-white bg-primary' : 'text-light' }} collapsed" data-bs-toggle="collapse" data-bs-target="#productsMenu" role="button">
                    <i class="bi bi-calendar me-3"></i>
                    <span class="flex-grow-1">Acara</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="productsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('kategori-acara.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kategori-acara.*') ? 'text-white' : 'text-light' }} py-2">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kegiatan-acara.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kegiatan-acara.*') ? 'text-white' : 'text-light' }} py-2">Kegiatan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('album-gallery.*') || request()->routeIs('konten-gallery.*') ? 'active text-white bg-primary' : 'text-light' }} collapsed" data-bs-toggle="collapse" data-bs-target="#settingsMenu" role="button">
                    <i class="bi bi-images me-3"></i>
                    <span class="flex-grow-1">Galery</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="settingsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('album-gallery.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('album-gallery.*') ? 'text-white' : 'text-light' }} py-2">Album</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('konten-gallery.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('konten-gallery.*') ? 'text-white' : 'text-light' }} py-2">Konten</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            
            <!-- Artikel untuk semua (admin, bph, anggota) -->
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'bph' || Auth::user()->role === 'anggota')
                <li class="nav-item">
                    <a href="{{ route('artikel.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('artikel.*') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-newspaper me-3"></i>
                        <span class="flex-grow-1">Artikel</span>
                    </a>
                </li>
            @endif
                
            <!-- Absensi hanya untuk anggota -->
            @if(Auth::user()->role === 'anggota' || Auth::user()->role === 'bph')
                <li class="nav-item">
                    <a href="{{ route('absensi.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('absensi.*') ? 'active text-white bg-primary' : 'text-light' }}">
                        <i class="bi bi-card-checklist me-3"></i>
                        <span class="flex-grow-1">Absensi</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('kesan-pesan.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('kesan-pesan.*') ? 'active text-white bg-primary' : 'text-light' }}">
                    <i class="bi bi-chat-left-text me-3"></i>
                    <span class="flex-grow-1">Kesan Pesan</span>
                </a>
            </li>
            <!-- Logout for all users -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center text-light"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-3"></i>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</div>