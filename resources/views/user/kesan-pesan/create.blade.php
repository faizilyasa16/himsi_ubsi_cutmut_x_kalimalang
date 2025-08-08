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
            <label for="kesan_pesan" class="form-label">Kesan dan Pesan</label>
            <textarea name="kesan_pesan" id="kesan_pesan" class="form-control" rows="3" required>{{ old('kesan_pesan') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</main>
@endsection
