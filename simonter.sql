-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 04:35 PM
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
-- Database: `simonter`
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
(2, 'RW', 'rw@gmail.com', '09978645645768', '$2y$10$ViDNPSe0c0/JBQBjg41D0.84AqbEvpNb0Kp/lB1QQGpK0jAg2FDgC', 'Jalan geo', 1),
(3, 'Admin', 'admin@gmail.com', '089787456', '$2y$10$qBRseBEketQrMdOCV9fgOucl7K9BpwzVi.T7kPxEzlJvTe72BLnV6', 'jalan geo', 2),
(4, 'SKPD', 'skpd@gmail.com', '0898757645', '$2y$10$qTOlF3LdLqo6B2KejphQ/eNN6m8JB19m30noA43HIxOrYWEaeLRRy', 'jl. sawah lunto', 3);

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
  `title_instansi_pelaksana` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_instansi_pelaksana`
--

INSERT INTO `tbl_instansi_pelaksana` (`id_instansi_pelaksana`, `title_instansi_pelaksana`, `deskripsi`) VALUES
(1, 'SDPRKP JS', 'Suku Dinas Perumahan Rakyat dan Kawasan Permukiman Kota Administrasi Jakarta Selatan '),
(2, 'SUDIN PPAPP JS', 'Kepala Suku Dinas Pemberdayaan Perlindungan Anak dan Pengendalian Penduduk Kota Administrasi Jakarta Selatan '),
(3, 'SUDIN LH JS', 'Kepala Suku Dinas Lingkungan Hidup Kota Administrasi Jakarta Selatan '),
(4, 'SUDINKES JS', 'Kepala Suku Dinas Kesehatan Kota Administrasi Jakarta Selatan '),
(5, 'SPUSIP JS', 'Kepala Suku Dinas Perpustakaan dan Arsip Kota Administrasi Jakarta Selatan '),
(6, 'SUDINSOS JS', 'Kepala Suku Dinas Sosial Kota Administrasi Jakarta Selatan '),
(7, 'SUDIN TAMHUT JS', 'Kepala Suku Dinas Pertamanan dan Hutan Kota Kota Administrasi Jakarta Selatan '),
(8, 'SUDIN BM JS', 'Kepala Suku Dinas Bina Marga Kota Administrasi Jakarta Selatan '),
(9, 'SUDIN CITATA JS', 'Kepala Suku Dinas Cipta Karya'),
(10, 'SUDIN SDA JS', 'Kepala Suku Dinas Sumber Daya Air Kota Administrasi Jakarta Selatan '),
(11, 'SUDINAKER JS', 'Kepala Suku Dinas Tenaga Kerja'),
(12, 'SUDISHUB JS', 'Kepala Suku Dinas Perhubungan Kota Administrasi Jakarta Selatan '),
(13, 'SUDIN PAREKRAF JS', 'Kepala Suku Dinas Pariwisata dan Ekonomi Kreatif Kota Administrasi Jakarta Selatan '),
(14, 'SUDIN KEBUDAYAAN JS', 'Kepala Suku Dinas Kebudayaan Kota Administrasi Jakarta Selatan '),
(15, 'SUDIN PORA JS', 'Kepala Suku Dinas Pemuda dan Olahraga Kota Administrasi Jakarta Selatan'),
(16, 'SUDINKOMINFOTIK JS', 'Kepala Suku Dinas Komunikasi'),
(17, 'SUDIN PENDIDIKAN WIL I JS', 'Kepala Suku Dinas Pendidikan Wilayah I Kota Administrasi Jakarta Selatan '),
(18, 'SUDIN PENDIDIKAN WIL II JS', 'Kepala Suku Dinas Pendidikan Wilayah II Kota Administrasi Jakarta Selatan '),
(19, 'SUDIN KPKP JS', 'Kepala Suku Dinas Ketahanan Pangan'),
(20, 'SUDIN PPKUMKM JS', 'Kepala Suku Dinas Perindustrian'),
(21, 'SUDIN DUKCAPIL JS', 'Kepala Suku Dinas Kependudukan dan Pencatatan Sipil Kota Administrasi Jakarta Selatan '),
(22, 'SUDIN DAMKAR JS', 'Kepala Suku Dinas Penanggulangan Kebakaran dan Penyelamatan Kota Administrasi Jakarta Selatan '),
(23, 'UPPMPTSP JS', 'Kepala Unit Pengelola Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Administrasi Jakarta Selatan '),
(24, 'KECAMATAN TEBET', 'Camat Tebet Kota Administrasi Jakarta Selatan '),
(25, 'BAZNAS BAZIS', 'Kepala BAZNAS BAZIS Kota Administrasi Jakarta Selatan '),
(26, 'PPKD JS', 'Kepala Pusat Pelatihan Kerja Daerah Kota Administrasi Jakarta Selatan '),
(27, 'KELURAHAN MENTENG DALAM', 'Lurah Menteng Dalam Kota Administrasi Jakarta Selatan ');

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
(5, 'Layanan Jaringan Jalan/ Akses Antar Wilayah'),
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
(2, 'Admin'),
(3, 'SKPD');

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
  `id_akun` int(11) NOT NULL,
  `title_isu` text NOT NULL,
  `title_kategori` text NOT NULL,
  `title_jenis` text NOT NULL,
  `title_pekerjaan` text NOT NULL,
  `detail_pekerjaan` text NOT NULL,
  `title_sumber` text NOT NULL,
  `title_aset_lahan` text NOT NULL,
  `title_kecamatan` text NOT NULL,
  `title_kelurahan` text NOT NULL,
  `title_rw` text NOT NULL,
  `title_rt` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan_isu` text NOT NULL,
  `nama_file` text NOT NULL,
  `title_opd` text DEFAULT NULL,
  `status_isu` varchar(225) NOT NULL DEFAULT 'Menunggu Verifikasi',
  `manfaat_tujuan_usulan` text NOT NULL,
  `indikasi_program_usulan` text NOT NULL,
  `program_usulan` text NOT NULL,
  `sumber_pendanaan_usulan` int(11) NOT NULL,
  `instansi_pelaksana_usulan` text NOT NULL,
  `indikasi_tahun_pelaksana_usulan` year(4) NOT NULL,
  `dokumentasi_usulan` varchar(255) NOT NULL,
  `status_usulan` text NOT NULL,
  `tanggal_realisasi_monitoring` date DEFAULT NULL,
  `realisasi_monitoring` bigint(20) NOT NULL,
  `keterangan_monitoring` text NOT NULL,
  `dokumentasi_monitoring` varchar(255) NOT NULL,
  `status_monitoring` text NOT NULL,
  `last_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perencanaan`
--

INSERT INTO `tbl_perencanaan` (`id_isu`, `id_akun`, `title_isu`, `title_kategori`, `title_jenis`, `title_pekerjaan`, `detail_pekerjaan`, `title_sumber`, `title_aset_lahan`, `title_kecamatan`, `title_kelurahan`, `title_rw`, `title_rt`, `latitude`, `longitude`, `gambar`, `keterangan_isu`, `nama_file`, `title_opd`, `status_isu`, `manfaat_tujuan_usulan`, `indikasi_program_usulan`, `program_usulan`, `sumber_pendanaan_usulan`, `instansi_pelaksana_usulan`, `indikasi_tahun_pelaksana_usulan`, `dokumentasi_usulan`, `status_usulan`, `tanggal_realisasi_monitoring`, `realisasi_monitoring`, `keterangan_monitoring`, `dokumentasi_monitoring`, `status_monitoring`, `last_created_date`, `last_update_date`) VALUES
(28, 2, 'Banjir/Genangan', 'Fisik', 'Saluran Drainase', 'Pembangunan atau Pengadaan Baru', 'Drainase di belakang rumah Pak Johari (di perbatasan RT 05 dan RT 06), salurannya sangat kecil.', 'Usulan Warga', 'Non Pemda', '', 'Menteng Dalam', '013', '005', '-6.233400', '106.837176', 'drainase.jpg', 'Perlu konfirmasi apakah sudah diukur atau belum', '', '', 'Dilanjutkan', '', '', '', 0, '', 0000, '', 'Dilaksanakan', NULL, 0, '', '', 'Selesai', '2024-10-02 20:30:00', '2024-10-02 20:30:00'),
(29, 2, 'Banjir/Genangan', 'Fisik', 'Saluran Drainase', 'Perbaikan', 'Perbaikan drainase di Jl. Rasamala VII sekitar 60 meter', 'Usulan Warga', 'Pemda', '', 'Menteng Dalam', '013', '009', '-6.230969', '106.837112', 'drainase_rt_09.jpg', 'Perlu penajaman lokasi & perlu konfirmasi apakah sudah diukur atau belum', '', 'SDPRKP JS', 'Dilanjutkan', '', '', '', 0, '', 0000, '', 'Dilaksanakan', NULL, 0, '', '', '', '2024-10-02 20:41:19', '2024-10-02 20:41:19'),
(30, 2, 'Banjir/Genangan', 'Fisik', 'Saluran Drainase', 'Perbaikan', 'Drainase di SDN 05 Menteng Dalam', 'Usulan Warga', 'Pemda', '', 'Menteng Dalam', '001', '001', '-6.238987', '106.843464', 'drainase_sekolah.jpg', 'Belum diukur', '', '', 'Menunggu Verifikasi', '', '', '', 0, '', 0000, '', '', NULL, 0, '', '', '', '2024-10-02 20:45:16', '2024-10-02 20:45:16'),
(31, 0, 'Penerangan Jalan/Keamanan', 'Fisik', 'Penerangan Jalan Umum', 'Pembangunan atau Pengadaan Baru', '2 titik PJU di pinggir Kali Cideng', 'Usulan Warga', 'Pemda', '', 'Menteng Dalam', '013', '009', '-6.230097', '106.837175', 'penerangan_lampu.jpg', '', '', 'SUDIN BM JS', 'Dilanjutkan', '', '', '', 0, '', 0000, '', 'Dilaksanakan', NULL, 0, '', '', 'Selesai', '2024-10-02 20:47:58', '2024-10-02 20:47:58');

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
-- Table structure for table `tbl_status_usulan`
--

CREATE TABLE `tbl_status_usulan` (
  `id_status_usulan` int(11) NOT NULL,
  `title_status_usulan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_usulan`
--

INSERT INTO `tbl_status_usulan` (`id_status_usulan`, `title_status_usulan`) VALUES
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
-- Indexes for table `tbl_status_usulan`
--
ALTER TABLE `tbl_status_usulan`
  ADD PRIMARY KEY (`id_status_usulan`);

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
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_aset_lahan`
--
ALTER TABLE `tbl_aset_lahan`
  MODIFY `id_aset_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_instansi_pelaksana`
--
ALTER TABLE `tbl_instansi_pelaksana`
  MODIFY `id_instansi_pelaksana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_perencanaan`
--
ALTER TABLE `tbl_perencanaan`
  MODIFY `id_isu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_status_isu`
--
ALTER TABLE `tbl_status_isu`
  MODIFY `id_status_isu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_usulan`
--
ALTER TABLE `tbl_status_usulan`
  MODIFY `id_status_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
