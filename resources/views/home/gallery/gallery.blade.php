@extends('home.layout.index')
@section('content')
    <main class="mt-5 Spartan">
        <h1 class="text-center " style="color: #00008B">Gallery HIMSI</h1>
        <p class="text-center Poppins">Galeri ini berisi kenangan berharga dari berbagai program dan kegiatan HIMSI UBSI Cut Mutia x Kalimalang.</p>
    </main>
    <section class="mt-5 mb-5 container-1500">
        <div class="row Spartan">
            @php
                $tahunSebelumnya = null;
            @endphp

            @foreach ($gallery as $item)
                @php
                    $tahun = $item->album->tahun ?? 'Tidak diketahui';
                @endphp

                @if ($tahun !== $tahunSebelumnya)
                    <div class="col-12 mt-5">
                        <h2>Galeri Tahun {{ $tahun }}</h2>
                    </div>
                    @php
                        $tahunSebelumnya = $tahun;
                    @endphp
                @endif

                <div class="col-12 col-md-4 mb-4">
                    <a href="{{ route('gallery.show', $item->album) }}" class="text-decoration-none">
                        <div class="card artikel-card h-100 border-0">
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 250px; object-fit: cover;">
                            </div>
                            <div class="card-body Poppins">
                                <div class="d-flex justify-content-start align-items-center mb-3">
                                    <span class="artikel-date">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                <h5 class="card-title fw-bold Spartan">{{ $item->nama }}</h5>
                                <p class="card-text">
                                    {{ $item->album->deskripsi ?? 'Tidak ada deskripsi album.' }}
                                </p>
                        </div>
                    </a>

                </div>
            @endforeach

            {{-- Tampilkan pagination --}}
            <div class="col-12">
                {{ $gallery->links() }}
            </div>

        </div>
    </section>

@endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection