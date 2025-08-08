@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="me-3">Kesan dan Pesan</h1>
        <a href="{{ route('kesan-pesan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2 p-0"></i>Tambah Kesan dan Pesan
        </a>
    </div>
    @if ($kesanPesans->isEmpty())
        <div class="alert alert-info">Belum ada kesan dan pesan yang ditinggalkan.</div>
    @else
    <section class="row">
        @foreach ($kesanPesans as $kesanPesan)
            <div class="col-4 mb-3">
                <div class="border p-3 bg-light rounded">
                    <h5>{{ $kesanPesan->user->name }}</h5>
                    <p><strong>Kesan dan Pesan:</strong> {{ $kesanPesan->kesan_pesan }}</p>
                    <small class="text-muted">Dibuat pada {{ $kesanPesan->created_at->format('d M Y H:i') }}</small>
                    <div class="d-flex justify-content-end mt-2">
                    <a href="{{ route('kesan-pesan.edit', $kesanPesan->id) }}" class="btn btn-sm btn-secondary me-2">Kelola</a>
                    <form action="{{ route('kesan-pesan.destroy', $kesanPesan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    @endif
</main>
@endsection