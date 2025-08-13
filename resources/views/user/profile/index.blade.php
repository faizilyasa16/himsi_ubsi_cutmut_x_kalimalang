@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1 style="font-size: 2rem;">Profile User</h1>
    
    {{-- Alert untuk SP 3 --}}
    @if ($user->peringatan == 'sp_3')
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow" role="alert">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="alert-heading mb-2">
                        <i class="fas fa-warning me-1"></i>PERINGATAN SP 3!
                    </h5>
                    <p class="mb-2">
                        Anda telah mendapat <strong class="fs-5">{{ $user->peringatan }}</strong> surat peringatan.
                    </p>
                    <div class="bg-light p-2 rounded">
                        <i class="fas fa-heart text-danger me-1"></i>
                        <strong>Kabar Baik:</strong> Anda berhak mendapat <span class="badge bg-success">PEMUTIHAN</span> untuk memperbaiki status keanggotaan!
                    </div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
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
        <div class="col-12">
        {{-- Form Update Profil --}}
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mt-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            
            {{-- Status Peringatan --}}
            <div class="mt-3">
                <label for="peringatan" class="form-label">Status Peringatan</label>
                <div class="input-group">
                    <input type="text" id="peringatan" class="form-control 
                        @if($user->peringatan >= 3) border-danger text-danger fw-bold 
                        @elseif($user->peringatan >= 2) border-warning text-warning fw-bold
                        @else border-success text-success @endif" 
                        value="SP {{ $user->peringatan }}" readonly>
                    <span class="input-group-text 
                        @if($user->peringatan >= 3) bg-danger text-white 
                        @elseif($user->peringatan >= 2) bg-warning text-dark
                        @else bg-success text-white @endif">
                        @if($user->peringatan >= 3)
                            <i class="fas fa-exclamation-triangle"></i>
                        @elseif($user->peringatan >= 2)
                            <i class="fas fa-exclamation-circle"></i>
                        @else
                            <i class="fas fa-check-circle"></i>
                        @endif
                    </span>
                </div>
                @if($user->peringatan >= 3)
                    <div class="alert alert-danger mt-2 py-2">
                        <small class="mb-0">
                            <i class="fas fa-info-circle me-1"></i>
                            <strong>Anda berhak mengajukan pemutihan untuk memperbaiki status keanggotaan.</strong>
                        </small>
                    </div>
                @elseif($user->peringatan >= 2)
                    <div class="alert alert-warning mt-2 py-2">
                        <small class="mb-0">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            Hati-hati, satu peringatan lagi akan mencapai SP 3.
                        </small>
                    </div>
                @else
                    <div class="alert alert-success mt-2 py-2">
                        <small class="mb-0">
                            <i class="fas fa-check me-1"></i>
                            Status keanggotaan Anda baik.
                        </small>
                    </div>
                @endif
            </div>
            
            <div class="mb-3 mt-3">
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
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Simpan Profil
                </button>
            </div>
        </form>
        </div>{{-- End col-12 --}}
    </div>{{-- End row --}}

    <hr class="my-4">

    <div class="row">
        <div class="col-12">
        {{-- Form Ganti Password --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">
                    <i class="fas fa-lock me-2"></i>Ganti Password
                </h4>
            </div>
            <div class="card-body">
        <form action="{{ route('profile.update_password')  }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>

            <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
            </div>

            <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">
                <i class="fas fa-key me-1"></i>Ubah Password
            </button>
        </form>
            </div>{{-- End card-body --}}
        </div>{{-- End card --}}
        </div>{{-- End col-12 --}}
    </div>{{-- End row --}}
    
</main>
@endsection
