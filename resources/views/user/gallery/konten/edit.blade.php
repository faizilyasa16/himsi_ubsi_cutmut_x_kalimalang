@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Album</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('konten-gallery.update', $konten->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Konten</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $konten->nama) }}">
        </div>
        <div class="mb-3">
            <label for="album_id" class="form-label">Pilih Album</label>
            <select name="album_id" id="album_id" class="form-select" required>
                <option value="" disabled selected>-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" {{ $konten->album_id == $album->id ? 'selected' : '' }}>{{ $album->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <span class="form-text text-muted">Format: JPEG, PNG, JPG. Maksimal 2MB.</span>
            <input type="file" name="foto" id="foto" class="form-control" onchange="previewFoto(event)">
            <div class="d-flex justify-content-start align-items-center">
                <div class="d-flex flex-column">
                    <span class="form-text text-muted">Foto Sebelumnya:</span>
                    <img src="{{ asset('storage/' . $konten->foto) }}" alt="Preview Foto" style="max-width: 200px; margin-top: 10px;">
                </div>
                <div class="ms-3">
                    <span class="form-text text-muted">Foto Baru:</span>
                    <img id="preview" src="#" alt="Preview Foto Baru" style="max-width: 200px; display: none; margin-top: 10px;">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
    <script src="{{ asset('home/dashboard/preview.js') }}"></script>
@endsection
