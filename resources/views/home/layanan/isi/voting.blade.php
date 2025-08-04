@extends('home.layout.index')
@section('content')
    <main class="mt-5 Spartan text-center">
        <h1 style="color: #00008B">eVoting – Sistem Pemungutan Suara Berbasis Digital untuk HIMSI</h1>
        <p class="lead Poppins">Berikan suara Anda untuk memilih kandidat terbaik dan ikut menentukan arah HIMSI UBSI Cut Mutia x Kalimalang ke depan.</p>
    </main>
    <section class="container-1500 my-5">
        <div class="row justify-content-center">
            @foreach ($pemilihan->kandidat as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow rounded-3">
                        <div class="card-body text-center">
                            <h2 class="card-title mb-3 Spartan">{{ $item->no_urut }}</h2>
                            <img src="{{ asset('storage/' . $item->poster) }}" alt=""
                                class="img-fluid mx-auto d-block mb-3"
                                style="height: auto; width: auto; max-height: 300px; object-fit: cover;">

                                <span class="card-text d-block mb-4 fw-bold Poppins">
                                    {{ $item->ketua->name }}@if($item->wakil) - {{ $item->wakil->name }}@endif
                                </span>

                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="btn btn-primary w-50 fs-5" data-bs-toggle="modal" data-bs-target="#visiMisiModal-{{ $item->id }}">
                                    <i class="bi bi-info-circle fs-5 me-2"></i>Visi Misi
                                </a>
                                    @if (
                                        !$sudahVote &&
                                        ($pemilihan->status !== 'selesai') &&
                                        (Auth::user()->role === 'bph' || Auth::user()->role === 'anggota')
                                    )
                                        <button type="button" class="btn btn-success w-50 fs-5"
                                            onclick="confirmVote({{ $item->id }}, '{{ $item->ketua->name }}{{ $item->wakil ? ' - ' . $item->wakil->name : '' }}')">
                                            <i class="bi bi-hand-thumbs-up fs-5 me-2"></i> Vote
                                        </button>

                                        <!-- Form tersembunyi untuk submit vote -->
                                        <form id="voteForm" action="{{ route('voting.store') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="pemilihan_id" value="{{ $pemilihan->id }}">
                                            <input type="hidden" name="kandidat_id" id="kandidat_id">
                                        </form>
                                    @endif


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Modal -->
            <div class="modal fade" id="visiMisiModal-{{ $item->id }}" tabindex="-1" aria-labelledby="visiMisiModalLabel-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-3 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="visiMisiModalLabel-{{ $item->id }}">Visi dan Misi Kandidat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-start">
                    <h6 class="fw-bold">Visi:</h6>
                    <p>{{ $item->visi ?? 'Belum diisi.' }}</p>
                    <h6 class="fw-bold mt-3">Misi:</h6>
                    <p>{{ $item->misi ?? 'Belum diisi.' }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>

            <div class="col-12 mt-5">
                <button class="btn btn-primary w-25 d-block mx-auto fs-5" data-bs-toggle="modal" data-bs-target="#votingChartModal">
                    <i class="bi bi-bar-chart fs-5 me-2"></i> Cek Hasil Voting
                </button>
            </div>
                <!-- Modal Hasil Voting -->
                <div class="modal fade" id="votingChartModal" tabindex="-1" aria-labelledby="votingChartModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content rounded-4 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title" id="votingChartModalLabel">Hasil Voting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="chart-wrapper w-100 ">
                        <div class="mx-auto" style="min-width: 300px; max-width: 100%;">
                            {!! $votingChart->container() !!}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        {!! $votingChart->script() !!}
    <script>
        function confirmVote(kandidatId, namaKandidat) {
            Swal.fire({
                title: 'Konfirmasi Vote',
                text: `Apakah Anda yakin ingin memilih "${namaKandidat}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Pilih!',
                cancelButtonText: 'Tidak',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-success ms-3',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set kandidat ID ke form
                    document.getElementById('kandidat_id').value = kandidatId;
                    
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Mengirim Vote...',
                        text: 'Mohon tunggu sebentar',
                        icon: 'info',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Submit form
                    document.getElementById('voteForm').submit();
                }
            });
        }
    </script>

@endsection