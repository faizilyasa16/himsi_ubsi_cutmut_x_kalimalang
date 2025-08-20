@extends('home.layout.index')

@section('content')
<main class="card container-fluid text-white position-relative overflow-hidden" style="border-radius: 0; background-color: #00008B; height: 400px;">
    <!-- Overlay dengan animasi gradient -->
    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center Spartan bg-gradient-animated text-center" style="background: linear-gradient(135deg, rgba(0, 0, 139, 0.8) 0%, rgba(65, 105, 225, 0.8) 100%); animation: gradientFlow 10s ease infinite;">
        <!-- Logo baris atas dengan animasi fade in -->
        <div class="d-flex gap-4 mb-3 animate-logos">
            <img src="{{ asset('asset/logo/himsi1.png') }}" alt="Logo HIMSI" class="logo-animated" style="height: 100px; animation: fadeInDown 1s ease, pulse 3s infinite alternate;">
            <img src="{{ asset('asset/logo/ubsi.png') }}" alt="Logo UBSI" class="logo-animated" style="height: 100px; animation: fadeInDown 1s ease 0.3s, pulse 3s infinite alternate 1.5s;">
        </div>
        
        <!-- Judul dengan animasi typing (dikelola oleh JS) -->
        <h1 id="typing-title" class="card-title fw-bold mx-auto" style="height: auto; border-right: .15em solid white; overflow: hidden; letter-spacing: .1em;"></h1>

        
        <!-- Elemen dekoratif dengan animasi floating -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="pointer-events: none;">
            <div class="position-absolute" style="width: 80px; height: 80px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 20%; left: 15%; animation: float 6s ease-in-out infinite;"></div>
            <div class="position-absolute" style="width: 50px; height: 50px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 30%; right: 20%; animation: float 4s ease-in-out infinite 1s;"></div>
            <div class="position-absolute" style="width: 120px; height: 120px; border: 2px solid rgba(255,255,255,0.1); border-radius: 50%; bottom: 15%; right: 25%; animation: float 8s ease-in-out infinite 2s;"></div>
        </div>
    </div>
</main>

<section class="container py-5">
    <div class="row g-4">
        @forelse ($pengurus as $user)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded overflow-hidden transform-on-hover">
                    <div class="position-relative">
                        <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('asset/logo/himsi.png') }}" class="card-img-top" alt="{{ $user->name }}" style="height: 400px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-25 text-white p-3 Poppins">
                            <h4 class="card-title mb-1 fw-bold">{{ $user->name }}</h4>
                            <p class="card-text mb-0">
                            @if ($user->role === 'bph')
                                <div class="d-flex flex-column">
                                    <span>{{ ucwords(str_replace('_', ' ', $user->divisi)) }}</span>
                                    @if (in_array($user->divisi, ['litbang', 'kominfo', 'pendidikan', 'rsdm']))
                                        <span>{{ ucfirst($user->role) }}</span>
                                    @endif
                                </div>
                            @else
                                <div class="d-flex flex-column">
                                    <span>{{ ucwords(str_replace('_', ' ', $user->divisi)) }}</span>
                                    <span>{{ ucfirst($user->role) }}</span>
                                </div>
                            @endif

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted Poppins">Tidak ada pengurus yang tersedia.</p>
            </div>
        @endforelse

    </div>

    <div class="my-4">
        {{ $pengurus->links() }}
    </div>
</section>
@endsection
@section('scripts')
    <script src="{{ asset('home/home/layout.js') }}"></script>
    <script src="{{ asset('home/home/profile.js') }}"></script>
@endsection