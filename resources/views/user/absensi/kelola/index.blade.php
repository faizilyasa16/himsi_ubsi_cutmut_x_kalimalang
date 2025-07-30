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
                    <h1 class="m-0">Data Absensi</h1>
                </div>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Hadir</th>
                            <th>Tidak Hadir</th>
                            <th>Izin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->absensi->where('status', 'hadir')->count() }}</td>
                                <td>{{ $k->absensi->where('status', 'tidak_hadir')->count() }}</td>
                                <td>{{ $k->absensi->where('status', 'izin')->count() }}</td>
                                <td>
                                    <a href="{{ route('absensi.edit', $k->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Kelola
                                    </a>
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
