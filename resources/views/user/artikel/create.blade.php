@extends('user.layout.index')
@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/trix.css') }}">
@endsection
@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Artikel</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul Artikel --}}
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>
        </div>

        {{-- Kategori dan Status --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="pre-event" {{ old('kategori') == 'pre-event' ? 'selected' : '' }}>Pre-Event</option>
                    <option value="event" {{ old('kategori') == 'event' ? 'selected' : '' }}>Event</option>
                    <option value="post-event" {{ old('kategori') == 'post-event' ? 'selected' : '' }}>Post-Event</option>
                    <option value="artikel" {{ old('kategori') == 'artikel' ? 'selected' : '' }}>Artikel</option>
                </select>
            </div>
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'bph')
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
            @endif
        </div>

        {{-- Konten (Foto) --}}
        <div class="mb-3">
            <small class="form-text text-muted">Format: JPG, PNG, maksimal 2MB.</small>
            <label for="konten" class="form-label">Konten (Foto)</label>
            <input type="file" name="konten" id="konten" class="form-control">
            <small class="form-text text-muted">Foto Preview:</small>
            <img id="preview" src="#" alt="Preview Konten" style="max-width: 200px; display: none; margin-top: 10px;">
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
    <script src="{{ asset('home/dashboard/preview.js') }}"></script>
    <script src="{{ asset('home/dashboard/trix.js') }}"></script>
@endsection
