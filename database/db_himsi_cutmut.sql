-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2025 at 05:27 AM
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
  `tanggal_mulai` date NOT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
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

INSERT INTO `acara` (`id`, `kategori_id`, `nama`, `deskripsi`, `lokasi`, `contact_person`, `poster`, `kuota`, `status`, `slug`, `tanggal_mulai`, `waktu_mulai`, `tanggal_selesai`, `waktu_selesai`, `link_pendaftaran`, `link_wa`, `biaya`, `payment_method`, `payment_number`, `payment_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'CAMPUS MEETUP HIMSI Study Club 2025 X AllStars Academy Indonesia', 'Kegiatan CAMPUS MEETUP HIMSI Study Club 2025 X AllStars Academy Indonesia dengan tema \"Exploring Blockchain & Web3 Technology\" - Educate, Empower, Elevate through Decentralized Innovation.\n\nDalam kegiatan ini, peserta akan mendapatkan benefit:\n✅ Kenalan langsung dengan konsep Blockchain & Web3\n✅ Dapat wawasan karier di industri Web3  \n✅ Ikut workshop mini bikin dApp tanpa perlu modal\n✅ Ngobrol bareng komunitas Allstars Academy Indonesia\n✅ e-certificate\n✅ Ada doorprize menarik\n\nPembicara utama: Laura Stephanie Phang (Country Manager – Allstars Academy Indonesia)\n\nWajib untuk diikuti untuk teman-teman yang mau eksplor hal baru!, khususnya fakultas teknik dan Informatika, dan juga terbuka umum untuk seluruh mahasiswa UBSI lain yang tertarik!', 'Hotel 88 Bekasi', '085710430631', 'posters/campus-meetup-himsi-2025.png', '100', 'closed', 'campus-meetup-himsi-study-club-2025-x-allstars-academy-indonesia', '2025-06-28', '13:00:00', '2025-06-28', '16:00:00', 'https://lu.ma/e7bwnown', NULL, 'gratis', NULL, NULL, NULL, '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(2, 3, 'BERBAGI KASIH & PEDULI', '✨ BERBAGI KASIH & PEDULI ✨\n\nIndahnya berbagi di bulan Ramadhan! 🌙✨\n\nHimpunan Mahasiswa Sistem Informasi (HIMSI) Cutmutiah & Kalimalang X OJT Kalimalang mengajak kawan-kawan bagian dari kebaikan! ✨ \nBantu adik-adik yatim & piatu dengan donasi terbaikmu. Sekecil apa pun bantuanmu, berarti besar buat mereka.\n\n💰 Cara Berdonasi:\n✅ Seabank: 901261951189 (Anisa Fitri)\n✅ Dana/Gopay: 082114396332 (Laurensia Stevanic)\n✅ Bank BCA: 7411101499 (Muhamad Fachri)\n\nMari bersama-sama menebar kebaikan dan keberkahan di bulan yang penuh rahmat ini! 🌟\n\n\"Sedekah yang paling utama adalah sedekah di bulan Ramadhan.\" (HR. At-Tirmidzi)\n\n#HIMSIBerbagi #RamadhanBerkah #BerbagiItuIndah #HIMSICUTMUTIAHXOJTKALIMALANG', 'Kampus UBSI Kalimalang', '082114396332', 'posters/berbagi-kasih-peduli-2025.png', NULL, 'closed', 'berbagi-kasih-peduli-ramadhan-2025', '2025-03-08', NULL, '2025-03-20', NULL, NULL, NULL, 'donasi sukarela', 'Seabank/Dana/Gopay/BCA', '901261951189 (Seabank) | 082114396332 (Dana/Gopay) | 7411101499 (BCA)', 'Anisa Fitri (Seabank) | Laurensia Stevanic (Dana/Gopay) | Muhamad Fachri (BCA)', '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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
(1, 'HIMSI Sehat', 2025, 'himsi-sehat', 'Dokumentasi rangkaian kegiatan olahraga yang diselenggarakan oleh HIMSI UBSI. Program ini bertujuan untuk menjaga kesehatan fisik dan mental mahasiswa serta mempererat tali silaturahmi antar mahasiswa sistem informasi.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(2, 'Campus Meetup Allstars x UBSI (HIMSI Study Club)', 2025, 'campus-meetup-allstars-x-ubsi-himsi-study-club', 'Dokumentasi acara Campus Meetup Allstars x UBSI yang diselenggarakan oleh HIMSI Study Club. Kegiatan ini merupakan kolaborasi dengan komunitas teknologi untuk sharing knowledge, networking, dan pengembangan skill mahasiswa sistem informasi dalam bidang teknologi terkini.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(3, 'Sertijab Pengurus HIMSI 2025', 2025, 'sertijab-pengurus-himsi-2025', 'Dokumentasi acara serah terima jabatan dari pengurus HIMSI periode 2024 kepada pengurus baru periode 2025. Acara ini menandai pergantian kepemimpinan dan regenerasi organisasi.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(4, 'HIMSI Berbagi Ramadan', 2025, 'himsi-berbagi-ramadan', 'Dokumentasi kegiatan HIMSI Berbagi selama bulan Ramadan berupa buka puasa bersama, pembagian takjil, santunan anak yatim, dan kegiatan sosial lainnya. Program ini merupakan bentuk kepedulian dan berbagi kebahagiaan dengan sesama di bulan yang penuh berkah.', '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-global_login:127.0.0.1', 'i:4;', 1755151236),
('laravel-cache-global_login:127.0.0.1:timer', 'i:1755151236;', 1755151236),
('laravel-cache-login_ip:127.0.0.1', 'i:3;', 1755147696),
('laravel-cache-login_ip:127.0.0.1:timer', 'i:1755147696;', 1755147696),
('laravel-cache-login_nim:0000000001', 'i:3;', 1755147696),
('laravel-cache-login_nim:0000000001:timer', 'i:1755147696;', 1755147696);

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
-- Table structure for table `join_himsi`
--

CREATE TABLE `join_himsi` (
  `id` bigint UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_himsi`
--

INSERT INTO `join_himsi` (`id`, `link`, `created_at`, `updated_at`) VALUES
(1, 'https://oprechimsi.com/', '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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
(1, 'Seminar & Workshop', 'seminar-workshop', 'Kategori acara untuk kegiatan seminar dan workshop yang bertujuan untuk meningkatkan pengetahuan dan keterampilan mahasiswa sistem informasi.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(2, 'Kompetisi', 'kompetisi', 'Kategori acara untuk berbagai kompetisi seperti programming contest, UI/UX design, dan kompetisi teknologi lainnya.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(3, 'Kegiatan Sosial', 'kegiatan-sosial', 'Kategori acara untuk kegiatan bakti sosial, donor darah, dan berbagai aktivitas kepedulian sosial lainnya.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(4, 'Olahraga & Kesehatan', 'olahraga-kesehatan', 'Kategori acara untuk turnamen olahraga, senam, dan kegiatan yang berkaitan dengan kesehatan fisik mahasiswa.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(5, 'Organisasi & Kepemimpinan', 'organisasi-kepemimpinan', 'Kategori acara untuk kegiatan organisasi seperti sertijab, rapat koordinasi, dan pelatihan kepemimpinan.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(6, 'HIMSI', 'himsi', 'Kategori acara untuk kegiatan HIMSI seperti rapat, diskusi, dan kegiatan internal organisasi.', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(7, 'Hiburan & Rekreasi', 'hiburan-rekreasi', 'Kategori acara untuk kegiatan hiburan, gathering, study tour, dan aktivitas rekreasi lainnya.', '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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
(1, 1, NULL, 'foto/badmin1.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(2, 1, NULL, 'foto/badmin2.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(3, 1, NULL, 'foto/badmin3.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(4, 1, NULL, 'foto/badmin4.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(5, 2, NULL, 'foto/studyclub1.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(6, 2, NULL, 'foto/studyclub2.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(7, 2, NULL, 'foto/studyclub3.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(8, 2, NULL, 'foto/studyclub4.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(9, 2, NULL, 'foto/studyclub5.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(10, 2, NULL, 'foto/studyclub6.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(11, 2, NULL, 'foto/studyclub7.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(12, 2, NULL, 'foto/studyclub8.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(13, 2, NULL, 'foto/studyclub9.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(14, 2, NULL, 'foto/studyclub10.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(15, 3, NULL, 'foto/sertijab1.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(16, 3, NULL, 'foto/sertijab2.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(17, 3, NULL, 'foto/sertijab3.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(18, 3, NULL, 'foto/sertijab4.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(19, 3, NULL, 'foto/sertijab5.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(20, 3, NULL, 'foto/sertijab7.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(21, 3, NULL, 'foto/sertijab8.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(22, 3, NULL, 'foto/sertijab9.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(23, 3, NULL, 'foto/sertijab10.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(24, 4, NULL, 'foto/berbagi1.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(25, 4, NULL, 'foto/berbagi2.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(26, 4, NULL, 'foto/berbagi3.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(27, 4, NULL, 'foto/berbagi4.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(28, 4, NULL, 'foto/berbagi5.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(29, 4, NULL, 'foto/berbagi6.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(30, 4, NULL, 'foto/berbagi7.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(31, 4, NULL, 'foto/berbagi8.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(32, 4, NULL, 'foto/berbagi9.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(33, 4, NULL, 'foto/berbagi10.jpeg', '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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
(15, '2025_08_08_170505_create_cache_table', 1),
(16, '2025_08_14_093500_create_join_himsi', 1);

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
('1RMwRa5ODv6W3enwnbjKqzyCF0tBF9qvrdzNpmU7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkRiVE1jd1RTQTF4NTFOZHRxRWZOc242TUN4QmNrc0tXcHVneE5kSyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZC9rb250ZW4tZ2FsbGVyeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755147654);

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
(1, 'struktur/himsi.png', '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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
(1, '0000000001', 'Admin HIMSI', 'admin@himsi.com', '2025-08-14 04:59:26', '$2y$12$xT3b/c.3l1aLxrAuq0gRzORiHZAJeuTHqwehH5/vycNpw4NeWGOlG', 'admin', NULL, NULL, NULL, '4FuIHhor4v', '2025-08-14 04:59:26', '2025-08-14 04:59:26'),
(2, '12230060', 'Muhamad Fachri', '12230060@bsi.ac.id', NULL, '$2y$12$9BPu8k78joOXUR/qhpBBI.Degk2TDpRR75pLf./pdeiWrdYN.AwIy', 'bph', NULL, 'ketua', NULL, NULL, '2025-08-14 04:59:27', '2025-08-14 04:59:27'),
(3, '19230390', 'Reggy Helva Rezal', 'reggyhelva28@gmail.com', NULL, '$2y$12$Pvb0EmKwQ73AWD3iw/uFBO8k53oeQXu.QnQ2LZekGrGATkAqWmVUe', 'bph', NULL, 'wakil_ketua', NULL, NULL, '2025-08-14 04:59:27', '2025-08-14 04:59:27'),
(4, '19231010', 'Adi Andrianto', 'adiandrianto146@gmail.com', NULL, '$2y$12$wKwyj5BJioYgRaCvgN9bJeCf6o1iK2jicNtZFEqrjy3W6.2rk7fJu', 'bph', NULL, 'sekretaris', NULL, NULL, '2025-08-14 04:59:27', '2025-08-14 04:59:27'),
(5, '12230105', 'Laurensia Stevanic Elizabeth', 'elizabethstevanic@gmail.com', NULL, '$2y$12$/JNKE548ysZSoFFMqVDnEOIfsFaSAsXMIlinwIZz4Iai3iOfRNC6G', 'bph', NULL, 'bendahara', NULL, NULL, '2025-08-14 04:59:27', '2025-08-14 04:59:27'),
(6, '19240961', 'Andika Muhammad Rizky', 'andikaaa.muh.riz@gmail.com', NULL, '$2y$12$33ST04MgOKoY7Xb0HbNoXO8eehOP5qZJaikqAFNfwPgNe/U1ny59u', 'bph', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:28', '2025-08-14 04:59:28'),
(7, '19240891', 'Andhika Syarifudin', 'andika15657@gmail.com', NULL, '$2y$12$Cb/pYItw5PP5uPcvzuS7melQX275rIMBMNZlwa0SVel1eUTtHgqmC', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:28', '2025-08-14 04:59:28'),
(8, '12230102', 'Arya Ramadhani', 'arya.ramadhani091@gmail.com', NULL, '$2y$12$irmTPG1of8JhbimBeL51zOOFzxMrNfXlCV3PpkVQjdYNOTG8LROVK', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:28', '2025-08-14 04:59:28'),
(9, '19230089', 'Aqiila Aviani', 'aqiilaviani20@gmail.com', NULL, '$2y$12$25s/FA5TJHIvJws3oK79ruJWaXPCl9UsTAOlXQwFzPnjr18C6wu.G', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:28', '2025-08-14 04:59:28'),
(10, '19231429', 'Faiz Ilyasa', 'faizilyasa16@gmail.com', NULL, '$2y$12$685KWEy3tPKpxn2s29q0AOn5mB29cNVg0DHLi1ZNaXHgnVdoe32GS', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:29', '2025-08-14 04:59:29'),
(11, '19242299', 'Mochamad Fahri Putra Pratama', 'moch.fahriputra.p@gmail.com', NULL, '$2y$12$8o.Ktcsr4iM4wh4e/KOvIefZglY65vx7KgpAmWm4pI05Q.DxMOjDG', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:29', '2025-08-14 04:59:29'),
(12, '19241675', 'Muhamad Nizam Zuhayr', 'nizamzuhayr12@gmail.com', NULL, '$2y$12$5aZVUIdvRpJnf2FDPARa/OnRC6x1EMLStgIQ1JJbVKbZd7Zhn6UXK', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:29', '2025-08-14 04:59:29'),
(13, '19241701', 'Rafly Dwi Maulana', 'raflydwimaulana9@gmail.com', NULL, '$2y$12$SJyS8fwjHXUTsetRJSqGyuB6YtGSMJkVNdBOAMXhHFwR0t5kJ8SQu', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:29', '2025-08-14 04:59:29'),
(14, '19242003', 'Herlambang Chandra Radhitya', 'radhityachandra12@gmail.com', NULL, '$2y$12$ygrVlBmbG3pgt.nyXfz3IuuJCLGr3NLpoyreiKRIK0DE.5RQzXI8i', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:30', '2025-08-14 04:59:30'),
(15, '19242185', 'Tennoo Ramadhan Kurniawan', 'tenoramadhan1210@gmail.com', NULL, '$2y$12$UaPyXEQndxdJ6iHEW27h4.SUeZFoyZIW8nyuT.T3/qjUVJhezWeo2', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:30', '2025-08-14 04:59:30'),
(16, '19241360', 'Naufal Putra Winawan', 'putrawnaufal@gmail.com', NULL, '$2y$12$knGxTOKFRvwnvCjIQk9.3uW1yidfey8AqUWsETg1sv7eFgylIhOdS', 'anggota', NULL, 'rsdm', NULL, NULL, '2025-08-14 04:59:30', '2025-08-14 04:59:30'),
(17, '12230101', 'Cahya Alia', 'cahyarismayanti@gmail.com', NULL, '$2y$12$ROiuqTqQlHyVrxEoG7kCm.le15RpiHdSpQe11aK0lfMt3ZQEntMeS', 'bph', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:30', '2025-08-14 04:59:30'),
(18, '19231416', 'Aisyah Putri Regardo', 'aisyahputriregardo@gmail.com', NULL, '$2y$12$XYU3kDvnJLdMYWzKHys/suQAqZ8ctyvUc4GqRAqNcI14hyv07.RLK', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:31', '2025-08-14 04:59:31'),
(19, '19231904', 'Arnanda Surya Mukti', 'arnandasr@gmail.com', NULL, '$2y$12$O.jEtK8ECkfpgvcXHxf/rugLhsEK5bUXk1pO7VIsqt2TinsBnpTbS', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:31', '2025-08-14 04:59:31'),
(20, '19231769', 'Yuni Saidah', 'yunisaidah05@gmail.com', NULL, '$2y$12$zRx5Kp4.2tP6138lun1uU.QV.MITXh4eK.OpP1Eppp1z.TbgMtaai', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:31', '2025-08-14 04:59:31'),
(21, '19231251', 'Eriel Firman Suandanis', 'steelblack222@gmail.com', NULL, '$2y$12$KoTp6lSlj9iEPVbMBHh2Ue0JKV4gW3ywTmBMHBDgP.3YjTiYY8H0K', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:32', '2025-08-14 04:59:32'),
(22, '19231213', 'Fitra Hakiki Firdaus', 'fitrahakikif@gmail.com', NULL, '$2y$12$WHsBfGVh9Fw14Crg12t2Ouom65ezGeZ.YDXA2TRI.S14pTjPluLP.', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:32', '2025-08-14 04:59:32'),
(23, '19240747', 'Adityo Nurcholis Wibisono', 'adityo.nw10@gmail.com', NULL, '$2y$12$IORYjd.WTHilT91XuwYY6eDdjpdQ69fhr4fX/1T3DPA6sYfbvjKEu', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:32', '2025-08-14 04:59:32'),
(24, '12230042', 'Muhammad Rochman Triatmojo', 'muhammadrohmantriat@gmail.com', NULL, '$2y$12$9.e7p8A4ncbNd37yoSxHYOgwBQC82WWVOnUJVDJWhb5y3HGTMFLQu', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:32', '2025-08-14 04:59:32'),
(25, '19242335', 'Afifudin', 'afifudin141213@gmail.com', NULL, '$2y$12$zFjYSoyfrEWGQv6IKF9XV.rS9S3nbQbiOkcAF.mIVgnvSXTQJ1SaG', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:33', '2025-08-14 04:59:33'),
(26, '19242089', 'Najwan Muyassar', 'najwanmuyassar16@gmail.com', NULL, '$2y$12$eNVXT2j79fVzEy.laLCQMe1vGFfYpMI8JBMiUxNtGkvk7WbZ8yfWq', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:33', '2025-08-14 04:59:33'),
(27, '19231413', 'Danu Pangestu', 'pangestudanu92@gmail.com', NULL, '$2y$12$W0w92OJa1et7xsczLHP/7.fui/rFHnm/lONYWkWfz98PGhI8.0AXm', 'anggota', NULL, 'litbang', NULL, NULL, '2025-08-14 04:59:33', '2025-08-14 04:59:33'),
(28, '12230001', 'Dafina Nabila Putri', 'dafinanabila122@gmail.com', NULL, '$2y$12$w.BeNK./mrDat143uPBnUeVWS4Q7ojhtX7oJN86jJTmQyrfpOPkje', 'bph', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:33', '2025-08-14 04:59:33'),
(29, '19231019', 'Indah Tri Rahmawati', 'indhrhmwt3084@gmail.com', NULL, '$2y$12$KN2rmmF0QIAC8kQarbCFH.327yXFy6IfayFXX3iS0izzGboGrmPju', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:34', '2025-08-14 04:59:34'),
(30, '19230049', 'Tiara Falensia', 'tiarafalensia2@gmail.com', NULL, '$2y$12$NWrNmRevh86b05qUR5JRaeARJmH2TKV6OOLIlylEqangFFfW4gs3e', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:34', '2025-08-14 04:59:34'),
(31, '19231624', 'Ummi Kulsum', 'ummikalsumbahenol@gmail.com', NULL, '$2y$12$OvPPlctrr3qxv2/ScmtXHukmPlc5AX30JmaIYnUp0qbE3Po5f/eHa', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:34', '2025-08-14 04:59:34'),
(32, '19240043', 'Sauqi Danang Prastowo', 'danangprastowo99@gmail.com', NULL, '$2y$12$aN/tg1UICbzyGD1sfkgJcOaqbsMR6nl0lGQzKz1LJSjs6i3VLiNCG', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:34', '2025-08-14 04:59:34'),
(33, '19241262', 'Bilal Nur Akmal', 'bllnrkml12@gmail.com', NULL, '$2y$12$7IltpZ5JHY/OCzGFXpmshelI.i3f/Z9PWCNfjRBoJMGc4At7qyJFm', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:35', '2025-08-14 04:59:35'),
(34, '19230786', 'Christian Octavio Arshendy', 'christian.octavio27@gmail.com', NULL, '$2y$12$iQ63mMLLx9SCfoXg1AHhX.SyJRa78LCcVfHbjiLKeWcBkUlvbtXJS', 'anggota', NULL, 'pendidikan', NULL, NULL, '2025-08-14 04:59:35', '2025-08-14 04:59:35'),
(35, '19241201', 'Aulia An Najmi', 'aulianajmi26@gmail.com', NULL, '$2y$12$Ph49CfxJ44qyrYqaCGIHa.UqmZ2aPOgu9FqXwzxbTdszjkCASgwXK', 'bph', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:35', '2025-08-14 04:59:35'),
(36, '19231620', 'Hertha Berlina', 'herthaharyanto@gmail.com', NULL, '$2y$12$I7YwGRR7zSE2WyNXiUmlM.2UDG5dZw.YWk8jLbaJcnhRRBhCsreNu', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:35', '2025-08-14 04:59:35'),
(37, '19232215', 'Rahayu', 'Rahayuorlando@gmail.com', NULL, '$2y$12$64ih7uJQYofB.tLghUFWqujIQJTJyjJMlTcVfWMX8UQFwtiE9LxQa', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:36', '2025-08-14 04:59:36'),
(38, '19231214', 'Rifaa Tumaadhira Adiibah', 'tumaadhirarifaa05@gmail.com', NULL, '$2y$12$udkKuysUhtqcRSyzk/lZy.qlZ4BjqaNuAby78t8b7OYBxiJiJr6/W', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:36', '2025-08-14 04:59:36'),
(39, '19231721', 'Farabi Rizki Januar', 'farabijkt006@gmail.com', NULL, '$2y$12$80juyVizyBryM1jViRNIEuDkNBuXi9qzRNl9kW0LY49I2DdcibK2q', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:36', '2025-08-14 04:59:36'),
(40, '19241849', 'Andrau Stevanus Parada Butar-butar', 'andraustefanus@gmail.com', NULL, '$2y$12$4E9FYzrYkvxQImyfy8.GTer1rOpm5jRinD.qMAkpXP671mgyLirea', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:36', '2025-08-14 04:59:36'),
(41, '19241441', 'Septian Ramadhan', 'ian.septianramadhan@gmail.com', NULL, '$2y$12$SvYPjgXKZkbwHPfgDYbv9uY3sLj.DpU9q9Gw/zBkoVSmjTLCCT1Dm', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:37', '2025-08-14 04:59:37'),
(42, '19242254', 'Muhammad Rizky Ferdiansyah', 'rizkya7y123@gmail.com', NULL, '$2y$12$Oreuymg8ruROEkAfoMDajuUlRkwAW0rYEKSqYJ4EOEJ9dgrn/aHvG', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:37', '2025-08-14 04:59:37'),
(43, '19241408', 'Muhammad Erry Saputra', 'muhammadxrry@gmail.com', NULL, '$2y$12$laJtAhKttoviSGmufcgK5eXpxI6PZrnEKtUkTdKp0uMwL2lH7YtMa', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:37', '2025-08-14 04:59:37'),
(44, '19240864', 'Rakha Ikbar Amim', 'rakhaikbar01@gmail.com', NULL, '$2y$12$GMSLfp.lfzkZmOY70L0DKeJVrXJuayk2gL2pOEbhxLATB7YujdIOa', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:37', '2025-08-14 04:59:37'),
(45, '19240281', 'Kesya Jelita', 'keyzajelitaahmad@gmail.com', NULL, '$2y$12$eGlQWo1JB1DJfEgEt4t7Pefo3AkJYuU2pBrSfPUBPZwguzdPiysNW', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(46, '19240930', 'Joel Esekiel Langkudi', 'joellangkudi2@gmail.com', NULL, '$2y$12$VJgB9SH9W6IweMCECSPPXeoZSNngnknKNEfFzA7ZREh6uUUEAZvve', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:38', '2025-08-14 04:59:38'),
(47, '19241919', 'Renu Yusmiar Kusumo', 'renuyusmiark@gmail.com', NULL, '$2y$12$9nFWIDJN9fG2uqEiP5QnQenQHKW.6EQWy5VdSjgsyD/Qxb.cFYNCO', 'anggota', NULL, 'kominfo', NULL, NULL, '2025-08-14 04:59:38', '2025-08-14 04:59:38');

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
-- Indexes for table `join_himsi`
--
ALTER TABLE `join_himsi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `join_himsi`
--
ALTER TABLE `join_himsi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
