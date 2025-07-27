@extends('user.layout.index')

@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/datatables-bundle.css') }}">
@endsection

@section('content')
<main class="mt-5 container-fluid Spartan">
    <div class="row">
        <div class="col-12">
            <div class="data_table">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="m-0">Data Kegiatan Acara</h1>
                    <a href="{{ route('kegiatan-acara.create') }}" class="btn btn-primary m-0">
                        <i class="bi bi-plus-circle"></i> Tambah Acara
                    </a>
                </div>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Tanggal Mulai</th>
                            <th>Waktu Mulai</th>
                            <th>Status</th>
                            <th>Kuota</th>
                            <th>Poster</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acara as $acara )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $acara->nama }}</td>
                                <td>{{ $acara->kategori->nama ?? 'Tidak ada kategori' }}</td>
                                <td>{{ $acara->lokasi }}</td>
                                <td>{{ \Carbon\Carbon::parse($acara->tgl_mulai)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($acara->waktu_mulai)->format('H:i') }}</td>
                                <td>{{ $acara->status }}</td>
                                <td>{{ $acara->kuota }}</td>
                                <td>
                                    @if ($acara->poster)
                                        <img src="{{ asset('storage/' . $acara->poster) }}" alt="Poster" class="img-thumbnail" style="width: 100px;">
                                    @else
                                        <span class="text-muted">Tidak ada poster</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('kegiatan-acara.edit', $acara) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('kegiatan-acara.destroy', $acara->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus acara ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('home/dashboard/jquery-3.7.0.min.js') }}"></script>
    <!-- Bootstrap Bundle -->
    <script src="{{ asset('home/dashboard/datatables-bundle.js') }}"></script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
