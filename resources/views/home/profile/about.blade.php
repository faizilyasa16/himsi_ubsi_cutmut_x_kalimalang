@extends('home.layout.index')
@section('content')
<main class="card container-fluid text-white position-relative overflow-hidden" style="border-radius: 0; background-color: #00008B; height: 400px;">
    <!-- Overlay dengan animasi gradient -->
    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center Spartan bg-gradient-animated text-center" style="background: linear-gradient(135deg, rgba(0, 0, 139, 0.8) 0%, rgba(65, 105, 225, 0.8) 100%); animation: gradientFlow 10s ease infinite;">
        <!-- Logo baris atas dengan animasi fade in -->
        <div class="d-flex gap-4 mb-3 animate-logos">
            <img src="{{ asset('asset/logo/himsi1.png') }}" alt="Logo HIMSI" class="logo-animated" style="height: 100px; animation: fadeInDown 1s ease, pulse 3s infinite alternate;">
            <img src="{{ asset('asset/logo/ubsi.png') }}" alt="Logo UBSI" class="logo-animated" style="height: 100px; animation: fadeInDown 1s ease 0.3s, pulse 3s infinite alternate 1.5s;">
        </div>
        
        <!-- Judul dengan animasi typing (dikelola oleh JS) -->
        <h1 id="typing-about" class="card-title fw-bold " style="height: 48px; border-right: .15em solid white; white-space: nowrap; overflow: hidden; letter-spacing: .1em;"></h1>

        
        <!-- Elemen dekoratif dengan animasi floating -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="pointer-events: none;">
            <div class="position-absolute" style="width: 80px; height: 80px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 20%; left: 15%; animation: float 6s ease-in-out infinite;"></div>
            <div class="position-absolute" style="width: 50px; height: 50px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: 30%; right: 20%; animation: float 4s ease-in-out infinite 1s;"></div>
            <div class="position-absolute" style="width: 120px; height: 120px; border: 2px solid rgba(255,255,255,0.1); border-radius: 50%; bottom: 15%; right: 25%; animation: float 8s ease-in-out infinite 2s;"></div>
        </div>
    </div>
</main>
<section class="container-1500 mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <p class="text-center Poppins fs-md-3">
                HIMSI (Himpunan Mahasiswa Sistem Informasi) Kampus UBSI Cut Mutia x Kalimalang adalah organisasi mahasiswa yang berfokus pada pengembangan ilmu pengetahuan dan teknologi di bidang sistem informasi. Kami berkomitmen untuk menciptakan lingkungan akademis yang mendukung inovasi, kolaborasi, dan pengembangan diri bagi seluruh anggota kami.
            </p>
        </div>
        <div class="col-12 mt-4">
            <h3 class="text-center Spartan" style="font-size: 1.5rem; font-weight: bold;">Visi & Misi</h3>
            <div class="row">
                <div class="col-12 col-md-6">
                    <table class="table border border-dark Poppins text-center">
                        <thead class="table-primary border-bottom border-dark Spartan">
                            <tr>
                                <th scope="col"><h4>Visi</h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Mewujudkan HIMSI sebagai organisasi mahasiswa yang inovatif, berdaya saing, dan berkontribusi dalam pengembangan sistem informasi di kampus.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-6">
                    <table class="table border border-dark Poppins text-center">
                        <thead class="table-primary border-bottom border-dark Spartan">
                            <tr>
                                <th scope="col"><h4>Misi</h4></th>
                            </tr>
                        </thead>
                        <tbody class="border-0 text-start">
                            <tr class="border-0">
                                <td class="border-0">
                                    1. Meningkatkan kontribusi Himsi di lingkungan kampus serta masyarakat.
                                </td>
                            </tr>
                            <tr class="border-0">
                                <td class="border-0">
                                    2. Menciptakan prestasi yang kreatif dan inovatif baik dari akademik atau non akademik.
                                </td>
                            </tr>
                            <tr class="border-0">
                                <td class="border-0">
                                    3. Menanamkan jiwa disiplin dan tanggung jawab kepada setiap anggota.
                                </td>
                            </tr>
                            <tr class="border-0">
                                <td class="border-0">
                                    4. Menciptakan ikatan yang kuat dan rasa memiliki terhadap solidaritas sesama.
                                </td>
                            </tr>
                            <tr class="border-0">
                                <td class="border-0">
                                    5. Menjalin hubungan baik dengan sesama 
                                        organisasi lain serta menjaga nama baik 
                                        himpunan dan almamater UBSI.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
        <div class="row justify-content-center align-items-stretch flex-column flex-md-row">
            <!-- Gambar -->
            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end mb-4 mb-md-0">
                <img src="{{ asset('asset/logo/himsi.png') }}" alt="" class="img-fluid">
            </div>

            <!-- Teks -->
            <div class="col-12 col-md-6 ps-md-4 d-flex flex-column justify-content-center">
                <div class="my-auto"> <!-- my-auto bikin vertikal tengah -->
                    <div class="mb-4">
                        <h4 class="Spartan">Bentuk</h4>
                        <ul class="Poppins">
                            <li>Bentuk tiga gunung paling atas melambangkan Tri 
                            Darma Perguruan Tinggi, anggota HIMSI harus siap
                            mengabdikan ilmunya dimanapun itu.</li>
                            <li>Background yang transparan, menggambarkan himsi 
                            dapat menyesuaikan dan mampu beradaptasi 
                            terhadap perkembangan Ilmu Pengetahuan dan 
                            Teknologi.</li>
                            <li>Tulisan “HIMSI dan TEKNIK INFORMATIKA” pada area
                            putih terdalam menggambarkan bahwa HIMSI berasal 
                            dari Fakultas Teknik Informatika.</li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h4 class="Spartan">Warna</h4>
                        <ul class="Poppins">
                            <li>Warna Biru Tua pada garis luar menggambarkan rasa
                            kekeluargaan yang tinggi dari pengurus HIMSI.</li>
                            <li>Tiga warna biru muda dan tulisan “Prodi Sistem 
                            Informasi Universitas Bina Sarana Informatika pada
                            lingkaran dalam, menggambarkan satu kesatuan 
                            manusia produktif yaitu mahasiswa prodi Sistem 
                            Informasi dibawah naungan Universitas Bina Sarana 
                            Informatika</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
    </div>

</div>


    </div>

</section>
@endsection

@section('scripts')
    <script src="{{ asset('home/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/home/layout.js') }}"></script>
    <script src="{{ asset('home/home/profile.js') }}"></script>
@endsection