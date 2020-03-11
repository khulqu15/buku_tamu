-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2020 pada 23.54
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `name`, `description`, `jumlah`, `status`, `foto`, `kode_barang`, `created_at`, `updated_at`) VALUES
(2, 'Inventaris 2', 'Ini adalah inventaris ke 2', 29, 'Tersedia', 'buku1.png', 'INAGATA-RUP8O', '2020-02-20 17:15:54', '2020-02-26 01:54:08'),
(3, 'Inventaris 3', 'Ini adalah inventaris ke 3', 0, 'Habis', 'buku1.png', 'INAGATA-QO6F8', '2020-02-20 17:15:54', '2020-02-25 06:16:32'),
(4, 'Inventaris 4', 'Ini adalah inventaris ke 4', 39, 'Tersedia', 'buku2.jpeg', 'INAGATA-SHUUK', '2020-02-20 17:15:54', '2020-02-25 06:17:47'),
(5, 'Inventaris 5', 'Ini adalah inventaris ke 5', 50, 'Tersedia', 'buku2.jpeg', 'INAGATA-RFHNS', '2020-02-20 17:15:54', '2020-02-20 17:48:59'),
(6, 'Inventaris 6', 'Ini adalah inventaris ke 6', 76, 'Tersedia', 'buku2.jpeg', 'INAGATA-QYQ9G', '2020-02-20 17:15:55', '2020-02-24 05:02:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pengembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kembali`
--

INSERT INTO `kembali` (`id`, `nama_pengembali`, `transaksi_id`, `created_at`, `updated_at`) VALUES
(1, 'Erfansyah', 6, '2020-02-24 05:02:02', '2020-02-24 05:02:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_13_185217_create_tamus_table', 1),
(5, '2020_02_13_191142_create_videos_table', 1),
(6, '2020_02_15_230052_create_inventaris_table', 1),
(7, '2020_02_15_231908_create_transaksis_table', 1),
(8, '2020_02_19_171103_create_siswas_table', 1),
(9, '2020_02_23_193920_create_kembalis_table', 2),
(10, '2020_02_24_214713_add_foto_to_transaksi_table', 3),
(11, '2020_02_25_063026_add_alamat_to_transaksi_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `name`, `gender`, `kelas`, `jenjang`, `jurusan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad siswa 1', 'Laki Laki', '11', 'SMK', 'MKT', 'Alamat1', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(2, 'Mohammad siswa 2', 'Laki Laki', '10', 'SMK', 'RPL', 'Alamat2', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(3, 'Mohammad siswa 3', 'Laki Laki', '11', 'SMK', 'MKT', 'Alamat3', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(4, 'Mohammad siswa 4', 'Laki Laki', '10', 'SMK', 'RPL', 'Alamat4', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(5, 'Mohammad siswa 5', 'Laki Laki', '11', 'SMK', 'MKT', 'Alamat5', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(7, 'Mohammad siswa 7', 'Perempuan', '11', 'SMK', 'MKT', 'Alamat7', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(8, 'Mohammad siswa 8', 'Perempuan', '10', 'SMK', 'RPL', 'Alamat8', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(9, 'Mohammad siswa 9', 'Perempuan', '11', 'SMK', 'MKT', 'Alamat9', '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(10, 'Mohammad siswa 10', 'Perempuan', '10', 'SMK', 'RPL', 'Alamat10', '2020-02-20 17:15:54', '2020-02-20 17:15:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `name`, `api_token`, `phone`, `umur`, `gender`, `alamat`, `instansi`, `user_id`, `tujuan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Febri', 'RdZyUXjYXB', '08567524522726', 20, 'Laki-Laki', 'Jawatimur, Malang', 'SMKN 1 Purwosari', 1, 'Bertamu', '1582222650-OIYKT.jpeg', '2020-02-21 02:15:51', '2020-02-21 02:17:30'),
(4, 'Mohammad Ninno', '1Ds9wlCulw', '08567524522726', 13, 'Laki-Laki', 'Jawatimur', 'SMAN 1 Purwosari', 1, 'Bertamu', '1582357476-VWZEG.jpeg', '2020-02-22 15:44:16', '2020-02-22 15:44:37'),
(6, 'Adellia Andri Cahyani', 'GYwhZVEvRc', '1223', 28, 'Laki-Laki', 'Purwosari', 'SMKN 1 Purwosari', 1, 'Bertamu', '1582357540-H476M.jpeg', '2020-02-22 15:45:32', '2020-02-22 15:45:40'),
(7, 'Mohammad Febri', '8o7pozUSS1', '08567524522726', 20, 'Laki-Laki', 'Jawatimur', 'SMKN 1 Purwosari', 1, 'Bertamu', '1582476588-XOLDO.jpeg', '2020-02-24 00:49:26', '2020-02-24 00:49:48'),
(8, 'Mohammad Febri', 'FSZMz9L4i2', '08567524522726', 20, 'Laki-Laki', 'Jawatimur, Pasuruan, Purwosari', 'SMKN 1 Purwosari', 1, 'Bertamu', '1582483162-3UTBN.jpeg', '2020-02-24 02:39:01', '2020-02-24 02:39:22'),
(9, 'Mohammad Febri', 'mTdeBgrlDy', '08567524522726', 20, 'Laki-Laki', 'Jawatimur', 'SMAN 1 Purwosari', 3, 'Bertamu', '1582484167-WZDTC.jpeg', '2020-02-24 02:55:57', '2020-02-24 02:56:07'),
(10, 'Adellia Andri Cahyani', 'zjHTTqqVQ1', '08567524522726', 20, 'Laki-Laki', 'Surabaya', 'SMKN 1 Purwosari', 7, 'Bertamu', '1582484222-MCB16.jpeg', '2020-02-24 02:56:55', '2020-02-24 02:57:02'),
(11, 'Mohammad Halim', 'PRMwhGGPpq', '08567524522726', 20, 'Laki-Laki', 'Jawatimur, Purwosari', 'SMKN 1 Purwosari', 1, 'Bertamu', '1582607253-LCEXX.jpeg', '2020-02-25 13:06:18', '2020-02-25 13:07:34'),
(12, 'Bukan codingan', 'sBeUU17ffP', '08567524522', 25, 'Perempuan', 'Purwosari', 'SMKN 1 Dewantoro', 2, 'Begadang', '1582644360-NOURE.jpeg', '2020-02-25 21:54:09', '2020-02-25 23:59:06'),
(13, 'Adellia Andri Cahyani', 'aKeesPvFX1', '08567524522726', 20, 'Laki-Laki', 'Purwosari', 'SMKN 1 Purwosari', 1, 'Bertamu dan begadang', '1582756532-WATFW.jpeg', '2020-02-27 06:35:06', '2020-02-27 06:35:32'),
(14, 'Adellia Andri Cahyani', 'cYu79uQMd1', '08567524522726', 20, 'Laki-Laki', 'Purwosari', 'SMKN 1 Purwosari', 1, 'Bertamu dan begadang', NULL, '2020-02-27 06:35:06', '2020-02-27 06:35:06'),
(15, 'Ageng Jackson', 'NxdAHdKOay', '08567524522726', 20, 'Laki-Laki', 'Jawatimur, Malang, Arjosari', 'SMKN 1 Purwosari', 1, 'Bertamu', '1582756830-DCRXD.jpeg', '2020-02-27 06:40:23', '2020-02-27 06:40:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventaris_id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pengembalian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `nama_peminjam`, `foto`, `alamat`, `phone_peminjam`, `inventaris_id`, `jumlah`, `pengembalian`, `created_at`, `updated_at`) VALUES
(5, '1582348616-OOODK', 'Dini aprilia', NULL, NULL, '085524236426', 3, 0, '2020-02-28', '2020-02-22 13:16:56', '2020-02-22 13:17:33'),
(6, '1582491473-OJFOA', 'Erfansyah', NULL, NULL, '085524236426', 6, 0, '2020-02-29', '2020-02-24 04:57:53', '2020-02-24 05:02:03'),
(8, '1582581943-X25D8', 'Khusnul', NULL, NULL, '085524236426', 3, 16, '2020-02-29', '2020-02-25 06:05:43', '2020-02-25 06:05:43'),
(9, '1582582570-YI35I', 'Dini aprilia', NULL, NULL, '08827263382624', 3, 8, '2020-02-29', '2020-02-25 06:16:10', '2020-02-25 06:16:10'),
(10, '1582582592-LYZS5', 'Khusnul', NULL, NULL, '08827263382624', 3, 6, '2020-02-29', '2020-02-25 06:16:32', '2020-02-25 06:16:32'),
(11, '1582582667-UUOB2', 'Khusnul', '1582606622-UOSDX.jpeg', NULL, '08827263382624', 4, 1, '2020-02-29', '2020-02-25 06:17:47', '2020-02-25 12:57:02'),
(12, '1582649125-R0ZVY', 'Khusnul', '1582649724-M1CTY.jpeg', NULL, '08827263382624', 2, 1, '2020-02-29', '2020-02-26 00:45:25', '2020-02-26 00:55:24'),
(13, '1582651381-OGA57', 'Ninno', '1582652115-WN1PI.jpeg', 'Martopuro', '1828728', 2, 10, '2020-02-29', '2020-02-26 01:23:01', '2020-02-26 01:51:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `nip`, `foto`, `jabatan`, `gender`, `tgl_lahir`, `tmp_lahir`, `ruangan`, `username`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Mohammad Adminku', '085645027785', '1582573240-UTga1xHucItGNSx7Jdvf.jpg', 'Administrator', 'Laki Laki', '2020-03-20', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan utama di ujung sebelah timur', 'admin', '$2y$10$MbGsTF8Oqtk2Tv/ffbG2sOOirROIMzC8mPugkm2W1IkkAcjWitNni', '54T2JVIHSMGu0VSuJfX7w9NgC0GiZQyyoQjzGPgcaLxo3rT8RImb3CWHC3Cr', NULL, '2020-02-20 17:15:53', '2020-02-25 04:49:11'),
(2, 'Pegawai', 'pegawai 1', '081645027785', 'male.png', 'Developer 1', 'Laki Laki', '2020-03-01', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan ke 1 di ujung sebelah timur', NULL, NULL, NULL, NULL, '2020-02-20 17:15:53', '2020-02-20 17:15:53'),
(3, 'Pegawai', 'pegawai 2', '082645027785', 'male.png', 'Developer 2', 'Laki Laki', '2020-03-02', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan ke 2 di ujung sebelah timur', NULL, NULL, NULL, NULL, '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(4, 'Pegawai', 'pegawai 3', '083645027785', 'male.png', 'Developer 3', 'Laki Laki', '2020-03-03', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan ke 3 di ujung sebelah timur', NULL, NULL, NULL, NULL, '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(5, 'Pegawai', 'pegawai 4', '084645027785', NULL, 'Developer 4', 'Perempuan', '2020-03-04', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan ke 4 di ujung sebelah timur', NULL, NULL, NULL, NULL, '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(6, 'Pegawai', 'pegawai 5', '085645027785', NULL, 'Developer 5', 'Perempuan', '2020-03-05', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan ke 5 di ujung sebelah timur', NULL, NULL, NULL, NULL, '2020-02-20 17:15:54', '2020-02-20 17:15:54'),
(7, 'Pegawai', 'pegawai 6', '086645027785', NULL, 'Developer 6', 'Perempuan', '2020-03-06', 'Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari', 'Silahkan menuju ruangan ke 6 di ujung sebelah timur', NULL, NULL, NULL, NULL, '2020-02-20 17:15:54', '2020-02-20 17:15:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kembali_transaksi_id_foreign` (`transaksi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tamu_api_token_unique` (`api_token`),
  ADD KEY `tamu_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_inventaris_id_foreign` (`inventaris_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD CONSTRAINT `kembali_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD CONSTRAINT `tamu_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_inventaris_id_foreign` FOREIGN KEY (`inventaris_id`) REFERENCES `inventaris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
