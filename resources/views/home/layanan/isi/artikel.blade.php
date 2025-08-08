@extends('home.layout.index')
@section('content')
<main class="container-1500 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <article class="bg-white rounded-3 overflow-hidden">
                <!-- Header Article -->
                <div class="bg-white border-0 mb-5">
                    <div class="row align-items-start">
                        <!-- Left side: Title, Author, Date -->
                        <div class="col-md-8">
                            <h1 class="fw-bold mb-3 Spartan" style="color: #00008B; ">
                                {{ $artikel->judul }}
                            </h1>
                            
                            <div class="d-flex flex-wrap align-items-center text-muted mb-2 Poppins ">
                                <div class="d-flex align-items-center me-4 mb-2">
                                    <img src="{{ $artikel->user->photo ? asset('storage/' . $artikel->user->photo) : asset('asset/logo/himsi.png') }}" class="rounded-circle me-2" alt="{{ $artikel->user->name }}" style="width: 40px; height: 40px; object-fit: cover;">
                                    <span class="fw-semibold">{{ $artikel->user->name }}</span>
                                </div>
                                
                                <div class="d-flex align-items-center me-4 mb-2">
                                    <i class="bi bi-calendar3 fs-5 me-2" style="color: #00008B;"></i>
                                    <span>{{ \Carbon\Carbon::parse($artikel->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center me-4 mb-2">
                                    @if($artikel->kategori)
                                        <span class="badge fs-6 px-3 py-2 rounded-pill artikel-badge">
                                            <i class="bi bi-tag me-2"></i>{{ ucfirst($artikel->kategori) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Article Image -->
                @if($artikel->konten)
                <div class="text-center artikel-image">
                    <img src="{{ asset('storage/' . $artikel->konten) }}" 
                         alt="{{ $artikel->judul }}" 
                         class="img-fluid w-100" 
                         style="max-height: 500px; object-fit: cover;">
                </div>
                @endif
                
                
                <!-- Article Content -->
                <div class="p-4 p-md-5">
                    <div class="fs-5 lh-lg text-dark Poppins">
                        {!! strip_tags($artikel->deskripsi) !!}
                    </div>
                </div>
                
                <!-- Article Footer -->
                <div class="bg-light border-top p-4">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-md-end mt-3 mt-md-0">
                            <div class="d-flex justify-content-md-end gap-2">
                                <button class="btn btn-outline-primary btn-sm" onclick="shareArticle()">
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