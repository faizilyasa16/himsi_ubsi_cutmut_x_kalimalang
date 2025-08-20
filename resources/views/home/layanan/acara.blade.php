@extends('home.layout.index')

@section('content')
    <header class="my-5 Spartan text-center">
        <h1 class="fw-bolder mb-3" style="font-size: 3rem; color: #00008B;">Acara HIMSI</h1>
        <p class="lead mb-0 Poppins" style="font-size: 1.2rem; opacity: 0.9;">Kumpulan artikel, berita, dan tutorial seputar Sistem Informasi dan teknologi terkini</p>
    </header>
    <section class="container-1500">
        <div class="row justify-content-center">
            @forelse ($acara as $item)
                <div class="col-12 col-md-4 mb-4 px-2">
                    <a href="{{ route('acara.show', $item) }}" class="action-card-link">
                        <div class="card action-card h-100">
                            <img src="{{ asset('storage/' . $item->poster) }}" class="kegiatan-img-top"
                                alt="{{ $item->nama }}" width="400" height="267" style="object-fit: cover;">
                            <div class="card-body Poppins d-flex flex-column">
                                <h3 class="card-title Spartan">{{ $item->nama }}</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="bi bi-calendar-event-fill text-primary me-2"></i>
                                        @if ($item->tanggal_selesai && $item->tanggal_mulai != $item->tanggal_selesai)
                                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }} - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}
                                        @endif
                                    </li>
                                    @if ($item->waktu_mulai || $item->waktu_selesai)
                                        <li>
                                            <i class="bi bi-clock text-primary me-2"></i>
                                            @if ($item->waktu_mulai && $item->waktu_selesai)
                                                {{ $item->waktu_mulai }} - {{ $item->waktu_selesai }} WIB
                                            @elseif ($item->waktu_mulai)
                                                {{ $item->waktu_mulai }} WIB
                                            @elseif ($item->waktu_selesai)
                                                Sampai {{ $item->waktu_selesai }} WIB
                                            @endif
                                        </li>
                                    @endif
                                    <li><i class="bi bi-geo-alt-fill text-primary me-2"></i>{{ $item->lokasi }}</li>
                                    @if($item->kuota)
                                        <li><i class="bi bi-people-fill text-primary me-2"></i>{{ $item->kuota }} Peserta</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center my-5">
                    <h4 class="text-muted Poppins">Belum ada acara yang tersedia.</h4>
                </div>
            @endforelse

        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $acara->links() }}
        </div>

    </section>
@endsection

@section('scripts')
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection