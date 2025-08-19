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
                                    <img src="{{ $item->user->photo ? asset('storage/' . $item->user->photo) : asset('asset/logo/himsi.png') }}" class="rounded-circle me-2" alt="{{ $item->user->name }}" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>
                                        <small class="text-muted d-block">
                                            Oleh: <strong>{{ $item->user->name }}</strong>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    @if(request()->get('search'))
                        <div class="py-5">
                            <i class="bi bi-search fs-1 text-muted mb-3"></i>
                            <h4 class="text-muted Spartan">Artikel tidak ditemukan</h4>
                        </div>
                    @else
                        <div class="py-5">
                            <i class="bi bi-journal-text fs-1 text-muted mb-3"></i>
                            <h4 class="text-muted Spartan">Belum ada artikel</h4>
                            <p class="text-muted Poppins">Belum ada artikel yang tersedia saat ini.</p>
                        </div>
                    @endif
                </div>
            @endforelse
        </div>
            <div class="my-4">
                {{ $artikel->links() }}
            </div>
        </div>
    </div>
</main>

<style>
    /* Empty state styling */
    .col-12.text-center .py-5 {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        margin: 2rem 0;
        border: 1px solid #dee2e6;
    }
    
    .col-12.text-center .py-5 i {
        color: #6c757d !important;
        display: block;
        margin-bottom: 1rem;
    }
    
    .col-12.text-center .py-5 h4 {
        color: #495057 !important;
        margin-bottom: 0.5rem;
    }
    
    .col-12.text-center .py-5 p {
        color: #6c757d !important;
        font-size: 1.1rem;
    }
    
    .col-12.text-center .py-5 strong {
        color: #00008B;
        background-color: rgba(0, 0, 139, 0.1);
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
    }
    
    .col-12.text-center .btn-primary {
        background-color: #00008B;
        border-color: #00008B;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .col-12.text-center .btn-primary:hover {
        background-color: #4169E1;
        border-color: #4169E1;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 139, 0.3);
    }
</style>

@endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection
