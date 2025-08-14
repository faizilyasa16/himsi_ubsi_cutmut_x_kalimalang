@extends('user.layout.index')

@section('content')
<main class="mt-5 container-fluid Spartan">
    <h1>Tambah Acara</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kegiatan-acara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
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
                    <small id="slugHelp" class="form-text text-muted my-5">*Slug akan otomatis dihasilkan dari nama acara.</small>
                    <!-- Tab Detail Acara -->
                    <div class="tab-pane fade show active" id="details-content" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        <option value="" disabled selected>Pilih kategori</option>
                                        @foreach($kategoriAcara as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama">Nama Acara</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>

                                <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text" name="contact_person" id="contact_person" value="{{ old('contact_person') }}" class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kuota" class="form-label">Kuota</label>
                                    <input type="number" name="kuota" id="kuota" value="{{ old('kuota') }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="" disabled {{ old('status') ? '' : 'selected' }}>Pilih status</option>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                    <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" value="{{ old('waktu_mulai') }}" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                                    <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" value="{{ old('waktu_selesai') }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="poster" class="form-label">Poster (nama file)</label>
                                    <span class="form-text text-muted">Format: JPEG, PNG, JPG. Maksimal 2MB.</span>
                                    <input type="file" accept="image/*" name="poster" id="poster" class="form-control" onchange="previewFoto(event)">
                                    <span class="form-text text-muted">Poster Preview:</span>
                                    <img id="preview" src="#" alt="Preview Poster" style="max-width: 200px; display: none; margin-top: 10px;">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link_pendaftaran" class="form-label">Link Pendaftaran</label>
                                    <input type="text" name="link_pendaftaran" id="link_pendaftaran" value="{{ old('link_pendaftaran') }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link_wa" class="form-label">Link Grup WhatsApp</label>
                                    <input type="text" name="link_wa" id="link_wa" value="{{ old('link_wa') }}" class="form-control">
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
                                    <input type="text" name="biaya" id="biaya" value="{{ old('biaya') }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                    <input type="text" name="payment_method" id="payment_method" value="{{ old('payment_method') }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="payment_number" class="form-label">Nomor Pembayaran</label>
                                    <input type="text" name="payment_number" id="payment_number" value="{{ old('payment_number') }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="payment_name" class="form-label">Nama Penerima</label>
                                    <input type="text" name="payment_name" id="payment_name" value="{{ old('payment_name') }}" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('scripts')
<script src="{{ asset('home/dashboard/slug.js') }}"></script>
<script src="{{ asset('home/dashboard/preview.js') }}"></script>
@endsection
