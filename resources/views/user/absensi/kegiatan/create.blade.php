@extends('user.layout.index')

@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/trix.css') }}">
@endsection

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Kegiatan Absensi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kegiatan-absensi.store') }}" method="POST">
        @csrf

        {{-- Nama & Slug --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" readonly>
            </div>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Tanggal</label>
            <input type="datetime-local" name="waktu" id="waktu" class="form-control" required>
        </div>

        {{-- Lokasi & Status --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="draft">Draft</option>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input id="deskripsi" type="hidden" name="deskripsi">
            <trix-editor input="deskripsi"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/trix.js') }}"></script>
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
@endsection
