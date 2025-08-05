@extends('home.layout.index')
    @section('content')
        <main class="mt-5 Spartan">
            <h1 class="text-center " style="color: #00008B">{{ $album->nama }}</h1>
            <p class="text-center Poppins">{{ $album->deskripsi }}</p>
        </main>
        <section class="mt-5 mb-5 container-1500">
            <div class="row Spartan">
                @foreach ($album->konten as $item)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card artikel-card h-100 border-0 position-relative overflow-hidden">
                            <div class="image-container position-relative">
                                <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                                </a>
                                @if (!empty($item->nama))
                                    <!-- Overlay text yang muncul saat hover -->
                                    <div class="overlay-text position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-white text-center p-3"
                                        style="background: rgba(0,0,0,0.7); opacity: 0; transition: opacity 0.3s ease;">
                                        <div>
                                            <h5 class="fw-bold mb-0">{{ $item->nama }}</h5>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

    @endsection
@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
@endsection