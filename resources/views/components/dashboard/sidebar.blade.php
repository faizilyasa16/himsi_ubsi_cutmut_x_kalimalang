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
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-light active d-flex align-items-center">
                    <i class="bi bi-grid me-3"></i>
                    <span class="flex-grow-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link text-light d-flex align-items-center">
                    <i class="bi bi-person me-3"></i>
                    <span class="flex-grow-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pengurus.index') }}" class="nav-link text-light d-flex align-items-center">
                    <i class="bi bi-people me-3"></i>
                    <span class="flex-grow-1">Pengurus</span>
                </a>
            </li>

            <!-- Products dengan dropdown -->
            <li class="nav-item">
                <a href="#" class="nav-link text-light d-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#productsMenu" role="button">
                    <i class="bi bi-calendar me-3"></i>
                    <span class="flex-grow-1">Acara</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="productsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('kategori-acara.index') }}" class="nav-link text-light py-2">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kegiatan-acara.index') }}" class="nav-link text-light py-2">Kegiatan</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Orders dengan dropdown -->
            <li class="nav-item">
                <a href="#" class="nav-link text-light d-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#ordersMenu" role="button">
                    <i class="bi bi-card-checklist me-3"></i>
                    <span class="flex-grow-1">Absensi Himsi</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="ordersMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Kelola Absensi</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Rekap Absensi</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Settings dengan dropdown -->
            <li class="nav-item">
                <a href="#" class="nav-link text-light d-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#pemiluMenu" role="button">
                    <i class="bi-envelope-open me-3"></i>
                    <span class="flex-grow-1">Pemilihan Umum</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="pemiluMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Pemilihan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Kandidat</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Settings dengan dropdown -->
            <li class="nav-item">
                <a href="#" class="nav-link text-light d-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#settingsMenu" role="button">
                    <i class="bi bi-images me-3"></i>
                    <span class="flex-grow-1">Galery</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="settingsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light py-2">Konten</a>
                        </li>
                    </ul>
                </div>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <li class="nav-item">
                <a href="#" class="nav-link text-light d-flex align-items-center"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-3"></i>
                    <span>Log out</span>
                </a>
            </li>

        </ul>
    </div>
</div>