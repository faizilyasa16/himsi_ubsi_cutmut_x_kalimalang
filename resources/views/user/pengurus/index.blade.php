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
                    <h1 class="m-0">Data Pengurus</h1>
                    <a href="{{ route('pengurus-user.create') }}" class="btn btn-primary m-0">
                        <i class="bi bi-plus-circle"></i> Tambah Pengurus
                    </a>
                </div>
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Name</th>
                            <th>Divisi</th>
                            <th>Role</th>
                            <th>SP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($pengurus as $pengurus )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($pengurus->photo)
                                        <img src="{{ asset('storage/' . $pengurus->photo) }}" alt="Foto Pengurus" style="width: auto; height: 50px;">
                                    @else
                                        <img src="{{ asset('asset/logo/himsi.png') }}" alt="Foto Pengurus" style="width: auto; height: 50px;">
                                    @endif
                                </td>
                                <td>{{ $pengurus->name }}</td>
                                <td>{{ $pengurus->divisi }}</td>
                                <td>{{ $pengurus->role }}</td>
                                <td>
                                    @if ($pengurus->sp == null)
                                        -
                                    @elseif($pengurus->sp == 'sp_1')
                                        <span class="badge bg-primary">SP 1</span>
                                    @elseif($pengurus->sp == 'sp_2')
                                        <span class="badge bg-warning">SP 2</span>
                                    @elseif($pengurus->sp == 'sp_3')
                                        <span class="badge bg-danger">SP 3</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pengurus-user.edit', $pengurus->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('pengurus-user.destroy', $pengurus->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengurus ini?')">
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
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
