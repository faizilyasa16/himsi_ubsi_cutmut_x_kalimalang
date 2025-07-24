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
        <h1 id="typing-struktur" class="card-title fw-bold" style="height: 48px; border-right: .15em solid white; white-space: nowrap; overflow: hidden; letter-spacing: .1em;"></h1>

        
        <!-- Elemen dekoratif dengan animasi floating -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="pointer-events: none;">
            <div class="position-absolute" style="width: 80px; height: 80px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 20%; left: 15%; animation: float 6s ease-in-out infinite;"></div>
            <div class="position-absolute" style="width: 50px; height: 50px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 30%; right: 20%; animation: float 4s ease-in-out infinite 1s;"></div>
            <div class="position-absolute" style="width: 120px; height: 120px; border: 2px solid rgba(255,255,255,0.1); border-radius: 50%; bottom: 15%; right: 25%; animation: float 8s ease-in-out infinite 2s;"></div>
        </div>
    </div>
</main>
<section class="container-1500 my-5">
    <div class="my-5 text-center">
        <img src="{{ asset('asset/struktur/himsi.png') }}" alt="" class="img-fluid rounded-3 shadow-sm mx-auto d-block" style="max-width: 100%; height: 1000px; object-fit: cover;">
    </div>

    <div class="row text-center Poppins mt-4">
        <h1 class="fw-bold mb-5">Divisi HIMSI UBSI</h1>
        <div class="col-md-3 border-end">
            <i class="bi bi-people fs-1"></i>
            <h5 class="fw-bold">RSDM</h5>
            <p>Mengelola sumber daya manusia, mengatur rekrutmen, pelatihan, dan pengembangan anggota HIMSI.</p>
        </div>
        <div class="col-md-3 border-end">
            <i class="bi bi-clipboard2-data fs-1"></i>
            <h5 class="fw-bold">Kominfo</h5>
            <p>Bertanggung jawab atas informasi dan komunikasi, termasuk media sosial dan dokumentasi kegiatan.</p>
        </div>
        <div class="col-md-3 border-end">
            <i class="bi bi-book fs-1"></i>
            <h5 class="fw-bold">Pendidikan</h5>
            <p>Menangani kegiatan akademik dan edukatif untuk meningkatkan wawasan anggota dan mahasiswa.</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-lightbulb fs-1"></i>
            <h5 class="fw-bold">Litbang</h5>
            <p>Fokus pada penelitian dan pengembangan, melakukan kajian serta evaluasi untuk kemajuan HIMSI.</p>
        </div>
    </div>
</section>

@endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/js/layout.js') }}"></script>
    <script src="{{ asset('home/js/profile.js') }}"></script>
@endsection