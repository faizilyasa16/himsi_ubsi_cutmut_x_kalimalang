@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Kategori Acara</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori-acara.update', $kategoriAcara->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $kategoriAcara->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $kategoriAcara->slug) }}" readonly>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kategoriAcara->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
@endsection
