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

        {{-- Judul dan Slug --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" name="judul" id="nama" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" readonly>
            </div>
        </div>

        {{-- Kategori dan Status --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="pre-event">Pre-Event</option>
                    <option value="event">Event</option>
                    <option value="post-event">Post-Event</option>
                    <option value="artikel">Artikel</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
        </div>

        {{-- Konten (Foto) --}}
        <div class="mb-3">
            <label for="konten" class="form-label">Konten (Foto)</label>
            <input type="file" name="konten" id="konten" class="form-control" accept="image/*">
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
