@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Pengurus</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nim" class="mt-2">NIM</label>
        <input type="text" id="nim" name="nim" class="form-control" required>

        <label for="name" class="mt-2">Nama</label>
        <input type="text" id="name" name="name" class="form-control" required>

        <label for="email" class="mt-2">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>

        <label for="password" class="mt-2">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>

        <label for="role" class="mt-2">Role</label>
        <select name="role" id="role" class="form-control" required>
            <option value="" disabled selected>-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="anggota">Anggota</option>
            <option value="bph">BPH</option>
            <option value="alumni">Alumni</option>
        </select>

        <label for="divisi" class="mt-2">Divisi</label>
        <select name="divisi" id="divisi" class="form-control">
            <option value="" disabled selected>-- Pilih Divisi --</option>
            <option value="ketua">Ketua</option>
            <option value="wakil_ketua">Wakil Ketua</option>
            <option value="sekretaris">Sekretaris</option>
            <option value="bendahara">Bendahara</option>
            <option value="pendidikan">Pendidikan</option>
            <option value="rsdm">RSDM</option>
            <option value="litbang">Litbang</option>
            <option value="kominfo">Kominfo</option>
        </select>

        <label for="photo" class="mt-2">Foto (opsional)</label>
        <input type="file" id="photo" name="photo" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</main>
@endsection
