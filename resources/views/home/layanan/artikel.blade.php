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
                    <form action="{{ route('artikel') }}" method="GET">
                        @csrf
                        <input class="form-control form-control-lg me-3" type="search" name="search" placeholder="Cari artikel berdasarkan judul atau konten..." aria-label="Cari artikel">
                        <button class="btn btn-primary px-4" type="submit">
                            <i class="bi bi-search me-2"></i>Cari
                        </button>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <div class="artikel-card-container mb-5">
        <div class="row g-4">
            @forelse ($artikel as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('artikel.show', $item->slug) }}" class="text-decoration-none">
                        <div class="card artikel-card h-100 border-0">
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $item->konten) }}" class="card-img-top" alt="{{ $item->judul }}">
                            </div>
                            <div class="card-body Poppins">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge">
                                        {{ $item->kategori ?? 'Umum' }}
                                    </span>
                                    <span class="artikel-date">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    </span>
                                </div>
                                <h5 class="card-title fw-bold Spartan">
                                    {{ $item->judul }}
                                </h5>
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($item->deskripsi), 100) }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="author-info d-flex align-items-center">
                                    <img src="{{ asset('asset/logo/himsi.png') }}" alt="Author" class="rounded-circle me-3">
                                    <div>
                                        <small class="text-muted d-block">Oleh: <strong>{{ $item->penulis ?? 'HIMSI UBSI' }}</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted Poppins">Belum ada artikel yang tersedia.</p>
                </div>
            @endforelse

        </div>
    </div>
</main>
@endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection
