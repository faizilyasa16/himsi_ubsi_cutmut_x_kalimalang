@extends('home.layout.index')
@section('content')
<main class="container-1500 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Poster Acara -->
                @if($acara->poster)
                <div class="text-center bg-light p-4">
                    <img src="{{ asset('storage/' . $acara->poster) }}" 
                         alt="{{ $acara->nama }}" 
                         class="img-fluid rounded-3 shadow-sm" 
                         style="max-height: 500px; width: auto;">
                </div>
                @endif

                <div class="card-body p-4 p-md-5">
                    <!-- Nama/Judul Acara -->
                    <h1 class="display-5 fw-bold Spartan mb-4 text-primary text-center">
                        {{ $acara->nama }}
                    </h1>
                    
                    
                    <!-- Informasi Waktu dan Detail -->
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-calendar3 fs-3 me-3 text-primary"></i>
                                <div>
                                    <h6 class="mb-1 text-muted fw-semibold">Tanggal & Waktu</h6>
                                    <p class="mb-0 fw-bold">
                                        {{ \Carbon\Carbon::parse($acara->waktu_mulai)->isoFormat('dddd, D MMMM Y') }}
                                    </p>
                                    <p class="mb-0 text-muted">
                                        {{ \Carbon\Carbon::parse($acara->waktu_mulai)->format('H:i') }} WIB
                                        @if($acara->waktu_selesai)
                                            - {{ \Carbon\Carbon::parse($acara->waktu_selesai)->format('H:i') }} WIB
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-geo-alt fs-3 me-3 text-primary"></i>
                                <div>
                                    <h6 class="mb-1 text-muted fw-semibold">Lokasi</h6>
                                    <p class="mb-0 fw-bold">{{ $acara->lokasi }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @if($acara->kuota)
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-people fs-3 me-3 text-primary"></i>
                                <div>
                                    <h6 class="mb-1 text-muted fw-semibold">Kuota Peserta</h6>
                                    <p class="mb-0 fw-bold">{{ $acara->kuota }} Orang</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if($acara->biaya)
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-cash-coin fs-3 me-3 text-primary"></i>
                                <div>
                                    <h6 class="mb-1 text-muted fw-semibold">Biaya</h6>
                                    <p class="mb-0 fw-bold">
                                        @if($acara->biaya == '0' || strtolower($acara->biaya) == 'gratis')
                                            <span class="text-success">GRATIS</span>
                                        @else
                                            <span class="text-danger">Rp{{ number_format((int) preg_replace('/\D/', '', $acara->biaya), 0, ',', '.') }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Deskripsi Acara -->
                    <div class="mb-5">
                        <h3 class="Spartan mb-3 border-bottom border-primary pb-2">
                            <i class="bi bi-info-circle me-2"></i>Deskripsi Acara
                        </h3>
                        <div class="Poppins fs-5 lh-lg text-dark">
                            {!! nl2br(e($acara->deskripsi)) !!}
                        </div>
                    </div>
                    
                    <!-- Contact Person dan Link -->
                    @if($acara->contact_person || $acara->link_wa || $acara->link_pendaftaran)
                        <div class="border-top pt-4 text-center">
                            <h4 class="Spartan mb-3">Informasi Kontak</h4>
                            <div class="row d-flex justify-content-center align-items-center p-0">
                                @if($acara->link_wa)
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <a href="{{ $acara->link_wa }}" target="_blank" class="btn btn-success btn-lg">
                                            <i class="bi bi-whatsapp me-2"></i>WhatsApp
                                        </a>
                                    </div>
                                </div>
                                @endif
                                
                                @if($acara->link_pendaftaran)
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <a href="{{ $acara->link_pendaftaran }}" target="_blank" class="btn btn-primary btn-lg">
                                            <i class="bi bi-person-plus-fill me-2"></i>Daftar Sekarang
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                    <!-- Payment Information -->
                    {{-- @if($acara->payment_method && $acara->payment_number && $acara->payment_name)
                    <div class="border-top pt-4 mt-4">
                        <h4 class="Spartan mb-3">Informasi Pembayaran</h4>
                        <div class="alert alert-info">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <p class="mb-1"><strong>Metode:</strong> {{ $acara->payment_method }}</p>
                                    <p class="mb-1"><strong>Nomor:</strong> {{ $acara->payment_number }}</p>
                                    <p class="mb-0"><strong>Atas Nama:</strong> {{ $acara->payment_name }}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <i class="bi bi-credit-card-2-front fs-1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif --}}
                </div>
            </div>
            
            <!-- Tombol Kembali -->
            <div class="text-center mt-4">
                <a href="{{ route('acara.index') }}" class="btn btn-cari btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Acara
                </a>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection