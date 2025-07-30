@extends('user.layout.index')

@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/trix.css') }}">
@endsection

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Kegiatan Absensi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kegiatan-absensi.update', $kegiatan->slug) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama & Slug --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $kegiatan->nama) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $kegiatan->slug) }}" readonly>
            </div>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Tanggal</label>
            <input type="datetime-local" name="waktu" id="waktu" class="form-control"
                value="{{ old('waktu', \Carbon\Carbon::parse($kegiatan->waktu)->format('Y-m-d\TH:i')) }}" required>
        </div>

        {{-- Lokasi & Status --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $kegiatan->lokasi) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="" disabled>Pilih Status</option>
                    <option value="draft" {{ old('status', $kegiatan->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="open" {{ old('status', $kegiatan->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status', $kegiatan->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $kegiatan->deskripsi) }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/trix.js') }}"></script>
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
@endsection
