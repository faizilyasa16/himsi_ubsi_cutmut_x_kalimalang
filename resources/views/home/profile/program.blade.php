@extends('home.layout.index')
@section('content')
<main class="card text-white position-relative overflow-hidden" style="border-radius: 0; background-color: #00008B; height: 400px;">
    <!-- Overlay dengan animasi gradient -->
    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center Spartan bg-gradient-animated text-center" style="background: linear-gradient(135deg, rgba(0, 0, 139, 0.8) 0%, rgba(65, 105, 225, 0.8) 100%); animation: gradientFlow 10s ease infinite;">
        <!-- Logo baris atas dengan animasi fade in -->
        <div class="d-flex gap-4 mb-3 animate-logos">
            <img src="{{ asset('asset/logo/himsi1.png') }}" alt="Logo HIMSI" class="logo-animated" style="height: 100px; animation: fadeInDown 1s ease, pulse 3s infinite alternate;">
            <img src="{{ asset('asset/logo/ubsi.png') }}" alt="Logo UBSI" class="logo-animated" style="height: 100px; animation: fadeInDown 1s ease 0.3s, pulse 3s infinite alternate 1.5s;">
        </div>
        
        <!-- Judul dengan animasi typing (dikelola oleh JS) -->
        <h1 id="typing-program" class="card-title fw-bold" style="height: 48px; border-right: .15em solid white; white-space: nowrap; overflow: hidden; letter-spacing: .1em;"></h1>

        
        <!-- Elemen dekoratif dengan animasi floating -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="pointer-events: none;">
            <div class="position-absolute" style="width: 80px; height: 80px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 20%; left: 15%; animation: float 6s ease-in-out infinite;"></div>
            <div class="position-absolute" style="width: 50px; height: 50px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 30%; right: 20%; animation: float 4s ease-in-out infinite 1s;"></div>
            <div class="position-absolute" style="width: 120px; height: 120px; border: 2px solid rgba(255,255,255,0.1); border-radius: 50%; bottom: 15%; right: 25%; animation: float 8s ease-in-out infinite 2s;"></div>
        </div>
    </div>
</main>
<section class="container-1500 my-5">
    <p class="Poppins">Berikut adalah program kerja yang telah direncanakan untuk HIMSI UBSI Cut Mutia x Kalimalang :</p>
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded-top-5 himsi-program-card">
                <div class="w-100 bg-success rounded-5 himsi-card-status himsi-status-complete">
                    <h1 class="text-center text-white p-3 fw-bold Spartan">Selesai</h1>
                </div>
                <div class="card-body Poppins himsi-card-body">
                    <h3 class="card-title Spartan fw-bold himsi-card-title">Program Kerja 1</h3>
                    <div class="mt-3">
                        <p class="card-text mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i><strong>Lokasi:</strong> <span class="text-muted">Kalimalang</span></p>
                        <p class="card-text mb-2"><i class="bi bi-calendar-event-fill text-primary me-2"></i><strong>Tanggal:</strong> <span class="text-muted">01 Januari 2025</span></p>
                        <p class="card-text mb-3"><i class="bi bi-file-text-fill text-success me-2"></i><strong>Deskripsi:</strong> <span class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span></p>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 himsi-btn-detail w-100 fw-bold">
                        <i class="bi bi-eye-fill me-2"></i>Detail Program
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded-top-5 himsi-program-card">
                <div class="w-100 bg-danger rounded-5 himsi-card-status himsi-status-pending">
                    <h1 class="text-center text-white p-3 fw-bold Spartan">Belum Dimulai</h1>
                </div>
                <div class="card-body Poppins himsi-card-body">
                    <h3 class="card-title Spartan fw-bold himsi-card-title">Program Kerja 2</h3>
                    <div class="mt-3">
                        <p class="card-text mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i><strong>Lokasi:</strong> <span class="text-muted">Cut Mutia</span></p>
                        <p class="card-text mb-2"><i class="bi bi-calendar-event-fill text-primary me-2"></i><strong>Tanggal:</strong> <span class="text-muted">15 Februari 2025</span></p>
                        <p class="card-text mb-3"><i class="bi bi-file-text-fill text-success me-2"></i><strong>Deskripsi:</strong> <span class="text-muted">Program kerja yang akan segera dimulai dalam waktu dekat.</span></p>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 himsi-btn-detail w-100 fw-bold">
                        <i class="bi bi-eye-fill me-2"></i>Detail Program
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded-top-5 himsi-program-card">
                <div class="w-100 bg-primary rounded-5 himsi-card-status himsi-status-ongoing">
                    <h1 class="text-center text-white p-3 fw-bold Spartan">Berlangsung</h1>
                </div>
                <div class="card-body Poppins himsi-card-body">
                    <h3 class="card-title Spartan fw-bold himsi-card-title">Program Kerja 3</h3>
                    <div class="mt-3">
                        <p class="card-text mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i><strong>Lokasi:</strong> <span class="text-muted">Hybrid</span></p>
                        <p class="card-text mb-2"><i class="bi bi-calendar-event-fill text-primary me-2"></i><strong>Tanggal:</strong> <span class="text-muted">10 Maret 2025</span></p>
                        <p class="card-text mb-3"><i class="bi bi-file-text-fill text-success me-2"></i><strong>Deskripsi:</strong> <span class="text-muted">Program kerja yang sedang berjalan dan dalam tahap implementasi.</span></p>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 himsi-btn-detail w-100 fw-bold">
                        <i class="bi bi-eye-fill me-2"></i>Detail Program
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/js/layout.js') }}"></script>
    <script src="{{ asset('home/js/profile.js') }}"></script>
@endsection