@extends('home.layout.index')
@section('content')
    <main class="mt-5 Spartan">
        <h1 class="text-center " style="color: #00008B">Gallery HIMSI</h1>
        <p class="text-center Poppins">Galeri ini berisi kenangan berharga dari berbagai program dan kegiatan HIMSI UBSI Cut Mutia x Kalimalang.</p>
    </main>
    <section class="mt-5 mb-5 container-1500">
        <div class="row Spartan">
            <div class="col-12">
                <h2>Kegiatan Tahun 2025</h2>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('asset/kegiatan/santunan.jpg') }}" class="card-img-top" alt="Kegiatan 1" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Kegiatan 1</h5>
                        <p class="card-text Poppins">Deskripsi singkat tentang kegiatan 1.</p>
                    </div>
                </div>    
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="card-img-top" alt="Kegiatan 2" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Kegiatan 2</h5>
                        <p class="card-text Poppins">Deskripsi singkat tentang kegiatan 2.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('asset/kegiatan/studyclub.jpg') }}" class="card-img-top" alt="Kegiatan 3" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Kegiatan 3</h5>
                        <p class="card-text Poppins">Deskripsi singkat tentang kegiatan 3.</p>
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