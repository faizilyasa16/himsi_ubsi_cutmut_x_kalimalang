@extends('home.layout.index')
@section('content')
<main class="container-1500 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <article class="card artikel-card artikel-animation border-0 shadow-sm rounded-4 overflow-hidden">
                <!-- Header Article -->
                <div class="card-header bg-white border-0 p-4 p-md-5">
                    <div class="row align-items-start mb-4">
                        <!-- Left side: Title, Author, Date -->
                        <div class="col-md-8">
                            <h1 class="display-6 fw-bold Spartan mb-3 artikel-title">
                                {{ $artikel->judul }}
                            </h1>
                            
                            <div class="d-flex flex-wrap align-items-center text-muted mb-2">
                                <div class="d-flex align-items-center me-4 mb-2">
                                    <i class="bi bi-person-circle fs-5 me-2 artikel-meta-icon"></i>
                                    <span class="fw-semibold">{{ $artikel->user->name }}</span>
                                </div>
                                
                                <div class="d-flex align-items-center me-4 mb-2">
                                    <i class="bi bi-calendar3 fs-5 me-2 artikel-meta-icon"></i>
                                    <span>{{ \Carbon\Carbon::parse($artikel->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center me-4 mb-2">
                                    @if($artikel->kategori)
                                        <span class="badge bg-primary artikel-badge fs-6 px-3 py-2 rounded-pill">
                                            <i class="bi bi-tag me-1"></i>{{ $artikel->kategori }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Article Image -->
                @if($artikel->konten)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $artikel->konten) }}" 
                         alt="{{ $artikel->judul }}" 
                         class="img-fluid artikel-img w-100" 
                         style="max-height: 500px; object-fit: cover;">
                </div>
                @endif
                
                <!-- Image Alt Text -->
                @if($artikel->konten)
                    <div class="px-4 py-2 bg-light border-bottom">
                        <small class="text-muted fst-italic">
                            <i class="bi bi-image me-1"></i>{{ $artikel->judul }}
                        </small>
                    </div>
                @endif
                
                <!-- Article Content -->
                <div class="card-body p-4 p-md-5">
                    <div class="artikel-content Poppins fs-5 lh-lg text-dark">
                        {!! strip_tags($artikel->deskripsi) !!}
                    </div>
                </div>
                
                <!-- Article Footer -->
                <div class="card-footer bg-light border-0 p-4">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-md-end mt-3 mt-md-0">
                            <div class="d-flex justify-content-md-end gap-2">
                                <button class="btn btn-outline-primary artikel-btn artikel-btn-outline btn-sm" onclick="shareArticle()">
                                    <i class="bi bi-share me-1"></i>Bagikan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            
            <!-- Navigation -->
            <div class="text-center mt-4">
                <a href="{{ route('artikel') }}" class="btn btn-cari btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Artikel
                </a>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
    <script src="{{ asset('home/home/share.js') }}"></script>
@endsection