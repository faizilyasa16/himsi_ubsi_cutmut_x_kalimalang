@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Kesan dan Pesan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kesan-pesan.update', $kesanPesan->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Karena ini form edit pakai method PUT --}}
        
        <div class="mb-3">
            <label for="kesan" class="form-label">Kesan</label>
            <textarea name="kesan" id="kesan" class="form-control" rows="3" required>{{ old('kesan', $kesanPesan->kesan) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" class="form-control" rows="3" required>{{ old('pesan', $kesanPesan->pesan) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="" disabled selected>Pilih Status</option>
                <option value="active" {{ old('status', $kesanPesan->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ old('status', $kesanPesan->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</main>
@endsection
