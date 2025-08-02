@extends('user.layout.index')

@section('styles')
    <style>
        .keterangan-text {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out, opacity 0.5s ease-out;
        }
        .keterangan-text.show {
            max-height: 300px; /* tinggi maksimal saat form ditampilkan */
            opacity: 1;
        }
    </style>
@endsection

@section('content')
<main class="mt-5 container-fluid Spartan">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start align-items-center mb-4">
                <h1 class="m-0">Absensi HIMSI UBSI Cut Mutia x Kalimalang</h1>
            </div>
        </div>
        @foreach ($absensi as $item)
            <div class="col-4">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->kegiatan->nama }}</h5>

                    <div class="d-flex flex-column mb-3">
                    <p class="card-text">
                        {{ Str::limit(strip_tags($item->kegiatan->deskripsi), 100) }}
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Tanggal: {{ $item->kegiatan->waktu }}</small>
                    </p>
                    </div>
                    
                    @if ($item->status)
                        <div class="alert 
                            @if ($item->status == 'hadir') alert-success 
                            @elseif ($item->status == 'izin') alert-warning 
                            @elseif ($item->status == 'tidak_hadir') alert-danger 
                            @else alert-secondary 
                            @endif
                            mb-3">

                            Status: 
                            <strong>
                                @if ($item->status == 'hadir')
                                    Hadir
                                @elseif ($item->status == 'izin')
                                    Izin
                                @elseif ($item->status == 'tidak_hadir')
                                    Tidak Hadir
                                @else
                                    Belum Absen
                                @endif
                            </strong>

                            <p class="mb-0 mt-2">
                                @if ($item->status == 'hadir' || $item->status == 'izin')
                                    <small class="text-muted">Sudah melakukan absensi pada: {{ $item->updated_at->format('d-m-Y H:i') }}</small>
                                @else
                                    <small class="text-muted">Belum melakukan absensi</small>
                                @endif
                            </p>
                        </div>

                    @else
                        <div class="d-flex align-items-center gap-2">
                            <a href="#" class="btn btn-primary w-50" data-action="hadir">Hadir</a>
                            <a href="#" class="btn btn-secondary w-50" data-action="izin">Izin</a>
                        </div>
                    @endif

                    @if (!$item->status)
                        <div class="keterangan-text mt-3" data-keterangan="hadir">
                            <form id="form-hadir-{{ $item->kegiatan->id }}" action="{{ route('absensi.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="kegiatan_id" value="{{ $item->kegiatan->id }}">
                                <input type="hidden" name="status" value="hadir">
                                <div class="mb-3">
                                    <label for="keterangan-hadir-{{ $item->kegiatan->id }}" class="form-label">Keterangan Hadir</label>
                                    <textarea class="form-control" id="keterangan-hadir-{{ $item->kegiatan->id }}" name="keterangan" rows="3" placeholder="Masukkan keterangan kehadiran (opsional)"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Simpan Kehadiran</button>
                            </form>
                        </div>
                        <div class="keterangan-text mt-3" data-keterangan="izin">
                            <form id="form-izin-{{ $item->kegiatan->id }}" action="{{ route('absensi.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="kegiatan_id" value="{{ $item->kegiatan->id }}">
                                <input type="hidden" name="status" value="izin">
                                <div class="mb-3">
                                    <label for="keterangan-izin-{{ $item->kegiatan->id }}" class="form-label">Alasan Izin</label>
                                    <textarea class="form-control" id="keterangan-izin-{{ $item->kegiatan->id }}" name="keterangan" rows="3" placeholder="Masukkan alasan izin" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning btn-sm">Simpan Izin</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

        </div>
        @endforeach
        <div class="col-12 mt-4 d-flex justify-content-center">
            {{ $absensi->links() }}
        </div>

    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/absensi.js') }}"></script>
@endsection
