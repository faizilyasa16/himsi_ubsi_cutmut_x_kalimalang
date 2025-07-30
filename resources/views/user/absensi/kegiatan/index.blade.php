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
                    <h1 class="m-0">Data Kegiatan Absensi</h1>
                    <a href="{{ route('kegiatan-absensi.create') }}" class="btn btn-primary m-0">
                        <i class="bi bi-plus-circle"></i> Tambah Absensi
                    </a>
                </div>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $kegiatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kegiatan->nama }}</td>
                                <td>{{ $kegiatan->waktu }}</td>
                                <td>{{ $kegiatan->lokasi }}</td>
                                <td>{{ Str::limit(strip_tags($kegiatan->deskripsi), 100) }}</td>
                                <td>{{ ucfirst($kegiatan->status) }}</td>
                                <td>
                                    <a href="{{ route('kegiatan-absensi.edit', $kegiatan) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('kegiatan-absensi.destroy', $kegiatan->id) }}" method="POST" class="d-inline">
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
