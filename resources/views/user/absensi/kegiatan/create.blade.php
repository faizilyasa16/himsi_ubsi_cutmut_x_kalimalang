@extends('user.layout.index')

@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/trix.css') }}">
@endsection

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Kegiatan Absensi</h1>
    <small class="form-text text-muted my-5">*Slug akan otomatis dihasilkan dari nama acara.</small></small>
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
            <div class="col-md-12 mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="waktu" class="form-label">Tanggal</label>
                <input type="datetime-local" name="waktu" id="waktu" class="form-control" value="{{ old('waktu') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="code" class="form-label">Kode Kegiatan (Opsional)</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" maxlength="10">
            </div>
        </div>

        {{-- Lokasi & Status --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
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
