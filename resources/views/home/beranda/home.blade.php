@extends('home.layout.index')

@section('content')
    <main class="container-1500 mt-3 mt-lg-5">
        <!-- Hero Section with Image Slider -->
        <section class="col-12 d-flex flex-column flex-lg-row align-items-center min-vh-50" style="margin-bottom: 0;" aria-label="Selamat Datang">
            <!-- Static Text Content -->
            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="carousel-content mt-4">
                    <h1 class="carousel-title Spartan mb-3">Selamat Datang di HIMSI UBSI</h1>
                    <h2 id="typing-subtitle" class="carousel-subtitle Poppins fw-bold"></h2>
                    <p class="carousel-description Poppins">
                        HIMSI (Himpunan Mahasiswa Sistem Informasi) UBSI Cut Mutia x Kalimalang adalah organisasi mahasiswa yang berfokus pada pengembangan
                        dan penerapan teknologi informasi. Kami berkomitmen untuk meningkatkan kualitas pendidikan dan keterampilan
                        mahasiswa di bidang sistem informasi.
                    </p>
                    <div class="d-flex align-items-center gap-2 gap-md-3 justify-content-center justify-content-lg-start Poppins">
                        <a href="{{ route('about') }}" class="btn btn-cari btn-lg " aria-label="Cari tahu tentang HIMSI">Cari Tahu</a>
                        <a href="#formulir-pendaftaran" class="btn btn-lg btn-join" aria-label="Gabung dengan HIMSI">Gabung</a>
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
                        <!-- Image 1 -->
                        <div class="carousel-item active">
                            <img src="{{ asset('asset/kegiatan/studyclub.jpg')}}" alt="Kegiatan Study Club HIMSI" class="carousel-image" width="800" height="450">
                        </div>
                        
                        <!-- Image 2 -->
                        <div class="carousel-item">
                            <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" alt="Kegiatan Study Club kedua" class="carousel-image" width="800" height="450">
                        </div>
                        
                        <!-- Image 3 -->
                        <div class="carousel-item">
                            <img src="{{ asset('asset/kegiatan/santunan.jpg') }}" alt="Kegiatan Santunan HIMSI" class=" carousel-image" width="800" height="450">
                        </div>
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
                                    <p class="card-text">{{ $item->deskripsi }}</p>
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
                    <div class="card shadow rounded-4 text-center border-0 p-4">
                        <i class="bi bi-people-fill display-5 mb-3" aria-hidden="true"></i>
                        <div class="card-body">
                            <h3 class="card-title fw-semibold Spartan">Anggota Aktif</h3>
                            <p class="card-text fs-4">{{ $anggota }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 px-2">
                    <div class="card shadow rounded-4 text-center border-0 p-4">
                        <i class="bi bi-diagram-3-fill display-5 mb-3" aria-hidden="true"></i>
                        <div class="card-body">
                            <h3 class="card-title fw-semibold Spartan">Divisi</h3>
                            <p class="card-text fs-4">6</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 px-2">
                    <div class="card shadow rounded-4 text-center border-0 p-4">
                        <i class="bi bi-person-plus-fill display-5 mb-3" aria-hidden="true"></i>
                        <div class="card-body">
                            <h3 class="card-title fw-semibold Spartan">Anggota yang Bergabung</h3>
                            <p class="card-text fs-4">{{ $users }}</p>
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
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Testimonial Ahmad Rizki"></button>
                    <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="1" aria-label="Testimonial Siti Nurhaliza"></button>
                    <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="2" aria-label="Testimonial Budi Santoso"></button>
                </div>

                <!-- Carousel Content -->
                <div class="carousel-inner">
                    <!-- Testimonial 1 -->
                    <div class="carousel-item active">
                        <div class="col-md-8 mx-auto">
                            <div class="card testimonial-card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
                                <div class="card-body text-center p-5">
                                    <i class="fas fa-quote-left fa-3x text-primary mb-4" aria-hidden="true"></i>
                                    <blockquote class="card-text fs-5 mb-4 Poppins" style="color: #333;">
                                        <p>"HIMSI telah memberikan saya pengalaman luar biasa dalam mengembangkan skill di bidang sistem informasi. Study club dan kegiatan-kegiatannya sangat membantu karir saya."</p>
                                        <footer class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('asset/logo/himsi.png') }}" alt="" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            <div class="text-start">
                                                <cite class="mb-0 fw-bold">Ahmad Rizki</cite>
                                                <small class="text-muted d-block">Alumni 2022 - Software Engineer</small>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="carousel-item">
                        <div class="col-md-8 mx-auto">
                            <div class="card testimonial-card border-0">
                                <div class="card-body text-center p-5">
                                    <i class="fas fa-quote-left fa-3x text-primary mb-4" aria-hidden="true"></i>
                                    <blockquote class="card-text fs-5 mb-4 Poppins">
                                        <p>"Bergabung dengan HIMSI adalah keputusan terbaik selama kuliah. Saya belajar banyak tentang leadership, teamwork, dan teknologi terkini melalui berbagai program mereka."</p>
                                        <footer class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('asset/logo/himsi.png') }}" alt="" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            <div class="text-start">
                                                <cite class="mb-0 fw-bold">Siti Nurhaliza</cite>
                                                <small class="text-muted d-block">Alumni 2023 - Data Analyst</small>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="carousel-item">
                        <div class="col-md-8 mx-auto">
                            <div class="card testimonial-card border-0">
                                <div class="card-body text-center p-5">
                                    <i class="fas fa-quote-left fa-3x text-primary mb-4" aria-hidden="true"></i>
                                    <blockquote class="card-text fs-5 mb-4 Poppins">
                                        <p>"HIMSI bukan hanya organisasi, tapi keluarga besar yang selalu mendukung. Networking yang dibangun di sini sangat berharga untuk masa depan karir."</p>
                                        <footer class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('asset/logo/himsi.png') }}" alt="" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            <div class="text-start">
                                                <cite class="mb-0 fw-bold">Budi Santoso</cite>
                                                <small class="text-muted d-block">Mahasiswa Aktif - Ketua Divisi IT</small>
                                            </div>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
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
                @foreach($artikels as $index => $artikel)
                        @if($index == 0)
                            {{-- Artikel besar (kolom kiri) --}}
                            <div class="col-12 col-lg-6 mb-4 px-2">
                                <a href="#artikel-{{ $artikel->slug }}" class="action-card-link" aria-labelledby="artikel-title-{{ $artikel->id }}" aria-describedby="artikel-desc-{{ $artikel->id }}">
                                    <div class="card action-card h-100">
                                        <img src="{{ asset('storage/' . $artikel->konten) }}" class="kegiatan-img-top" style="height: 250px;" alt="{{ $artikel->judul }}" width="600" height="250">
                                        <div class="card-body">
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
                                        <a href="#artikel-{{ $artikel->slug }}" class="action-card-link" aria-labelledby="artikel-title-{{ $artikel->id }}" aria-describedby="artikel-desc-{{ $artikel->id }}">
                                            <div class="card action-card">
                                                <div class="d-flex">
                                                    <div class="col-4">
                                                        <img src="{{ asset('storage/' . $artikel->konten) }}" class="img-fluid rounded-start" alt="{{ $artikel->judul }}" width="150" height="100">
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="card-body">
                                                            <h3 class="card-title Spartan">{{ $artikel->judul }}</h3>
                                                            <p  class="card-text">{{ Str::limit(strip_tags($artikel->deskripsi), 50) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        @endif
                    @endforeach
            </div>
        </div>
        <div class="col-12" style="margin-bottom: 100px; ">
            <div class="d-flex justify-content-start justify-content-center justify-content-md-start align-items-center mb-4">
                <h2 class="mb-1 Spartan text-center text-md-start">Tim Pengembang Website</h2>
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
@endsection