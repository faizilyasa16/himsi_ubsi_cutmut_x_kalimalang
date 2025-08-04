@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Kandidat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kandidat.update', $kandidat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Ketua & Wakil --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kandidat_ketua_id" class="form-label">Kandidat Ketua</label>
                <select name="kandidat_ketua_id" id="kandidat_ketua_id" class="form-select" required>
                    <option value="" disabled>Pilih Ketua</option>
                    @foreach ($pengurus as $user)
                        <option value="{{ $user->id }}" {{ $kandidat->kandidat_ketua_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="kandidat_wakil_id" class="form-label">Kandidat Wakil</label>
                <select name="kandidat_wakil_id" id="kandidat_wakil_id" class="form-select">
                    <option value="" disabled>Pilih Wakil</option>
                    @foreach ($pengurus as $user)
                        <option value="{{ $user->id }}" {{ $kandidat->kandidat_wakil_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Pemilihan & No Urut --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pemilihan_id" class="form-label">Pemilihan</label>
                <select name="pemilihan_id" id="pemilihan_id" class="form-select" required>
                    <option value="" disabled>Pilih Pemilihan</option>
                    @foreach ($pemilihans as $pemilihan)
                        <option value="{{ $pemilihan->id }}" {{ $kandidat->pemilihan_id == $pemilihan->id ? 'selected' : '' }}>
                            {{ $pemilihan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="no_urut" class="form-label">Nomor Urut</label>
                <input type="number" name="no_urut" id="no_urut" class="form-control" value="{{ $kandidat->no_urut }}" required>
            </div>
        </div>

        {{-- Visi & Misi --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="visi" class="form-label">Visi</label>
                <textarea name="visi" id="visi" class="form-control" rows="4" required>{{ $kandidat->visi }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="misi" class="form-label">Misi</label>
                <textarea name="misi" id="misi" class="form-control" rows="4" required>{{ $kandidat->misi }}</textarea>
            </div>
        </div>

        {{-- Poster --}}
        <div class="mb-3">
            <label for="poster" class="form-label">Poster (Opsional, jika ingin ganti)</label>
            <input type="file" name="poster" id="poster" class="form-control" accept="image/*">
            @if ($kandidat->poster)
                <small class="d-block mt-2">Poster saat ini:</small>
                <img src="{{ asset('storage/' . $kandidat->poster) }}" alt="Poster Kandidat" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Kandidat</button>
    </form>
</main>
@endsection
