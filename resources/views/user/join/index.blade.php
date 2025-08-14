@extends('user.layout.index')
@section('content')
    <main class="mt-5 container-fluid Spartan">
        <h1 style="font-size: 2rem;">Join HIMSI</h1>
        <form action="{{ route('join-himsi.store') }}" method="POST">
            @csrf
            @if($joinHimsi)
                @method('PUT')
            @endif

            <div class="mb-3 d-flex flex-column">
                <label for="link" class="form-label">Link Pendaftaran</label>
                <small class="form-text text-muted">Masukkan URL Google Form atau link pendaftaran lainnya.</small>
                <input type="url" name="link" id="link"
                       class="form-control"
                       placeholder="https://example.com/form"
                       value="{{ old('link', $joinHimsi->link ?? '') }}"
                       required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </main>
@endsection
