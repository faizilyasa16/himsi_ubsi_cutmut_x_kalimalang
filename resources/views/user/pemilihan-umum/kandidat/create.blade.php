@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Kandidat</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('kandidat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Ketua & Wakil --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kandidat_ketua_id" class="form-label">Kandidat Ketua</label>
                <select name="kandidat_ketua_id" id="kandidat_ketua_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Ketua</option>
                    @foreach ($pengurus as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="kandidat_wakil_id" class="form-label">Kandidat Wakil</label>
                <select name="kandidat_wakil_id" id="kandidat_wakil_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Wakil</option>
                    @foreach ($pengurus as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Pemilihan & No Urut --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pemilihan_id" class="form-label">Pemilihan</label>
                <select name="pemilihan_id" id="pemilihan_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Pemilihan</option>
                    @foreach ($pemilihans as $pemilihan)
                        <option value="{{ $pemilihan->id }}">{{ $pemilihan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="no_urut" class="form-label">Nomor Urut</label>
                <input type="number" name="no_urut" id="no_urut" class="form-control" required>
            </div>
        </div>

        {{-- Visi & Misi --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="visi" class="form-label">Visi</label>
                <textarea name="visi" id="visi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="misi" class="form-label">Misi</label>
                <textarea name="misi" id="misi" class="form-control" rows="4" required></textarea>
            </div>
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" name="poster" id="poster" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Kandidat</button>
    </form>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('home/dashboard/slug.js') }}"></script>
@endsection
