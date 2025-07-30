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
                    <h1 class="m-0">Data Pemilihan Umum</h1>
                    <a href="{{ route('pemilihan.create') }}" class="btn btn-primary m-0">
                        <i class="bi bi-plus-circle"></i> Tambah Pemilihan
                    </a>
                </div>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemilihan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemilihan as $pemilihan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemilihan->nama }}</td>
                                <td>{{ $pemilihan->tgl_mulai }}</td>
                                <td>{{ $pemilihan->tgl_selesai }}</td>
                                <td>
                                    @if ($pemilihan->status == 'belum-mulai')
                                        <span class="badge bg-secondary">Belum Dimulai</span>
                                    @elseif ($pemilihan->status == 'mulai')
                                        <span class="badge bg-success">Sedang Berlangsung</span>
                                    @elseif ($pemilihan->status == 'selesai')
                                        <span class="badge bg-danger">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pemilihan.edit', $pemilihan) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('pemilihan.destroy', $pemilihan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemilihan ini?')">
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
    <script src="{{ asset('home/dashboard/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('home/dashboard/datatables-bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
