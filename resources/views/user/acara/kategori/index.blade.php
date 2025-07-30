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
                    <h1 class="m-0">Data Kategori Acara</h1>
                    <a href="{{ route('kategori-acara.create') }}" class="btn btn-primary m-0">
                        <i class="bi bi-plus-circle"></i> Tambah Kategori
                    </a>
                </div>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoriAcara as $kategori )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td>{{ $kategori->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('kategori-acara.edit', $kategori) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('kategori-acara.destroy', $kategori->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                        <i class="bi bi-trash"></i> Hapus
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
