@extends('home.layout.index')
@section('content')
    <main class="mt-5 Spartan text-center">
        <h1 style="color: #00008B">eVoting – Sistem Pemungutan Suara Berbasis Digital untuk HIMSI</h1>
        <p class="lead Poppins">Berikan suara Anda untuk memilih kandidat terbaik dan ikut menentukan arah HIMSI UBSI Cut Mutia x Kalimalang ke depan.</p>
    </main>
    <section class="container-1500 mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3 rounded-4">
                    <div class="row g-0 align-items-center">
                        <!-- Gambar -->
                        <div class="col-md-3 d-flex justify-content-center">
                            <img src="{{ asset('asset/logo/vote.png') }}" 
                                class="img-fluid rounded-start" 
                                alt="Gambar Voting"
                                style="max-height: 250px; object-fit: cover;">
                        </div>

                        <!-- Teks -->
                        <div class="col-md-9">
                            <div class="card-body Poppins">
                                <h3 class="card-title Spartan">Pemilihan Ketua HIMSI Periode 2025</h2>
                                <div class="d-flex align-items-center mt-3 mb-3">
                                    <span class="badge bg-success">Voting Dibuka</span>
                                </div>
                                <div class="mb-3" style="width: 100%; height: 2px; background-color: #00008B"></div>
                                <div class="d-flex flex-column">
                                    <span class="text-muted">18 Oct 2025 - 25 Oct 2025 08:00 WIB</span>
                                    <a href="#" class="text-decoration-none mt-3">Vote Sekarang <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection