@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Profile User</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        {{-- Form Update Profil --}}
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mt-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" id="photo" name="photo" class="form-control">

                <span class="text-muted d-block mt-2">Foto Profil saat ini:</span>
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('asset/logo/himsi.png') }}"
                    alt="Current Photo"
                    class="img-thumbnail mt-2"
                    style="width: auto; height: 150px;">
            </div>


                {{-- Tombol di bawah --}}
            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Simpan Profil</button>
            </div>
        </form>

        <hr class="my-5">

        {{-- Form Ganti Password --}}
        <form action="{{ route('profile.update_password')  }}" method="POST">
            @csrf
            @method('PUT')

            <h4 class="mb-3">Ganti Password</h4>

            <label for="current_password">Password Lama</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>

            <label for="new_password" class="mt-2">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>

            <label for="new_password_confirmation" class="mt-2">Konfirmasi Password Baru</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>

            <button type="submit" class="btn btn-warning mt-3">Ubah Password</button>
        </form>
    </div>
    
</main>
@endsection
