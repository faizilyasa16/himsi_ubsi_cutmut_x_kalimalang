@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Kirim Kesan dan Pesan</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('kesan-pesan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kesan" class="form-label">Kesan</label>
            <textarea name="kesan" id="kesan" class="form-control" rows="3" required>{{ old('kesan') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" class="form-control" rows="3" required>{{ old('pesan') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</main>
@endsection
