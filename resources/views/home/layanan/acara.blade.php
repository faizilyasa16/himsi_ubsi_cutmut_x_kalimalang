@extends('home.layout.index')

@section('content')
    <header class="my-5 Spartan text-center">
        <h1 class="fw-bolder mb-3" style="font-size: 3rem; color: #00008B;">Acara HIMSI</h1>
        <p class="lead mb-0 Poppins" style="font-size: 1.2rem; opacity: 0.9;">Kumpulan artikel, berita, dan tutorial seputar Sistem Informasi dan teknologi terkini</p>
    </header>
    <section class="container-1500">
        <div class="row">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="col-12 col-md-4 mb-4 px-2">
                <a href="#" class="action-card-link" >
                    <div class="card action-card">
                        <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="kegiatan-img-top" alt="Mahasiswa belajar bersama dalam kegiatan Study Club" width="400" height="267">
                        <div class="card-body Poppins d-flex flex-column">
                            <h3 class="card-title Spartan">Kegiatan Study Club</h3>
                            <ul class="list-unstyled ">
                                <li><i class="bi bi-calendar-event-fill text-primary me-2"></i>10 Maret 2025</li>
                                <li><i class="bi bi-clock text-danger me-2"></i>10.00 - 12.00 WIB</li>
                                <li><i class="bi bi-geo-alt-fill text-danger me-2"></i>Hybrid</li>
                                <li><i class="bi bi-people-fill text-info me-2"></i>100 Peserta</li>
                            </ul>
                            <span class="badge bg-danger align-self-start">Belum Dimulai</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 mb-4 px-2">
                <a href="#" class="action-card-link" >
                    <div class="card action-card">
                        <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="kegiatan-img-top" alt="Mahasiswa belajar bersama dalam kegiatan Study Club" width="400" height="267">
                        <div class="card-body Poppins d-flex flex-column">
                            <h3 class="card-title Spartan">Kegiatan Study Club</h3>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-calendar-event-fill text-primary me-2"></i>10 Maret 2025</li>
                                <li><i class="bi bi-clock text-danger me-2"></i>10.00 - 12.00 WIB</li>
                                <li><i class="bi bi-geo-alt-fill text-danger me-2"></i>Hybrid</li>
                                <li><i class="bi bi-people-fill text-info me-2"></i>100 Peserta</li>
                            </ul>
                            <span class="badge bg-primary align-self-start">Sedang Berlangsung</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 mb-4 px-2">
                <a href="#" class="action-card-link" >
                    <div class="card action-card">
                        <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="kegiatan-img-top" alt="Mahasiswa belajar bersama dalam kegiatan Study Club" width="400" height="267">
                        <div class="card-body Poppins d-flex flex-column">
                            <h3 class="card-title Spartan">Kegiatan Study Club</h3>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-calendar-event-fill text-primary me-2"></i>10 Maret 2025</li>
                                <li><i class="bi bi-clock text-danger me-2"></i>10.00 - 12.00 WIB</li>
                                <li><i class="bi bi-geo-alt-fill text-danger me-2"></i>Hybrid</li>
                                <li><i class="bi bi-people-fill text-info me-2"></i>100 Peserta</li>
                            </ul>
                            <span class="badge bg-success align-self-start">Selesai</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 mb-4 px-2">
                <a href="#" class="action-card-link" >
                    <div class="card action-card">
                        <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="kegiatan-img-top" alt="Mahasiswa belajar bersama dalam kegiatan Study Club" width="400" height="267">
                        <div class="card-body Poppins d-flex flex-column">
                            <h3 class="card-title Spartan">Kegiatan Study Club</h3>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-calendar-event-fill text-primary me-2"></i>10 Maret 2025</li>
                                <li><i class="bi bi-clock text-danger me-2"></i>10.00 - 12.00 WIB</li>
                                <li><i class="bi bi-geo-alt-fill text-danger me-2"></i>Hybrid</li>
                                <li><i class="bi bi-people-fill text-info me-2"></i>100 Peserta</li>
                            </ul>
                            <span class="badge bg-danger align-self-start">Belum Dimulai</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 mb-4 px-2">
                <a href="#" class="action-card-link" >
                    <div class="card action-card">
                        <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="kegiatan-img-top" alt="Mahasiswa belajar bersama dalam kegiatan Study Club" width="400" height="267">
                        <div class="card-body Poppins d-flex flex-column">
                            <h3 class="card-title Spartan">Kegiatan Study Club</h3>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-calendar-event-fill text-primary me-2"></i>10 Maret 2025</li>
                                <li><i class="bi bi-clock text-danger me-2"></i>10.00 - 12.00 WIB</li>
                                <li><i class="bi bi-geo-alt-fill text-danger me-2"></i>Hybrid</li>
                                <li><i class="bi bi-people-fill text-info me-2"></i>100 Peserta</li>
                            </ul>
                            <span class="badge bg-danger align-self-start">Belum Dimulai</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/js/layout.js') }}"></script>
@endsection