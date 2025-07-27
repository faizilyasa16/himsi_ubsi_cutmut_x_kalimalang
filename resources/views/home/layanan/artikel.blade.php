@extends('home.layout.index')

@section('content')
<header class="my-5 Spartan text-center">
    <h1 class="fw-bolder mb-3" style="font-size: 3rem; color: #00008B;">Artikel HIMSI</h1>
    <p class="lead mb-0 Poppins" style="font-size: 1.2rem; opacity: 0.9;">Kumpulan artikel, berita, dan tutorial seputar Sistem Informasi dan teknologi terkini</p>
</header>

<main class="container">
    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form class="d-flex mb-4" role="search">
                    <input class="form-control form-control-lg me-3" type="search" placeholder="Cari artikel berdasarkan judul atau konten..." aria-label="Cari artikel">
                    <button class="btn btn-primary px-4" type="submit">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="artikel-card-container mb-5">
        <div class="row g-4">
            @for ($i = 0; $i < 8; $i++)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="card artikel-card h-100 border-0">
                        <div class="overflow-hidden">
                            <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="card-img-top" alt="Study Club HIMSI">
                        </div>
                        <div class="card-body Poppins">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge">
                                    {{ $i % 4 == 0 ? 'Teknologi' : ($i % 4 == 1 ? 'Tutorial' : ($i % 4 == 2 ? 'Berita' : 'Event')) }}
                                </span>
                                <span class="artikel-date">
                                    {{ ['18 Oct 2025', '15 Oct 2025', '12 Oct 2025', '10 Oct 2025'][$i % 4] }}
                                </span>
                            </div>
                            <h5 class="card-title fw-bold Spartan">
                                {{ $i % 4 == 0 ? 'Perkembangan AI dalam Sistem Informasi' : 
                                   ($i % 4 == 1 ? 'Tutorial Laravel untuk Pemula' : 
                                   ($i % 4 == 2 ? 'HIMSI Raih Prestasi Gemilang' : 'Workshop Coding Bootcamp')) }}
                            </h5>
                            <p class="card-text ">
                                {{ $i % 4 == 0 ? 'Bagaimana teknologi AI mengubah landscape sistem informasi modern dan dampaknya terhadap mahasiswa SI.' : 
                                   ($i % 4 == 1 ? 'Panduan lengkap belajar Laravel dari dasar hingga mahir untuk mahasiswa sistem informasi.' : 
                                   ($i % 4 == 2 ? 'Tim HIMSI berhasil meraih juara dalam kompetisi teknologi tingkat nasional.' : 'Join workshop intensive coding bootcamp untuk meningkatkan skill programming Anda.')) }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="author-info d-flex align-items-center">
                                <img src="{{ asset('asset/logo/himsi.png') }}" alt="Author" class="rounded-circle me-3">
                                <div>
                                    <small class="text-muted d-block">Oleh: <strong>HIMSI UBSI</strong></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endfor
        </div>
    </div>
</main>
@endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection
