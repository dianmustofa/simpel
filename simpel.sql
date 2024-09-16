-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 02:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(225) NOT NULL,
  `email_akun` varchar(225) NOT NULL,
  `nomor_akun` varchar(225) NOT NULL,
  `sandi_akun` varchar(225) NOT NULL,
  `alamat_akun` text NOT NULL,
  `id_level_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama_akun`, `email_akun`, `nomor_akun`, `sandi_akun`, `alamat_akun`, `id_level_akun`) VALUES
(2, 'Dian', 'dian@gmail.com', '09978645645768', '$2y$10$ViDNPSe0c0/JBQBjg41D0.84AqbEvpNb0Kp/lB1QQGpK0jAg2FDgC', 'Jalan geo', 1),
(3, 'mustofa', 'mustofa@gmail.com', '089787456', '$2y$10$qBRseBEketQrMdOCV9fgOucl7K9BpwzVi.T7kPxEzlJvTe72BLnV6', 'jalan geo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aset_lahan`
--

CREATE TABLE `tbl_aset_lahan` (
  `id_aset_lahan` int(11) NOT NULL,
  `title_aset_lahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_aset_lahan`
--

INSERT INTO `tbl_aset_lahan` (`id_aset_lahan`, `title_aset_lahan`) VALUES
(1, 'Pemda'),
(2, 'Non Pemda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi_pelaksana`
--

CREATE TABLE `tbl_instansi_pelaksana` (
  `id_instansi_pelaksana` int(11) NOT NULL,
  `title_instansi_pelaksana` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_isu`
--

CREATE TABLE `tbl_isu` (
  `id_isu` int(11) NOT NULL,
  `title_isu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_isu`
--

INSERT INTO `tbl_isu` (`id_isu`, `title_isu`) VALUES
(1, 'Banjir/Genangan'),
(2, 'Budaya'),
(3, 'Ekonomi'),
(4, 'Fisik Lainnya'),
(5, 'Layanan Jaringan Jalan/ Akses Antar Wialyah'),
(6, 'Penerangan Jalan/Keamanan'),
(7, 'Persampahan/Kebersihan Lingkungan'),
(8, 'Proteksi Kebakaran'),
(9, 'Ruang Terbuka'),
(10, 'Sanitasi'),
(11, 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `title_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `id_kategori`, `title_jenis`) VALUES
(1, 1, 'Alat Bermain Anak'),
(2, 1, 'Alat Penampungan Sampah'),
(3, 1, 'Alat Pendukung Kegiatan Budaya'),
(4, 1, 'Alat Pendukung Sosial'),
(5, 1, 'Alat Pengangkutan Persampahan'),
(6, 1, 'APAR'),
(7, 1, 'Cermin Cembung'),
(8, 1, 'Gerbang/Gapura Masuk Kawasan'),
(9, 1, 'Jaringan Jalan'),
(10, 1, 'Jembatan Antar Kampung'),
(11, 1, 'Kamera Pengawas'),
(12, 1, 'Kolam Ikan'),
(13, 1, 'Lapangan Olahraga'),
(14, 1, 'MCK Umum'),
(15, 1, 'Mural'),
(16, 1, 'Penerbangan/Perapihan Pohon'),
(17, 1, 'Penerangan Jalan Umum'),
(18, 1, 'Penghijauan/Vertical Garden'),
(19, 1, 'Peralatan Olahraga'),
(20, 1, 'Peralatan Pengajaran'),
(21, 1, 'Pos/Kantor RW'),
(22, 1, 'Rambu'),
(23, 1, 'Saluran Drainase'),
(24, 1, 'Saluran Drainase (Induk)'),
(25, 1, 'Speed Bump/Speed Trap'),
(26, 1, 'Sumur Resapan atau Bipori'),
(27, 1, 'Taman'),
(28, 1, 'Taman Bacaan'),
(29, 2, 'Kegiatan Pendukung Sosial'),
(30, 2, 'Pelatihan Keterampilan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `title_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `title_kategori`) VALUES
(1, 'Fisik'),
(2, 'Non Fisik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_akun`
--

CREATE TABLE `tbl_level_akun` (
  `id_level` int(11) NOT NULL,
  `title_level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_level_akun`
--

INSERT INTO `tbl_level_akun` (`id_level`, `title_level`) VALUES
(1, 'Masyarakat'),
(2, 'SKPD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `title_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `title_pekerjaan`) VALUES
(1, 'Pembangunan atau Pengadaan Baru'),
(2, 'Perbaikan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perencanaan`
--

CREATE TABLE `tbl_perencanaan` (
  `id_isu` int(11) NOT NULL,
  `title_isu` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `status_isu` varchar(225) NOT NULL,
  `status_usulan` text NOT NULL,
  `last_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perencanaan`
--

INSERT INTO `tbl_perencanaan` (`id_isu`, `title_isu`, `latitude`, `longitude`, `status_isu`, `status_usulan`, `last_created_date`) VALUES
(1, 'Pekerjaan Lingkungan', '-6.233532', '106.841796', 'aktif', 'tidak aktif', '2024-01-14 11:39:48'),
(2, 'Pengerjaan pagar', '-6.229187', '106.835960', 'tidak aktif', 'aktif', '2024-02-14 11:39:48'),
(3, 'Pembuatan Trotoar', '-6.23312', '106.87217', 'aktif', 'aktif', '2024-03-14 11:39:48'),
(4, 'Isu Linkungan', '-6.18814', '106.86316', 'aktif', 'aktif', '2024-04-14 11:39:48'),
(5, 'Draainase', '-6.22327', '106.80774', 'tidak aktif', 'aktif', '2024-04-14 11:39:48'),
(6, 'Isu Banjir', '-6.21776', '106.81895', 'aktif', 'aktif', '2024-01-14 11:39:48'),
(7, 'pembuatan pagar', '-6.23295', '106.84093', '', '', '2024-09-16 14:08:06'),
(8, 'pembuatan pagar RT', '-6.23551', '106.81432', '', '', '2024-09-16 14:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_isu`
--

CREATE TABLE `tbl_status_isu` (
  `id_status_isu` int(11) NOT NULL,
  `title_status_isu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_isu`
--

INSERT INTO `tbl_status_isu` (`id_status_isu`, `title_status_isu`) VALUES
(1, 'Ditolak'),
(2, 'Dilanjutkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_monitor`
--

CREATE TABLE `tbl_status_monitor` (
  `id_status_monitor` int(11) NOT NULL,
  `title_status_monitor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_monitor`
--

INSERT INTO `tbl_status_monitor` (`id_status_monitor`, `title_status_monitor`) VALUES
(1, 'Dilaksanakan'),
(2, 'Tidak Dapat Dilaksanakan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sumber`
--

CREATE TABLE `tbl_sumber` (
  `id_sumber` int(11) NOT NULL,
  `title_sumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sumber`
--

INSERT INTO `tbl_sumber` (`id_sumber`, `title_sumber`) VALUES
(1, 'Usulan Warga'),
(2, 'Tim Penyusun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sumber_pendanaan`
--

CREATE TABLE `tbl_sumber_pendanaan` (
  `id_sumber_pendanaan` int(11) NOT NULL,
  `title_sumber_pendanaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sumber_pendanaan`
--

INSERT INTO `tbl_sumber_pendanaan` (`id_sumber_pendanaan`, `title_sumber_pendanaan`) VALUES
(1, 'APBD'),
(2, 'Non APBD'),
(3, 'Sumber Lain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_aset_lahan`
--
ALTER TABLE `tbl_aset_lahan`
  ADD PRIMARY KEY (`id_aset_lahan`);

--
-- Indexes for table `tbl_instansi_pelaksana`
--
ALTER TABLE `tbl_instansi_pelaksana`
  ADD PRIMARY KEY (`id_instansi_pelaksana`);

--
-- Indexes for table `tbl_isu`
--
ALTER TABLE `tbl_isu`
  ADD PRIMARY KEY (`id_isu`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_level_akun`
--
ALTER TABLE `tbl_level_akun`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tbl_perencanaan`
--
ALTER TABLE `tbl_perencanaan`
  ADD PRIMARY KEY (`id_isu`);

--
-- Indexes for table `tbl_status_isu`
--
ALTER TABLE `tbl_status_isu`
  ADD PRIMARY KEY (`id_status_isu`);

--
-- Indexes for table `tbl_status_monitor`
--
ALTER TABLE `tbl_status_monitor`
  ADD PRIMARY KEY (`id_status_monitor`);

--
-- Indexes for table `tbl_sumber`
--
ALTER TABLE `tbl_sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `tbl_sumber_pendanaan`
--
ALTER TABLE `tbl_sumber_pendanaan`
  ADD PRIMARY KEY (`id_sumber_pendanaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_aset_lahan`
--
ALTER TABLE `tbl_aset_lahan`
  MODIFY `id_aset_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_instansi_pelaksana`
--
ALTER TABLE `tbl_instansi_pelaksana`
  MODIFY `id_instansi_pelaksana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_isu`
--
ALTER TABLE `tbl_isu`
  MODIFY `id_isu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_level_akun`
--
ALTER TABLE `tbl_level_akun`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_perencanaan`
--
ALTER TABLE `tbl_perencanaan`
  MODIFY `id_isu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_status_isu`
--
ALTER TABLE `tbl_status_isu`
  MODIFY `id_status_isu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_monitor`
--
ALTER TABLE `tbl_status_monitor`
  MODIFY `id_status_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sumber`
--
ALTER TABLE `tbl_sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sumber_pendanaan`
--
ALTER TABLE `tbl_sumber_pendanaan`
  MODIFY `id_sumber_pendanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
