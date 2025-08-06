@extends('user.layout.index')
@section('content')
    <main class="mt-5 container-fluid Spartan">
        <h1>Struktur Organisasi</h1>
        <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($struktur)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="konten" class="form-label">Konten Struktur Organisasi</label>
                <small class="form-text text-muted">Format: JPG, PNG, maksimal 2MB.</small>
                <input type="file" name="konten" id="konten" class="form-control" onchange="previewFoto(event)" required>
                <div class="d-flex align-items-center">
                    @if($struktur)
                        <div class="mt-2">
                            <p>Struktur saat ini:</p>
                            <img src="{{ asset('storage/' . $struktur->konten) }}" alt="Current Struktur" style="max-width: 200px;">
                        </div>
                    @endif
                
                    <div class="mt-2">
                        <p class="form-text text-muted">Preview Struktur baru:</p>
                        <img id="preview" src="#" alt="Preview Struktur" style="max-width: 200px; display: none; margin-top: 10px;">
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </main>
@endsection
@section('scripts')
<script src="{{ asset('home/dashboard/preview.js') }}"></script>
@endsection