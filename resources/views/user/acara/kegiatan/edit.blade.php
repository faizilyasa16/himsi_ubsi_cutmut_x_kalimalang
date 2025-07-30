@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Edit Acara</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kegiatan-acara.update', $kegiatanAcara) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="card mb-4">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="formTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-content" type="button" role="tab" aria-controls="details-content" aria-selected="true">Detail Acara</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment-content" type="button" role="tab" aria-controls="payment-content" aria-selected="false">Informasi Pembayaran</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="formTabsContent">
                    <!-- Tab Detail Acara -->
                    <div class="tab-pane fade show active" id="details-content" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                                        <option value="" disabled>Pilih kategori</option>
                                        @foreach($kategoriAcara as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $kegiatanAcara->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Acara</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required value="{{ $kegiatanAcara->nama }}">
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" readonly value="{{ $kegiatanAcara->slug }}">
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ $kegiatanAcara->lokasi }}">
                                </div>

                                <div class="mb-3">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ $kegiatanAcara->contact_person }}">
                                </div>

                                <div class="mb-3">
                                    <label for="poster" class="form-label">Poster</label>
                                    <input type="file" accept="image/*" name="poster" id="poster" class="form-control">
                                    <span class="form-text text-muted">Format: JPEG, PNG, JPG. Maksimal 2MB.</span>
                                    @if($kegiatanAcara->poster)
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="d-flex flex-column">
                                                <span class="form-text text-muted">Foto Sebelumnya:</span>
                                                <img src="{{ asset('storage/' . $kegiatanAcara->poster) }}" alt="Preview Foto" style="max-width: 200px; margin-top: 10px;">
                                            </div>
                                            <div class="ms-3">
                                                <span class="form-text text-muted">Foto Baru:</span>
                                                <img id="preview" src="#" alt="Preview Foto Baru" style="max-width: 200px; display: none; margin-top: 10px;">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kuota" class="form-label">Kuota</label>
                                    <input type="number" name="kuota" id="kuota" class="form-control" value="{{ $kegiatanAcara->kuota }}">
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="" disabled>Pilih status</option>
                                        <option value="draft" {{ $kegiatanAcara->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $kegiatanAcara->status == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="archived" {{ $kegiatanAcara->status == 'archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" value="{{ $kegiatanAcara->tgl_mulai ? date('Y-m-d', strtotime($kegiatanAcara->tgl_mulai)) : '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" value="{{ $kegiatanAcara->tgl_selesai ? date('Y-m-d', strtotime($kegiatanAcara->tgl_selesai)) : '' }}">
                                </div>


                                <div class="mb-3">
                                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" value="{{ $kegiatanAcara->waktu_mulai ? date('H:i', strtotime($kegiatanAcara->waktu_mulai)) : '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" value="{{ $kegiatanAcara->waktu_selesai ? date('H:i', strtotime($kegiatanAcara->waktu_selesai)) : '' }}">
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ $kegiatanAcara->deskripsi }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link_pendaftaran" class="form-label">Link Pendaftaran</label>
                                    <input type="text" name="link_pendaftaran" id="link_pendaftaran" class="form-control" value="{{ $kegiatanAcara->link_pendaftaran }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link_wa" class="form-label">Link WhatsApp</label>
                                    <input type="text" name="link_wa" id="link_wa" class="form-control" value="{{ $kegiatanAcara->link_wa }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Informasi Pembayaran -->
                    <div class="tab-pane fade" id="payment-content" role="tabpanel" aria-labelledby="payment-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="biaya" class="form-label">Biaya</label>
                                    <input type="text" name="biaya" id="biaya" class="form-control" value="{{ $kegiatanAcara->biaya }}">
                                </div>

                                <div class="mb-3">
                                    <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                    <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ $kegiatanAcara->payment_method }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="payment_number" class="form-label">Nomor Pembayaran</label>
                                    <input type="text" name="payment_number" id="payment_number" class="form-control" value="{{ $kegiatanAcara->payment_number }}">
                                </div>

                                <div class="mb-3">
                                    <label for="payment_name" class="form-label">Nama Penerima</label>
                                    <input type="text" name="payment_name" id="payment_name" class="form-control" value="{{ $kegiatanAcara->payment_name }}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Acara</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('scripts')
<script src="{{ asset('home/dashboard/slug.js') }}"></script>
@endsection
