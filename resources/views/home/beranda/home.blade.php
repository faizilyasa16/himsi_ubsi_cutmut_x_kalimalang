@extends('home.layout.index')

@section('content')
    <main class="container-1500 mt-3 mt-lg-5">
        <!-- Hero Section with Image Slider -->
        <section class="col-12 d-flex flex-column flex-lg-row align-items-center min-vh-50" style="margin-bottom: 0;" aria-label="Selamat Datang">
            <!-- Static Text Content -->
            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="carousel-content mt-4">
                    <h1 class="carousel-title Spartan mb-3" style="font-size: 2.5rem;">Selamat Datang di HIMSI UBSI</h1>
                    <h2 id="typing-subtitle" class="carousel-subtitle Poppins fw-bold"></h2>
                    <p class="carousel-description Poppins">
                        HIMSI (Himpunan Mahasiswa Sistem Informasi) UBSI Cut Mutia x Kalimalang adalah organisasi mahasiswa yang berfokus pada pengembangan
                        dan penerapan teknologi informasi. Kami berkomitmen untuk meningkatkan kualitas pendidikan dan keterampilan
                        mahasiswa di bidang sistem informasi.
                    </p>
                    <div class="d-flex align-items-center gap-2 gap-md-3 justify-content-center justify-content-lg-start Poppins">
                        <a href="{{ route('about') }}" class="btn btn-cari btn-lg " aria-label="Cari tahu tentang HIMSI">Cari Tahu</a>
                        <a href="{{ $join->link }}" class="btn btn-lg btn-join" aria-label="Gabung dengan HIMSI">Gabung</a>
                    </div>
                </div>
            </div>
            
            <!-- Image Carousel -->
            <div class="col-12 col-lg-6 order-1 order-lg-2 text-center mb-4 mb-lg-0">
                <div id="imageCarousel" class="carousel slide " data-bs-ride="carousel" data-bs-interval="3000" aria-label="Galeri foto HIMSI UBSI">
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        <button  data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1: Kegiatan Study Club"></button>
                        <button data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2: Kegiatan HIMSI"></button>
                        <button  data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3: Kegiatan Santunan"></button>
                    </div>
                    
                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        @foreach ($galeri as $key => $item)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul ?? 'Galeri Kegiatan' }}" class="carousel-image" width="800" height="450">
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        
        <!-- HIMSI DALAM AKSI Section -->
        <section class="col-12 mb-5" style="margin-top: 200px; margin-bottom: 100px;" aria-labelledby="heading-himsi-aksi">
            <div class="d-flex justify-content-between align-items-center mb-5 px-3 Spartan">
                <h3 id="heading-himsi-aksi" class="mb-1 fw-bold">HIMSI DALAM AKSI</h3>
                <a href="{{ route('acara.index') }}" class="text-decoration-none">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                @forelse ($acara as $item)
                    <div class="col-12 col-md-4 mb-4 px-2">
                        <a href="{{ route('acara.show', $item) }}" class="action-card-link" aria-labelledby="acara-title-{{ $item->id }}" aria-describedby="acara-desc-{{ $item->id }}">
                            <div class="card action-card">
                                <img src="{{ asset('storage/' . $item->poster) }}" class="kegiatan-img-top" alt="{{ $item->nama }}" width="400" height="267">
                                <div class="card-body Poppins">
                                    <h3 class="card-title Spartan">{{ $item->nama }}</h3>
                                    <p class="card-text">{{ Str::limit($item->deskripsi, 150) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="fs-5 text-muted">Belum ada acara yang tersedia.</p>
                    </div>
                @endforelse

            </div>
        </section>
        
        <!-- Anggota Kepengurusan Section -->
        <section class="col-12 mb-5" aria-labelledby="heading-anggota">
            <h2 id="heading-anggota" class="text-center mt-5 mb-5 Spartan">
                Anggota Kepengurusan HIMSI UBSI Cut Mutia x Kalimalang
            </h2>
            
            <div class="d-flex flex-wrap justify-content-center Poppins">
                <div class="col-12 col-md-4 mb-5 px-2">
                    <div class="card counter-card shadow rounded-4 text-center border-0 p-4">
                        <i class="bi bi-people-fill counter-icon display-5 mb-3" aria-hidden="true"></i>
                        <div class="card-body">
                            <h3 class="card-title fw-semibold Spartan">Anggota Aktif</h3>
                            <p class="card-text counter-number fs-4" data-count="{{ $anggota }}">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 px-2">
                    <div class="card counter-card shadow rounded-4 text-center border-0 p-4">
                        <i class="bi bi-diagram-3-fill counter-icon display-5 mb-3" aria-hidden="true"></i>
                        <div class="card-body">
                            <h3 class="card-title fw-semibold Spartan">Divisi</h3>
                            <p class="card-text counter-number fs-4" data-count="6">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 px-2">
                    <div class="card counter-card shadow rounded-4 text-center border-0 p-4">
                        <i class="bi bi-person-plus-fill counter-icon display-5 mb-3" aria-hidden="true"></i>
                        <div class="card-body">
                            <h3 class="card-title fw-semibold Spartan">Anggota yang Bergabung</h3>
                            <p class="card-text counter-number fs-4" data-count="{{ $users }}">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Testimonial Section -->
    <section class="col-12 testimonial-section carousel-overflow-fix" style="margin-bottom: 100px; background: linear-gradient(135deg, #00008B 0%, #4169E1 100%); padding: 60px 0;" aria-labelledby="heading-testimonial">
        <h2 id="heading-testimonial" class="text-center mb-1 Spartan text-white">Kata Mereka Tentang HIMSI</h2>
        <div class="mx-auto mb-5 rounded-5" style="height: 5px; width: 10%; background-color: #ffffff;" role="presentation"></div>
        
        <div class="col-12" style="padding: 20px;">
            <div id="testimoniCarousel" class="carousel slide carousel-overflow-fix" data-bs-ride="carousel" data-bs-interval="5000" aria-label="Testimonial alumni dan anggota HIMSI">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators d-md-none">
                    @foreach ($kesanPesan as $index => $kesan)
                        <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="{{ $index }}" 
                                @if($index === 0) class="active" aria-current="true" @endif 
                                aria-label="Testimonial {{ $kesan->user->name }}"></button>
                    @endforeach
                </div>

                <!-- Carousel Content -->
                <div class="carousel-inner">
                    @forelse ($kesanPesan as $index => $kesan)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <div class="col-md-8 mx-auto">
                                <div class="card testimonial-card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
                                    <div class="card-body text-center p-5">
                                        <i class="fas fa-quote-left fa-3x text-primary mb-4" aria-hidden="true"></i>
                                        <blockquote class="card-text fs-5 mb-4 Poppins" style="color: #333;">
                                            <p>"{{ $kesan->kesan_pesan }}"</p>
                                            <footer class="d-flex align-items-center justify-content-center">
                                                @if($kesan->user->photo)
                                                    <img src="{{ asset('storage/' . $kesan->user->photo) }}" alt="{{ $kesan->user->name }}" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('asset/logo/himsi.png') }}" alt="{{ $kesan->user->name }}" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                @endif
                                                <div class="text-start">
                                                    <cite class="mb-0 fw-bold">{{ $kesan->user->name }}</cite>
                                                    <small class="text-muted d-block">
                                                        @if($kesan->user->role === 'bph')
                                                            Pengurus - {{ ucfirst(str_replace('_', ' ', $kesan->user->divisi)) }}
                                                        @elseif($kesan->user->role === 'anggota')
                                                            Anggota - {{ ucfirst($kesan->user->divisi) }}
                                                        @elseif($kesan->user->role === 'alumni')
                                                            Alumni HIMSI
                                                        @else
                                                            Mahasiswa HIMSI
                                                        @endif
                                                    </small>
                                                </div>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Fallback jika tidak ada kesan pesan -->
                        <div class="carousel-item active">
                            <div class="col-md-8 mx-auto">
                                <div class="card testimonial-card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
                                    <div class="card-body text-center p-5">
                                        <i class="fas fa-quote-left fa-3x text-primary mb-4" aria-hidden="true"></i>
                                        <blockquote class="card-text fs-5 mb-4 Poppins" style="color: #333;">
                                            <p>"Belum ada testimoni yang tersedia. Jadilah yang pertama untuk berbagi pengalaman Anda bersama HIMSI!"</p>
                                            <footer class="d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('asset/logo/himsi.png') }}" alt="HIMSI" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                <div class="text-start">
                                                    <cite class="mb-0 fw-bold">HIMSI UBSI</cite>
                                                    <small class="text-muted d-block">Himpunan Mahasiswa Sistem Informasi</small>
                                                </div>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Carousel Navigation -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev" aria-label="Previous testimonial">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next" aria-label="Next testimonial">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    
    <!-- Artikel Terbaru Section -->
    <section class="container-1500 " aria-labelledby="heading-artikel" style="margin-bottom: 100px;">
        <div class="col-12 mb-5" >
            <div class="d-flex justify-content-between align-items-center mb-5 px-3 Spartan">
                <h3 id="heading-artikel" class="mb-1">Artikel Terbaru</h3>
                <a href="{{ route('artikel') }}" class="text-decoration-none ">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="d-flex flex-wrap Poppins">
                @forelse($artikels as $index => $artikel)
                        @if($index == 0)
                            {{-- Artikel besar (kolom kiri) --}}
                            <div class="col-12 col-lg-6 mb-4 px-2">
                                <a href="{{ route('artikel.show', $artikel->slug) }}" class="action-card-link" aria-labelledby="artikel-title-{{ $artikel->id }}" aria-describedby="artikel-desc-{{ $artikel->id }}">
                                    <div class="card  action-card h-100">
                                        <img src="{{ asset('storage/' . $artikel->konten) }}" class="kegiatan-img-top" style="height: 250px;" alt="{{ $artikel->judul }}" width="600" height="250">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                @if($artikel->kategori)
                                                    <span class="badge px-3 py-2 rounded-pill artikel-badge">
                                                        {{ ucfirst($artikel->kategori) }}
                                                    </span>
                                                @endif

                                                @if ($artikel->created_at)
                                                    <span class="artikel-date">
                                                        {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <h3  class="card-title Spartan">{{ $artikel->judul }}</h3>
                                            <p  class="card-text">{{ Str::limit(strip_tags($artikel->deskripsi), 150) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-lg-6 mb-4 px-2">
                                <div class="d-flex flex-column h-100">
                        @else
                            {{-- Artikel kecil (di kolom kanan) --}}
                                    <div class="col-12 mb-3">
                                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="action-card-link" aria-labelledby="artikel-title-{{ $artikel->id }}" aria-describedby="artikel-desc-{{ $artikel->id }}">
                                            <div class="card action-card">
                                                <div class="d-flex">
                                                    <div class="col-4">
                                                        <img src="{{ asset('storage/' . $artikel->konten) }}" class="img-fluid rounded-start" alt="{{ $artikel->judul }}" width="150" height="100">
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                @if($artikel->kategori)
                                                                    <span class="badge px-3 py-2 rounded-pill artikel-badge">
                                                                        {{ ucfirst($artikel->kategori) }}
                                                                    </span>
                                                                @endif

                                                                @if ($artikel->created_at)
                                                                    <span class="artikel-date">
                                                                        {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <h3  class="card-title Spartan">{{ $artikel->judul }}</h3>
                                                            <p  class="card-text">{{ Str::limit(strip_tags($artikel->deskripsi), 150) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        @endif
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="py-5">
                                <i class="bi bi-journal-text fs-1 text-muted mb-3"></i>
                                <h4 class="text-muted Spartan">Belum ada artikel</h4>
                                <p class="text-muted Poppins">Belum ada artikel yang tersedia saat ini.</p>
                            </div>
                        </div>
                    @endforelse
            </div>
        </div>
        <div class="col-12" style="margin-bottom: 100px; ">
            <div class="d-flex justify-content-start justify-content-center justify-content-md-start align-items-center mb-4 px-3">
                <h3 class="mb-1 Spartan text-center text-md-start">Tim Pengembang Website</h3>
            </div>
            <div class="carousel-wrapper">
                <button class="carousel-btn" id="prevBtn" aria-label="Previous slide">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <div class="carousel-track-container">
                    <div class="carousel-track" id="carouselTrack">
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/adi.jpg') }}" alt="Gallery Image 1" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/aisyah.jpg') }}" alt="Gallery Image 2" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/dafina.jpg') }}" alt="Gallery Image 3" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/aul.jpg') }}" alt="Gallery Image 4" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/andrau.jpg') }}" alt="Gallery Image 5" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/fahri.jpg') }}" alt="Gallery Image 6" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/king.jpg') }}" alt="Gallery Image 7" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/rohman.jpg') }}" alt="Gallery Image 8" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/joel.jpg') }}" alt="Gallery Image 9" loading="lazy">
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('asset/tim/reggy.jpg') }}" alt="Gallery Image 10" loading="lazy">
                        </div>
                    </div>
                </div>
                <button class="carousel-btn" id="nextBtn" aria-label="Next slide">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
    <script src="{{ asset('home/home/home.js') }}"></script>
    <script src="{{ asset('home/js/counter.js') }}"></script>
@endsection