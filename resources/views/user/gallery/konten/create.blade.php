@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Konten Album</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('konten-gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Konten</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="album_id" class="form-label">Pilih Album</label>
            <select name="album_id" id="album_id" class="form-select" required>
                <option value="" disabled selected>-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <span class="form-text text-muted">Format: JPEG, PNG, JPG. Maksimal 2MB.</span>
            <input type="file" name="foto" id="foto" class="form-control" required onchange="previewFoto(event)">
            <span class="form-text text-muted">Foto Preview:</span>
            <img id="preview" src="#" alt="Preview Foto" style="max-width: 200px; display: none; margin-top: 10px;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
    <script src="{{ asset('home/dashboard/preview.js') }}"></script>
@endsection
