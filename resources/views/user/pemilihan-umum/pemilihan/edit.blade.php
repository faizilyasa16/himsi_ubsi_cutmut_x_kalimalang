@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Pemilihan Umum</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pemilihan.update', $pemilihan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemilihan</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pemilihan->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $pemilihan->slug) }}" readonly>
        </div>
        <div class="mb-3">
            <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
            <input type="datetime-local" name="tgl_mulai" id="tgl_mulai" value="{{ old('tgl_mulai', $pemilihan->tgl_mulai) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
            <input type="datetime-local" name="tgl_selesai" id="tgl_selesai" value="{{ old('tgl_selesai', $pemilihan->tgl_selesai) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="" disabled selected>Pilih Status</option>
                <option value="belum-mulai" {{ old('status', $pemilihan->status) == 'belum-mulai' ? 'selected' : '' }}>Belum Mulai</option>
                <option value="mulai" {{ old('status', $pemilihan->status) == 'mulai' ? 'selected' : '' }}>Mulai</option>
                <option value="selesai" {{ old('status', $pemilihan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"  rows="3"> {{ old('deskripsi', $pemilihan->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
@endsection
