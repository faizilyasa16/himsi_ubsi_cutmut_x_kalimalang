@extends('user.layout.index')

@section('styles')
    <link rel="stylesheet" href="{{ asset('home/css/datatables-bundle.css') }}">
@endsection

@section('content')
<main class="mt-5 container-fluid Spartan">
    <div class="row">
        <div class="col-12">
            <div class="data_table">
                <div class="d-flex flex-column justify-content-start mb-4">
                    <h1 class="m-0">Kelola Absensi</h1>
                </div>
                @if ($errors -> any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('absensi.update', $kegiatan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Hadir</th>
                                <th>Tidak Hadir</th>
                                <th>Izin</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @php
                                    $absen = $kegiatan->absensi->firstWhere('user_id', $user->id);
                                    $status = $absen->status ?? null;
                                    $keterangan = $absen->keterangan ?? '';
                                @endphp


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>

                                    {{-- Radio: Hadir --}}
                                    <td>
                                        <input type="radio" name="absensi[{{ $user->id }}][status]" value="hadir"
                                            {{ $status === 'hadir' ? 'checked' : '' }}>
                                    </td>

                                    {{-- Radio: Tidak Hadir --}}
                                    <td>
                                        <input type="radio" name="absensi[{{ $user->id }}][status]" value="tidak_hadir"
                                            {{ $status === 'tidak_hadir' ? 'checked' : '' }}>
                                    </td>

                                    {{-- Radio: Izin --}}
                                    <td>
                                        <input type="radio" name="absensi[{{ $user->id }}][status]" value="izin"
                                            {{ $status === 'izin' ? 'checked' : '' }}>
                                    </td>

                                    {{-- Keterangan --}}
                                    <td>
                                        <input type="text" name="absensi[{{ $user->id }}][keterangan]" class="form-control"
                                            value="{{ $keterangan }}">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-success">Simpan Absensi</button>
                    </div>
                </form>
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
