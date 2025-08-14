@extends('user.layout.index')
@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/trix.css') }}">
@endsection

@section('content')
<main class="mt-5 container-fluid ">
    <h1>Edit Artikel</h1>

    @if (session('error_message'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Memperbarui',
                html: '{{ session("error_message") }}',
            });
        </script>
    @endif



    <form action="{{ route('artikel.update', $artikel->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul Artikel --}}
        <div class="row">
            <div class="col-md-12 mb-3 Spartan">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}" required>
            </div>
        </div>

        {{-- Kategori dan Status --}}
        <div class="row">
            <div class="col-md-6 mb-3 Spartan">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="pre-event" {{ old('kategori', $artikel->kategori) == 'pre-event' ? 'selected' : '' }}>Pre-Event</option>
                    <option value="event" {{ old('kategori', $artikel->kategori) == 'event' ? 'selected' : '' }}>Event</option>
                    <option value="post-event" {{ old('kategori', $artikel->kategori) == 'post-event' ? 'selected' : '' }}>Post-Event</option>
                    <option value="artikel" {{ old('kategori', $artikel->kategori) == 'artikel' ? 'selected' : '' }}>Artikel</option>
                </select>
            </div>
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'bph')
                <div class="col-md-6 mb-3 Spartan">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $artikel->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $artikel->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
            @else
                <input type="hidden" name="status" value="{{ $artikel->status }}">
            @endif
        </div>

        {{-- Konten (Foto) --}}
        <div class="mb-3">
            <label for="konten" class="form-label Spartan">Konten (Foto)</label>
            <input type="file" name="konten" id="konten" class="form-control" accept="image/*">
            
            @if ($artikel->konten)
                <small class="text-muted d-block Spartan">Foto saat ini:</small>
                <img src="{{ asset('storage/' . $artikel->konten) }}" alt="Foto Artikel" class="img-thumbnail" style="max-width: 200px;">
            @endif
        </div>


        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label Spartan">Deskripsi</label>
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $artikel->deskripsi) }}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/trix.js') }}"></script>
@endsection
