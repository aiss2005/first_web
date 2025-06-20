-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 12:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_admin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username_admin` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akses_level` enum('1','Kepala perpustakaan','Admin perpustakaan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_delete_admin` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `akses_level`, `is_delete_admin`, `created_at`, `updated_at`) VALUES
('ADM000', 'developer', 'developer', '$2y$10$BtHHWFXmLuhnP79ievN58O8EivCDmojcmNDivaVhmIlBQNSiqr9Ku', '1', '0', '2025-05-05 10:06:48', '2025-05-05 10:06:48'),
('ADM002', 'Das', 'das', '$2y$12$aoXPT1KAzSfrrL/hbUgcIuTaFivnyMNN4YHd9nAly/VU6Sb6TIjvi', 'Admin perpustakaan', '1', '2025-04-28 07:12:19', '2025-04-28 07:12:48'),
('ADM003', 'Felix11', 'felix', '$2y$12$i3.G116Ms3/X3nRBNNbKku7xFH1XUa4kuHKb0YjhfJWCkYsePx41u', 'Kepala perpustakaan', '1', '2025-04-28 08:24:31', '2025-05-05 06:41:22'),
('ADM004', 'Orang', 'orang', '$2y$12$ZPIIIs1NymHzCFqfRib3t.OgDEWnS9X2TE624DWhb6oG23sxOg0la', 'Kepala perpustakaan', '0', '2025-04-28 09:00:17', '2025-04-28 09:00:17'),
('ADM005', 'Irfan', 'irfan', '$2y$12$y9YDp9gBvb7HcTIKg1EGkOFpxFCK0ZzA/QP659lA2Rgq9mPLSe4sO', 'Admin perpustakaan', '0', '2025-04-28 09:05:10', '2025-04-28 09:05:10'),
('ADM006', 'Oscar', 'oscar', '$2y$12$9UXR3HNd8LwdtPIkJGVmVublQxJoNKtLqO5ar6XCGpVX0kLRGzBn6', 'Kepala perpustakaan', '0', '2025-05-05 06:41:00', '2025-05-05 06:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_anggota` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_tlp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_anggota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_delete_anggota` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `no_tlp`, `alamat`, `email`, `password_anggota`, `is_delete_anggota`, `created_at`, `updated_at`) VALUES
('ANG001', 'anggota1', 'L', '089090808076', 'rumah', 'email@gmail.com', '$2y$12$ObefxfFRnEXFuSKp/IR9wegOHH6BE7G.I4liMMG5S9Ob5.DePJRku', '0', '2025-05-04 11:21:58', '2025-05-04 11:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `judul_buku` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengarang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penerbit` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_eksemplar` int(3) NOT NULL,
  `id_kategori` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_rak` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cover_buku` varchar(255) NOT NULL,
  `e_book` varchar(30) NOT NULL,
  `is_delete_buku` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun`, `jumlah_eksemplar`, `id_kategori`, `keterangan`, `id_rak`, `cover_buku`, `e_book`, `is_delete_buku`, `created_at`, `updated_at`) VALUES
('BKU001', 'Dunia Fantasy', 'Dufann', 'Ancoll', '2020', 4, 'KTG003', 'Tersediaa', 'RAK002', 'Cover-Buku-20250607011217.jpeg', 'E-Book-20250607011217.pdf', '1', '2025-06-07 01:12:17', '2025-06-07 02:24:59'),
('BKU002', 'Statistika Itu Mudah', 'Santoso', 'Sinar Jaya', '2024', 10, 'KTG001', 'Banyak', 'RAK006', 'Cover-Buku-20250607022124.jpg', 'E-Book-20250607022124.pdf', '0', '2025-06-07 02:21:24', '2025-06-07 02:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_peminjaman`
--

CREATE TABLE `tbl_detail_peminjaman` (
  `no_peminjaman` varchar(12) NOT NULL,
  `id_buku` varchar(6) NOT NULL,
  `status_pinjam` enum('Sedang dipinjam','Sudah dikembalikan') NOT NULL,
  `perpanjangan` int(1) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kategori` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_delete_kategori` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `is_delete_kategori`, `created_at`, `updated_at`) VALUES
('KTG001', 'Horror', '0', '2025-05-04 11:22:17', '2025-05-04 11:22:17'),
('KTG002', 'Komedi', '0', '2025-05-04 11:22:21', '2025-05-04 11:22:21'),
('KTG003', 'Drama', '0', '2025-05-04 11:22:25', '2025-05-04 11:22:25'),
('KTG004', 'Action', '0', '2025-05-04 11:37:05', '2025-05-04 11:37:05'),
('KTG005', 'Fantasy', '0', '2025-05-04 11:37:12', '2025-05-04 11:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `no_peminjaman` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_admin` varchar(6) NOT NULL,
  `status_transaksi` enum('Selesai','Berjalan') NOT NULL,
  `status_ambil_buku` enum('Belum diambil','Sudah diambil') NOT NULL,
  `qr_code` varchar(30) NOT NULL,
  `total_pinjam` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `no_pengembalian` varchar(12) NOT NULL,
  `no_peminjaman` varchar(12) NOT NULL,
  `id_buku` varchar(6) NOT NULL,
  `denda` double NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `id_admin` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_rak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_delete_rak` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`, `is_delete_rak`, `created_at`, `updated_at`) VALUES
('RAK001', 'Baris 1', '0', '2025-05-04 11:22:32', '2025-05-04 11:22:32'),
('RAK002', 'Baris 2', '0', '2025-05-04 11:22:37', '2025-05-04 11:22:37'),
('RAK003', 'Baris 3', '0', '2025-05-04 11:24:29', '2025-05-04 11:24:29'),
('RAK004', 'Donghua', '0', '2025-05-04 11:36:37', '2025-05-04 11:36:37'),
('RAK005', 'Komik', '0', '2025-05-04 11:36:43', '2025-05-04 11:36:43'),
('RAK006', 'Lantai 1', '0', '2025-05-04 11:36:52', '2025-05-04 11:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_peminjaman`
--

CREATE TABLE `tbl_temp_peminjaman` (
  `id_anggota` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_buku` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_temp` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_temp_peminjaman`
--

INSERT INTO `tbl_temp_peminjaman` (`id_anggota`, `id_buku`, `jumlah_temp`) VALUES
('ANG001', 'BKU001', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`,`id_rak`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`no_peminjaman`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`no_pengembalian`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
