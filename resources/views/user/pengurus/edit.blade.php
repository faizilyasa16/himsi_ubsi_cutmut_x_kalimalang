@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Pengurus</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pengurus->name }}" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $pengurus->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $pengurus->email }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="" disabled selected>-- Pilih Role --</option>
                <option value="admin" {{ $pengurus->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="anggota" {{ $pengurus->role == 'anggota' ? 'selected' : '' }}>Anggota</option>
                <option value="bph" {{ $pengurus->role == 'bph' ? 'selected' : '' }}>BPH</option>
                <option value="alumni" {{ $pengurus->role == 'alumni' ? 'selected' : '' }}>Alumni</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="divisi" class="form-label">Divisi</label>
            <select name="divisi" id="divisi" class="form-control">
                <option value="" disabled selected>-- Pilih Divisi --</option>
                <option value="ketua" {{ $pengurus->divisi == 'ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="wakil_ketua" {{ $pengurus->divisi == 'wakil_ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="sekretaris" {{ $pengurus->divisi == 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                <option value="bendahara" {{ $pengurus->divisi == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                <option value="pendidikan" {{ $pengurus->divisi == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                <option value="rsdm" {{ $pengurus->divisi == 'rsdm' ? 'selected' : '' }}>RSDM</option>
                <option value="litbang" {{ $pengurus->divisi == 'litbang' ? 'selected' : '' }}>Litbang</option>
                <option value="kominfo" {{ $pengurus->divisi == 'kominfo' ? 'selected' : '' }}>Kominfo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="peringatan" class="form-label">Peringatan (SP)</label>
            <select name="peringatan" id="peringatan" class="form-control">
                <option value="">Tidak ada</option>
                <option value="sp_1" {{ $pengurus->peringatan == 'sp_1' ? 'selected' : '' }}>SP 1</option>
                <option value="sp_2" {{ $pengurus->peringatan == 'sp_2' ? 'selected' : '' }}>SP 2</option>
                <option value="sp_3" {{ $pengurus->peringatan == 'sp_3' ? 'selected' : '' }}>SP 3</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Ganti Foto (opsional)</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($pengurus->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $pengurus->photo) }}" alt="Foto Pengurus" style="width: auto; height: 80px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
@endsection
