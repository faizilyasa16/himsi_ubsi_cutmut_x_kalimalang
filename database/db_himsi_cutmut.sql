-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2025 at 07:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_himsi_cutmut`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `kegiatan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('hadir','tidak_hadir','izin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuota` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','open','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `link_pendaftaran` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_wa` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `kategori_id`, `nama`, `deskripsi`, `lokasi`, `contact_person`, `poster`, `kuota`, `status`, `slug`, `waktu_mulai`, `waktu_selesai`, `link_pendaftaran`, `link_wa`, `biaya`, `payment_method`, `payment_number`, `payment_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'CAMPUS MEETUP HIMSI Study Club 2025 X AllStars Academy Indonesia', 'Kegiatan CAMPUS MEETUP HIMSI Study Club 2025 X AllStars Academy Indonesia dengan tema \"Exploring Blockchain & Web3 Technology\" - Educate, Empower, Elevate through Decentralized Innovation.\n\nDalam kegiatan ini, peserta akan mendapatkan benefit:\n✅ Kenalan langsung dengan konsep Blockchain & Web3\n✅ Dapat wawasan karier di industri Web3  \n✅ Ikut workshop mini bikin dApp tanpa perlu modal\n✅ Ngobrol bareng komunitas Allstars Academy Indonesia\n✅ e-certificate\n✅ Ada doorprize menarik\n\nPembicara utama: Laura Stephanie Phang (Country Manager – Allstars Academy Indonesia)\n\nWajib untuk diikuti untuk teman-teman yang mau eksplor hal baru!, khususnya fakultas teknik dan Informatika, dan juga terbuka umum untuk seluruh mahasiswa UBSI lain yang tertarik!', 'Hotel 88 Bekasi', '085710430631', 'posters/campus-meetup-himsi-2025.png', '100', 'closed', 'campus-meetup-himsi-study-club-2025-x-allstars-academy-indonesia', '2025-06-28 13:00:00', '2025-06-28 16:00:00', 'https://lu.ma/e7bwnown', NULL, 'gratis', NULL, NULL, NULL, '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(2, 3, 'BERBAGI KASIH & PEDULI', '✨ BERBAGI KASIH & PEDULI ✨\n\nIndahnya berbagi di bulan Ramadhan! 🌙✨\n\nHimpunan Mahasiswa Sistem Informasi (HIMSI) Cutmutiah & Kalimalang X OJT Kalimalang mengajak kawan-kawan bagian dari kebaikan! ✨ \nBantu adik-adik yatim & piatu dengan donasi terbaikmu. Sekecil apa pun bantuanmu, berarti besar buat mereka.\n\n💰 Cara Berdonasi:\n✅ Seabank: 901261951189 (Anisa Fitri)\n✅ Dana/Gopay: 082114396332 (Laurensia Stevanic)\n✅ Bank BCA: 7411101499 (Muhamad Fachri)\n\nMari bersama-sama menebar kebaikan dan keberkahan di bulan yang penuh rahmat ini! 🌟\n\n\"Sedekah yang paling utama adalah sedekah di bulan Ramadhan.\" (HR. At-Tirmidzi)\n\n#HIMSIBerbagi #RamadhanBerkah #BerbagiItuIndah #HIMSICUTMUTIAHXOJTKALIMALANG', 'Kampus UBSI Kalimalang', '082114396332', 'posters/berbagi-kasih-peduli-2025.png', NULL, 'closed', 'berbagi-kasih-peduli-ramadhan-2025', '2025-03-08 00:00:00', '2025-03-20 23:59:59', NULL, NULL, 'donasi sukarela', 'Seabank/Dana/Gopay/BCA', '901261951189 (Seabank) | 082114396332 (Dana/Gopay) | 7411101499 (BCA)', 'Anisa Fitri (Seabank) | Laurensia Stevanic (Dana/Gopay) | Muhamad Fachri (BCA)', '2025-08-08 04:14:42', '2025-08-08 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nama`, `tahun`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'HIMSI Sehat', 2025, 'himsi-sehat', 'Dokumentasi rangkaian kegiatan olahraga yang diselenggarakan oleh HIMSI UBSI. Program ini bertujuan untuk menjaga kesehatan fisik dan mental mahasiswa serta mempererat tali silaturahmi antar mahasiswa sistem informasi.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(2, 'Campus Meetup Allstars x UBSI (HIMSI Study Club)', 2025, 'campus-meetup-allstars-x-ubsi-himsi-study-club', 'Dokumentasi acara Campus Meetup Allstars x UBSI yang diselenggarakan oleh HIMSI Study Club. Kegiatan ini merupakan kolaborasi dengan komunitas teknologi untuk sharing knowledge, networking, dan pengembangan skill mahasiswa sistem informasi dalam bidang teknologi terkini.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(3, 'Sertijab Pengurus HIMSI 2025', 2025, 'sertijab-pengurus-himsi-2025', 'Dokumentasi acara serah terima jabatan dari pengurus HIMSI periode 2024 kepada pengurus baru periode 2025. Acara ini menandai pergantian kepemimpinan dan regenerasi organisasi.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(4, 'HIMSI Berbagi Ramadan', 2025, 'himsi-berbagi-ramadan', 'Dokumentasi kegiatan HIMSI Berbagi selama bulan Ramadan berupa buka puasa bersama, pembagian takjil, santunan anak yatim, dan kegiatan sosial lainnya. Program ini merupakan bentuk kepedulian dan berbagi kebahagiaan dengan sesama di bulan yang penuh berkah.', '2025-08-08 04:14:42', '2025-08-08 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `konten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` enum('pre-event','event','post-event','artikel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` bigint UNSIGNED NOT NULL,
  `kandidat_ketua_id` bigint UNSIGNED NOT NULL,
  `kandidat_wakil_id` bigint UNSIGNED DEFAULT NULL,
  `pemilihan_id` bigint UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `no_urut` int DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_acara`
--

CREATE TABLE `kategori_acara` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_acara`
--

INSERT INTO `kategori_acara` (`id`, `nama`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Seminar & Workshop', 'seminar-workshop', 'Kategori acara untuk kegiatan seminar dan workshop yang bertujuan untuk meningkatkan pengetahuan dan keterampilan mahasiswa sistem informasi.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(2, 'Kompetisi', 'kompetisi', 'Kategori acara untuk berbagai kompetisi seperti programming contest, UI/UX design, dan kompetisi teknologi lainnya.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(3, 'Kegiatan Sosial', 'kegiatan-sosial', 'Kategori acara untuk kegiatan bakti sosial, donor darah, dan berbagai aktivitas kepedulian sosial lainnya.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(4, 'Olahraga & Kesehatan', 'olahraga-kesehatan', 'Kategori acara untuk turnamen olahraga, senam, dan kegiatan yang berkaitan dengan kesehatan fisik mahasiswa.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(5, 'Organisasi & Kepemimpinan', 'organisasi-kepemimpinan', 'Kategori acara untuk kegiatan organisasi seperti sertijab, rapat koordinasi, dan pelatihan kepemimpinan.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(6, 'HIMSI', 'himsi', 'Kategori acara untuk kegiatan HIMSI seperti rapat, diskusi, dan kegiatan internal organisasi.', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(7, 'Hiburan & Rekreasi', 'hiburan-rekreasi', 'Kategori acara untuk kegiatan hiburan, gathering, study tour, dan aktivitas rekreasi lainnya.', '2025-08-08 04:14:42', '2025-08-08 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_absensi`
--

CREATE TABLE `kegiatan_absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','open','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kesan-pesan`
--

CREATE TABLE `kesan-pesan` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kesan_pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kesan-pesan`
--

INSERT INTO `kesan-pesan` (`id`, `user_id`, `kesan_pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Bagi saya Himsi bukan hanya sekadar organisasi, melainkan rumah kedua untuk bermain, cerita, belajar dan tumbuh kembang bersama. Banyak momen seru yang sudah dilalui, sederhana namun menyenangkan', 'active', '2025-08-06 07:51:38', '2025-08-06 07:51:38'),
(2, 28, 'Di himsi ga cuma belajar tentang komunikasi atau pengalaman organisasi, tapi juga belajar memahami informasi dan chemistry dalam projek yang dijalani', 'active', '2025-08-06 10:29:21', '2025-08-06 10:29:21'),
(3, 39, 'Saya senang berada di bagian menjadi Himsi, terutama Himsi cutmut x kalimalang, menambah pengalaman saya dalam ber organisasi, Thanks Buat semua nyaa. Semoga himsi bisa memunculkan ide ide baru.', 'active', '2025-08-07 03:14:22', '2025-08-07 03:14:22'),
(4, 35, 'Kesan yang aku dapat dari himpunan ini cukup besar ya, karena selain menambah pengalaman dan kegiatan aku juga bisa menemukan orang-orang baru yang hebat dan baik layaknya keluarga baru di sini. Aku harap Himsi ini bisa berkembang lebih sempurna lagi seiring berjalannya teknologi dan kemajuan yang ada', 'active', '2025-08-07 05:02:19', '2025-08-07 05:02:19'),
(5, 6, 'Gak ada organisasi yang sempurna semua harus saling melengkapi, ini adalah pertama kali guaa ikut organisasi dan yap semua orang pasti punya tujuannya kenapa mereka masuk organisasi dan di HIMSI ini gua berterima kasih karena guaa bisa komitmen dalam 1 periode ini. Memang gak lama tapi banyak pengalaman yang di ambil dan semua itu pasti bakal gua evaluasi untuk perjalanan kedepannyaa. Intinyaa adalah jangan terus terang menyerah, kalian bukan tidak bisa tapi belum memulainyaa lalu jika memang sudah memulai dan kalian ngerasa ngestuck kalian harus ingat apa alasan kalian memilih jalan itu dan apa yang kalian ingin tuju ?', 'active', '2025-08-07 07:57:04', '2025-08-07 07:57:04'),
(6, 29, 'Selama gabung di HIMSI, banyak banget hal seru dan berkesan. Semoga kedepannya semakin kreatif, dan jadi tempat yg asik buat belajar dan berkembang. Buat pengurus selanjutnya, semangat terus dan tetap kompak ya!', 'active', '2025-08-07 09:37:25', '2025-08-07 09:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `konten_album`
--

CREATE TABLE `konten_album` (
  `id` bigint UNSIGNED NOT NULL,
  `album_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konten_album`
--

INSERT INTO `konten_album` (`id`, `album_id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'foto/badmin1.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(2, 1, NULL, 'foto/badmin2.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(3, 1, NULL, 'foto/badmin3.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(4, 1, NULL, 'foto/badmin4.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(5, 2, NULL, 'foto/studyclub1.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(6, 2, NULL, 'foto/studyclub2.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(7, 2, NULL, 'foto/studyclub3.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(8, 2, NULL, 'foto/studyclub4.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(9, 2, NULL, 'foto/studyclub5.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(10, 2, NULL, 'foto/studyclub6.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(11, 2, NULL, 'foto/studyclub7.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(12, 2, NULL, 'foto/studyclub8.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(13, 2, NULL, 'foto/studyclub9.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(14, 2, NULL, 'foto/studyclub10.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(15, 3, NULL, 'foto/sertijab1.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(16, 3, NULL, 'foto/sertijab2.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(17, 3, NULL, 'foto/sertijab3.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(18, 3, NULL, 'foto/sertijab4.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(19, 3, NULL, 'foto/sertijab5.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(20, 3, NULL, 'foto/sertijab6.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(21, 3, NULL, 'foto/sertijab7.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(22, 3, NULL, 'foto/sertijab8.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(23, 3, NULL, 'foto/sertijab9.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(24, 3, NULL, 'foto/sertijab10.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(25, 4, NULL, 'foto/berbagi1.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(26, 4, NULL, 'foto/berbagi2.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(27, 4, NULL, 'foto/berbagi3.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(28, 4, NULL, 'foto/berbagi4.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(29, 4, NULL, 'foto/berbagi5.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(30, 4, NULL, 'foto/berbagi6.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(31, 4, NULL, 'foto/berbagi7.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(32, 4, NULL, 'foto/berbagi8.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(33, 4, NULL, 'foto/berbagi9.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42'),
(34, 4, NULL, 'foto/berbagi10.jpeg', '2025-08-08 04:14:42', '2025-08-08 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_07_27_075837_create_kategori_acara', 1),
(3, '2025_07_27_094425_create_kegiatan_acara', 1),
(4, '2025_07_28_152209_create_album', 1),
(5, '2025_07_29_033204_create_konten_album', 1),
(6, '2025_07_29_060942_create_pemilihan_umum', 1),
(7, '2025_07_29_064952_create_kandidat_pemilihan', 1),
(8, '2025_07_29_075048_create_artikels', 1),
(9, '2025_07_29_085936_create_kegiatan_absensi', 1),
(10, '2025_07_29_153638_create_absensi', 1),
(11, '2025_07_31_155858_create_kesan-pesan', 1),
(12, '2025_08_03_103900_add_kode_to_absensi_table', 1),
(13, '2025_08_04_002212_create_voting', 1),
(14, '2025_08_06_132603_create_struktur_organisasi', 1),
(15, '2025_08_08_170505_create_cache_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemilihan`
--

CREATE TABLE `pemilihan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('belum-mulai','mulai','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum-mulai',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3qxuQfHzfSPHEwR2VWC3LGO8Z74k7ZqtnQbxaXPY', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkJhWnM5clFlVUpyRUNWaFR6UVdkVG9LOFF0b203REd5ZFJvcm9GdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9jaGFpbnMtY2F0YWxvZy1tZWxpc3NhLW1ha2Vycy50cnljbG91ZGZsYXJlLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754633350),
('876NvwTSdchfL1a3Qco74i4pxA3wxzh1ziMMtQ1n', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMW9FVmVxQzFqbGRnVzNLbjNCSUdXUlpJeXJxWXNnbFptSXdFNDJBNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9jaGFpbnMtY2F0YWxvZy1tZWxpc3NhLW1ha2Vycy50cnljbG91ZGZsYXJlLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754632131),
('eNireGu3UneHJSjqbdL7pJ05vN4k589ornJpe4z4', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUgzcWt4QXhaRHlCOVRydkxCUFJRa3RXV0xUS2I5VVQ3ODhBUjNqbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9jaGFpbnMtY2F0YWxvZy1tZWxpc3NhLW1ha2Vycy50cnljbG91ZGZsYXJlLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754633349),
('GC6hp9KldvgibpffZK794ajvTCP9UUt20bCgs46S', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHdOZFVLWk1wYWdpcE40SnM3RTg3djZFZHdRRjZLM3NENlBXYXVERiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9jaGFpbnMtY2F0YWxvZy1tZWxpc3NhLW1ha2Vycy50cnljbG91ZGZsYXJlLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754635325),
('iHzNSFm0QscZfro9ygg9kk1m4zXfO3RYzyY9HNTQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUk5aeEZIRTZTTmlvclFXcmsxTnp4Z1pyUEZFeXJTeThLemhtczhMUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkL2tlZ2lhdGFuLWFjYXJhL2NhbXB1cy1tZWV0dXAtaGltc2ktc3R1ZHktY2x1Yi0yMDI1LXgtYWxsc3RhcnMtYWNhZGVteS1pbmRvbmVzaWEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1OiJhbGVydCI7YTowOnt9fQ==', 1754641147),
('iU93Zzo4a1R7Zqc9paetyRSb9cv3T8zvNg2a6zmk', NULL, '127.0.0.1', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWdBOFZqS1F5emRzSmY0M2hXTDJKMWdhQlYzbjZtNDZLZzlEdjl1QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9jYXRoZXJpbmUtZ3JhZHVhdGUtc3VjY2Vzcy1sb3NzZXMudHJ5Y2xvdWRmbGFyZS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1754635480),
('OerPEqzwqCGwOhimvqHvQyxK5SLyH1gXwFxoldZE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUJmaTNaTlNCN3VmcVh2RzJBNzVqTGZSTTVTMTRnR2xMdmF5N0RjbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9jYXRoZXJpbmUtZ3JhZHVhdGUtc3VjY2Vzcy1sb3NzZXMudHJ5Y2xvdWRmbGFyZS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1754635443),
('QjLyyABYUOuGG1t9JshqYlhdx08xZySoZCWpwNT9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMEx1dkFGcFN1SUJ6cjlwVTNYSHA0UlJVMUN3UEVGMWVIY2x6clJXdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1OiJhbGVydCI7YTowOnt9fQ==', 1754666075),
('RdbFBwyUI72OsnIJVjydcsoxgFWhoLDvWGGxFeqX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjdTZ2tiWmRkeFR2dG1scTNCOFp1a3lFbnBUSkVOdFRMTEpNdWRvQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9tYXJrLXNldmVyZS10b3VyLWJlbGtpbi50cnljbG91ZGZsYXJlLmNvbS9hY2FyYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754635632),
('TP2GLTTydE9UCRG7mW9EvObA531iSXSGc458eSTV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2dld1V2M3NMV3ducVhHU1A3TlJYdTVKTUFEcEJNcEl5cnhOSG9BMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754627661),
('uMSgRI7CMeOhf6nI9py4vhYZ759ckbbf8iQnxaEc', NULL, '127.0.0.1', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXlMSFpvdkxCeUg1cnM4Nk1GS3pXU2czcU5Db0pkZ3RFYm1jVENXcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9jYXRoZXJpbmUtZ3JhZHVhdGUtc3VjY2Vzcy1sb3NzZXMudHJ5Y2xvdWRmbGFyZS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1754635478),
('VpUktFpDYgSWHom12AVlWJIvbR3tZe4rwhT3sSGh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieW1SRUJtNmQxR2JPU3BvTmJ1UWdqdVZqc0hXejROMTFzWXNzRGpJdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2FyYS9jYW1wdXMtbWVldHVwLWhpbXNpLXN0dWR5LWNsdWItMjAyNS14LWFsbHN0YXJzLWFjYWRlbXktaW5kb25lc2lhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1754747511),
('WwFPA0qrwg7OSD7v1Wrra1IgtkRp7oSh8S8GxEa2', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3JKQ0RVR1pydlN6TURuZEpJbTJOUGZGSHpod0Q0V0l6RjVjaVc5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9jaGFpbnMtY2F0YWxvZy1tZWxpc3NhLW1ha2Vycy50cnljbG91ZGZsYXJlLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754633350);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` bigint UNSIGNED NOT NULL,
  `konten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `konten`, `created_at`, `updated_at`) VALUES
(1, 'struktur/himsi.png', '2025-08-08 04:14:42', '2025-08-08 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','anggota','bph','alumni') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anggota',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` enum('ketua','wakil_ketua','sekretaris','bendahara','pendidikan','rsdm','litbang','kominfo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peringatan` enum('sp_1','sp_2','sp_3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `role`, `photo`, `divisi`, `peringatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0000000001', 'Admin HIMSI', 'admin@himsi.com', '2025-08-08 04:14:06', '$2y$12$r9wI1hIWDFdxE2BYo08gFeWz.3AoD/1n3fznoPCIZZYjVk.qUmfvK', 'admin', NULL, NULL, NULL, 'fwJBInNxoY', '2025-08-08 04:14:07', '2025-08-08 04:14:07'),
(2, '12230060', 'Muhamad Fachri', '12230060@bsi.ac.id', NULL, '$2y$12$65xIzeyCWb7umwa.VT5j2OgEIQsuFm77SB.E5LagGUS.I.rcTq2nC', 'bph', NULL, 'ketua', NULL, NULL, '2025-08-08 04:14:08', '2025-08-08 04:14:08'),
(3, '19230390', 'Reggy Helva Rezal', 'reggyhelva28@gmail.com', NULL, '$2y$12$w9MZcswhwlNynPlJ6sDrMu/FV1fLYOX1RLneg7FiLWliNi9Ct67Em', 'bph', NULL, 'wakil_ketua', NULL, NULL, '2025-08-08 04:14:08', '2025-08-08 04:14:08'),
(4, '19231010', 'Adi Andrianto', 'adiandrianto146@gmail.com', NULL, '$2y$12$JzHMO49gDtguw4vmN/MKJeTZY6RzpEojCxSIfE3rokdiap0cOwH1e', 'bph', NULL, 'sekretaris', NULL, NULL, '2025-08-08 04:14:09', '2025-08-08 04:14:09'),
(5, '12230105', 'Laurensia Stevanic Elizabeth', 'elizabethstevanic@gmail.com', NULL, '$2y$12$8wkqJK2CBxTpQjEQjO/W6elwIT7IQ/ENOB6eX9Od1fQhoHlclzXXi', 'bph', NULL, 'bendahara', NULL, NULL, '2025-08-08 04:14:10', '2025-08-08 04:14:10'),
(6, '19240961', 'Andika Muhammad Rizky', 'andikaaa.muh.riz@gmail.com', NULL, '$2y$12$RDxjw3OmBx9GlfsOPeGOh.5oZLupQO4HliDbJCvvyitzYC9gAYmTy', 'bph', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:11', '2025-08-08 04:14:11'),
(7, '19240891', 'Andhika Syarifudin', 'andika15657@gmail.com', NULL, '$2y$12$qp59WflS9qstnKVYRYVuROlS5kwKi0vIzupalzn4jQJTZA72W0Zgu', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:12', '2025-08-08 04:14:12'),
(8, '12230102', 'Arya Ramadhani', 'arya.ramadhani091@gmail.com', NULL, '$2y$12$KTf7n78p0U4Zmnybi7J5geFSO8mn/xtjBRVWqMDlC5oXadUDwATPS', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:13', '2025-08-08 04:14:13'),
(9, '19230089', 'Aqiila Aviani', 'aqiilaviani20@gmail.com', NULL, '$2y$12$0oU6gi80BoHYzxK0ODu3bOsxSllDLkLLLTcG2he1s7ZNpOZO2zQpC', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:13', '2025-08-08 04:14:13'),
(10, '19231429', 'Faiz Ilyasa', 'faizilyasa16@gmail.com', NULL, '$2y$12$uHT/r77hxvdeodWadjxJ3OL1toR09pDfiMgLEdjtnYPT.F/3eTqhO', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:14', '2025-08-08 04:14:14'),
(11, '19242299', 'Mochamad Fahri Putra Pratama', 'moch.fahriputra.p@gmail.com', NULL, '$2y$12$YJgoIK0ToLI07TCON1TE7evRdtMnIfD0tus.4rh5m2e9fcqe3GxG.', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:15', '2025-08-08 04:14:15'),
(12, '19241675', 'Muhamad Nizam Zuhayr', 'nizamzuhayr12@gmail.com', NULL, '$2y$12$DMCALfckzHH6XwrphhVdCuTLMSF51bufBQRpaIlfqzGTvBlRu2sYC', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:16', '2025-08-08 04:14:16'),
(13, '19241701', 'Rafly Dwi Maulana', 'raflydwimaulana9@gmail.com', NULL, '$2y$12$szVUSUFTGQShRyGgLJXVhOCZmYOmLWzamlnDJ846Bp6QU/05KHGxO', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:16', '2025-08-08 04:14:16'),
(14, '19242003', 'Herlambang Chandra Radhitya', 'radhityachandra12@gmail.com', NULL, '$2y$12$33o4ctxRzGs41.mjiqzfZeuDQMf.cBF.lkTled0/PyA1z.tagIECi', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:18', '2025-08-08 04:14:18'),
(15, '19242185', 'Tennoo Ramadhan Kurniawan', 'tenoramadhan1210@gmail.com', NULL, '$2y$12$GTqtMR0kTodm483BIXN/Vu3WJzVLM8DdCsw5ACDl64IrraZv9A.12', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:18', '2025-08-08 04:14:18'),
(16, '19241360', 'Naufal Putra Winawan', 'putrawnaufal@gmail.com', NULL, '$2y$12$qqOjiNyjWaaVuf.Mf4pzuOfa8t7VvqN9zpVwf45wh2KhP70raD4JC', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-08 04:14:19', '2025-08-08 04:14:19'),
(17, '12230101', 'Cahya Alia', 'cahyarismayanti@gmail.com', NULL, '$2y$12$SFJSDni/zF/Rg71EIJdyFuvdfCtj40BADfa2XbHlulxEaDsc4aAy2', 'bph', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:20', '2025-08-08 04:14:20'),
(18, '19231416', 'Aisyah Putri Regardo', 'aisyahputriregardo@gmail.com', NULL, '$2y$12$XCl5unyssKCsDKfa4pJFe.qmuNL.6VE94FenN8gFVuaNTGWQ52PdC', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:20', '2025-08-08 04:14:20'),
(19, '19231904', 'Arnanda Surya Mukti', 'arnandasr@gmail.com', NULL, '$2y$12$pSdNVdibCJXawNb3KQ2CPeZI0xikFDhZmx4YVmOIxZ0fadv10tP5e', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:21', '2025-08-08 04:14:21'),
(20, '19231769', 'Yuni Saidah', 'yunisaidah05@gmail.com', NULL, '$2y$12$M42RchPFgEjfBwItzNnzweetYEcdi4R2EZ93z7.olMFrzLWSAdkwa', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:22', '2025-08-08 04:14:22'),
(21, '19231251', 'Eriel Firman Suandanis', 'steelblack222@gmail.com', NULL, '$2y$12$qTBJ/2mIUwQVgH5CJvdHUeG8o3f9TzwSGwDPRJStbWWSCVmXS.B2W', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:22', '2025-08-08 04:14:22'),
(22, '19231213', 'Fitra Hakiki Firdaus', 'fitrahakikif@gmail.com', NULL, '$2y$12$m85bhcleuCa.tG9mQR2nWuI3DImddeTIycCdK6LFBIrJHSW.27caG', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:23', '2025-08-08 04:14:23'),
(23, '19240747', 'Adityo Nurcholis Wibisono', 'adityo.nw10@gmail.com', NULL, '$2y$12$9aZwMkLUj5wzAMrwJXg8ZuierHU1D3HxTY8GiSd1jEmaQuObsobTK', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:24', '2025-08-08 04:14:24'),
(24, '12230042', 'Muhammad Rochman Triatmojo', 'muhammadrohmantriat@gmail.com', NULL, '$2y$12$NIudcXlB0pZCgMl8.jLBH.hRZPHgB6VZU8a8fCcJAHRWM8W9Rs.96', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:24', '2025-08-08 04:14:24'),
(25, '19242335', 'Afifudin', 'afifudin141213@gmail.com', NULL, '$2y$12$UrsAsZQZK6itrijRQjOATuekG2v6mfqvs/6o1qVZrHRTCkyPVjp9O', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:25', '2025-08-08 04:14:25'),
(26, '19242089', 'Najwan Muyassar', 'najwanmuyassar16@gmail.com', NULL, '$2y$12$qEviSD7b9MrOgjHKa9uH7uqXOn7yGTHIAf1AklSvjZcau2Sg52EMe', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:25', '2025-08-08 04:14:25'),
(27, '19231413', 'Danu Pangestu', 'pangestudanu92@gmail.com', NULL, '$2y$12$.6.jgjML6Hf/fuInX1ro2ecnq61fSdGv4lF30gVLTCccxByTFeUZu', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-08 04:14:26', '2025-08-08 04:14:26'),
(28, '12230001', 'Dafina Nabila Putri', 'dafinanabila122@gmail.com', NULL, '$2y$12$vbDRWIMOgJrH.sMyVbeeGOZ2LO9SN7k5CqOMTzjc.ygNnV9Hbu5u.', 'bph', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:26', '2025-08-08 04:14:26'),
(29, '19231019', 'Indah Tri Rahmawati', 'indhrhmwt3084@gmail.com', NULL, '$2y$12$ojsxQpI6aq9JEWLs3fdX3.KGg4/TUJZo06j1ko8ZCvAsdSqipwuQ6', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:27', '2025-08-08 04:14:27'),
(30, '19230049', 'Tiara Falensia', 'tiarafalensia2@gmail.com', NULL, '$2y$12$u24i6EqCcPIwUs4gRiB9WOk8GQk.DbPkHaX4pHuy2d4Jyy2Curfx6', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:28', '2025-08-08 04:14:28'),
(31, '19231624', 'Ummi Kulsum', 'ummikalsumbahenol@gmail.com', NULL, '$2y$12$yVn4vz8pw/MowAkG3JIbjO5Q0XRDWa4Lw7zF5/X4jLpQd3y.8WITW', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:29', '2025-08-08 04:14:29'),
(32, '19240043', 'Sauqi Danang Prastowo', 'danangprastowo99@gmail.com', NULL, '$2y$12$K7A2oGc9aTX3uIjnY0IMOeot9bO4LunUaUwdTUgf71K16bj0jnpiS', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:30', '2025-08-08 04:14:30'),
(33, '19241262', 'Bilal Nur Akmal', 'bllnrkml12@gmail.com', NULL, '$2y$12$EcP75mG59VBIQmebohFU1ekU69ZqmN3wCQ.Wr/CFCBjW/hn/Di8y6', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:31', '2025-08-08 04:14:31'),
(34, '19230786', 'Christian Octavio Arshendy', 'christian.octavio27@gmail.com', NULL, '$2y$12$tYrG3uNGJ/iHHCACwyShaejY1TQjpP3aK39XAuhzvXFoC7nC/adg6', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-08 04:14:32', '2025-08-08 04:14:32'),
(35, '19241201', 'Aulia An Najmi', 'aulianajmi26@gmail.com', NULL, '$2y$12$zhXyyCClzrxj2HIMXZRgMearsO/Gzxa0CLeAKtdGeHMonzagT4Mbm', 'bph', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:33', '2025-08-08 04:14:33'),
(36, '19231620', 'Hertha Berlina', 'herthaharyanto@gmail.com', NULL, '$2y$12$Ls2CRbui2qoeMe7/4fh10eggWZq7le3cV5r4rwx8SUadr1yvgdrwW', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:33', '2025-08-08 04:14:33'),
(37, '19232215', 'Rahayu', 'Rahayuorlando@gmail.com', NULL, '$2y$12$53M6QCL6sKc8dEDzKIFXDuHEJuYd8pHdqnV6tOrrVFvWtr5ghHuey', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:33', '2025-08-08 04:14:33'),
(38, '19231214', 'Rifaa Tumaadhira Adiibah', 'tumaadhirarifaa05@gmail.com', NULL, '$2y$12$I2nPVIzEukssnqnBdFCYbObBThblrWS9iishrpQN4KNSQLRlUKatC', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:34', '2025-08-08 04:14:34'),
(39, '19231721', 'Farabi Rizki Januar', 'farabijkt006@gmail.com', NULL, '$2y$12$qAW4/5PPJhwWNKFOAlVE3OX.8usr0XgtT7h7uTgEV0129mR4Bb9hW', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:35', '2025-08-08 04:14:35'),
(40, '19241849', 'Andrau Stevanus Parada Butar-butar', 'andraustefanus@gmail.com', NULL, '$2y$12$Bjho2FuHVbFq6ZT3DLcvxecW.Bo5e.owDTKoKHFP3xm.DuB3ZoEJK', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:36', '2025-08-08 04:14:36'),
(41, '19241441', 'Septian Ramadhan', 'ian.septianramadhan@gmail.com', NULL, '$2y$12$dEelxGY5Baw7FMMyWPNnDeJspurzN4/ryGduK6kKwtbGpnH3WF9ia', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:37', '2025-08-08 04:14:37'),
(42, '19242254', 'Muhammad Rizky Ferdiansyah', 'rizkya7y123@gmail.com', NULL, '$2y$12$SP31aT0G21vs8g5rSbrmMuQ9ZyH0sxSsvnv3Xz9MuotjwLmHjLeui', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:38', '2025-08-08 04:14:38'),
(43, '19241408', 'Muhammad Erry Saputra', 'muhammadxrry@gmail.com', NULL, '$2y$12$Rw2bJHIQb.8T9T.ios1n0uPPCaEsgasctmncJyxldO8WR1.JqmXou', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:38', '2025-08-08 04:14:38'),
(44, '19240864', 'Rakha Ikbar Amim', 'rakhaikbar01@gmail.com', NULL, '$2y$12$TF0xWQabtmi5Da6XbvqHZumIxs5d.oQFnwEVDzzIGpA5z/cOsf/Sy', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:39', '2025-08-08 04:14:39'),
(45, '19240281', 'Kesya Jelita', 'keyzajelitaahmad@gmail.com', NULL, '$2y$12$qD7LEp6nXscHFOfmRIGqm.zs3F0QMwqddbiD4EiOBUyU0gF93LKtm', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:40', '2025-08-08 04:14:40'),
(46, '19240930', 'Joel Esekiel Langkudi', 'joellangkudi2@gmail.com', NULL, '$2y$12$T9SGZvew1vaRE24kZbgQcOuBsStTt/lEvBqTfLJWsls43YQ3sH3nK', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:41', '2025-08-08 04:14:41'),
(47, '19241919', 'Renu Yusmiar Kusumo', 'renuyusmiark@gmail.com', NULL, '$2y$12$wzC9V46bbvdgcjdJHm7up.bRSkgBH659jmjW4dPafDq16gR9A9gRu', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-08 04:14:42', '2025-08-08 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kandidat_id` bigint UNSIGNED NOT NULL,
  `pemilihan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_kegiatan_id_foreign` (`kegiatan_id`),
  ADD KEY `absensi_user_id_foreign` (`user_id`);

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acara_slug_unique` (`slug`),
  ADD KEY `acara_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_slug_unique` (`slug`);

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artikels_slug_unique` (`slug`),
  ADD KEY `artikels_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandidat_kandidat_ketua_id_foreign` (`kandidat_ketua_id`),
  ADD KEY `kandidat_kandidat_wakil_id_foreign` (`kandidat_wakil_id`),
  ADD KEY `kandidat_pemilihan_id_foreign` (`pemilihan_id`);

--
-- Indexes for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_acara_slug_unique` (`slug`);

--
-- Indexes for table `kegiatan_absensi`
--
ALTER TABLE `kegiatan_absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kegiatan_absensi_slug_unique` (`slug`);

--
-- Indexes for table `kesan-pesan`
--
ALTER TABLE `kesan-pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kesan_pesan_user_id_foreign` (`user_id`);

--
-- Indexes for table `konten_album`
--
ALTER TABLE `konten_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konten_album_album_id_foreign` (`album_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemilihan_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voting_user_id_pemilihan_id_unique` (`user_id`,`pemilihan_id`),
  ADD KEY `voting_kandidat_id_foreign` (`kandidat_id`),
  ADD KEY `voting_pemilihan_id_foreign` (`pemilihan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kegiatan_absensi`
--
ALTER TABLE `kegiatan_absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kesan-pesan`
--
ALTER TABLE `kesan-pesan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konten_album`
--
ALTER TABLE `konten_album`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan_absensi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_acara` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD CONSTRAINT `kandidat_kandidat_ketua_id_foreign` FOREIGN KEY (`kandidat_ketua_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kandidat_kandidat_wakil_id_foreign` FOREIGN KEY (`kandidat_wakil_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kandidat_pemilihan_id_foreign` FOREIGN KEY (`pemilihan_id`) REFERENCES `pemilihan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kesan-pesan`
--
ALTER TABLE `kesan-pesan`
  ADD CONSTRAINT `kesan_pesan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `konten_album`
--
ALTER TABLE `konten_album`
  ADD CONSTRAINT `konten_album_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_kandidat_id_foreign` FOREIGN KEY (`kandidat_id`) REFERENCES `kandidat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voting_pemilihan_id_foreign` FOREIGN KEY (`pemilihan_id`) REFERENCES `pemilihan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voting_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
