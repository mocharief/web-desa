-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 01:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `agama_id` int(11) NOT NULL,
  `agama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`agama_id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Khatolik'),
(4, 'Buddha'),
(5, 'Hindu'),
(6, 'Kong Hu Chu');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `judul`, `id_kat`, `kddesa`) VALUES
(2, 'A', 2, 1),
(3, 'm', 2, 1),
(4, 'A', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `allsetting`
--

CREATE TABLE `allsetting` (
  `kddesa` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allsetting`
--

INSERT INTO `allsetting` (`kddesa`, `desa`) VALUES
(1, 'Cikandung\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `anggotaumkm`
--

CREATE TABLE `anggotaumkm` (
  `id_anggota` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aparat`
--

CREATE TABLE `aparat` (
  `pamong_id` int(5) NOT NULL,
  `id` int(11) NOT NULL,
  `pamong_nama` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nik` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `pamong_tgl_terdaftar` date DEFAULT NULL,
  `pamong_ttd` tinyint(1) DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pamong_tempatlahir` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_tanggallahir` date DEFAULT NULL,
  `pamong_sex` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_pendidikan` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_agama` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nosk` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_tglsk` date DEFAULT NULL,
  `pamong_pangkat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nipd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aparat`
--

INSERT INTO `aparat` (`pamong_id`, `id`, `pamong_nama`, `pamong_nip`, `pamong_nik`, `jabatan`, `pamong_tgl_terdaftar`, `pamong_ttd`, `foto`, `pamong_tempatlahir`, `pamong_tanggallahir`, `pamong_sex`, `pamong_pendidikan`, `pamong_agama`, `pamong_nosk`, `pamong_tglsk`, `pamong_pangkat`, `pamong_nipd`, `kddesa`) VALUES
(10, 12, 'Arie Rukmana', '2', '3332323232', '2', NULL, NULL, '', 'c', '2022-02-16', '1', '1', '1', '2', '2022-02-21', '2', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `isi` text NOT NULL,
  `enabled` int(2) NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `judul` varchar(100) NOT NULL,
  `gambar1` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL,
  `dokumen` text NOT NULL,
  `nama_dokumen` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `asaldana` int(11) NOT NULL,
  `sasaran` int(11) NOT NULL,
  `tgl1` date NOT NULL,
  `tgl2` date NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `budaya`
--

CREATE TABLE `budaya` (
  `id_budaya` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `link` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `data` text NOT NULL,
  `tgl_posting` datetime NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `covid_pantau`
--

CREATE TABLE `covid_pantau` (
  `id_pantau` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `tanggal_jam` datetime DEFAULT current_timestamp(),
  `suhu_tubuh` decimal(4,2) DEFAULT NULL,
  `batuk` varchar(20) DEFAULT NULL,
  `flu` varchar(20) DEFAULT NULL,
  `sesak_nafas` varchar(20) DEFAULT NULL,
  `keluhan_lain` varchar(255) DEFAULT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `covid_pemudik`
--

CREATE TABLE `covid_pemudik` (
  `id_terdata` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_datang` date NOT NULL,
  `asal_mudik` varchar(255) NOT NULL,
  `durasi_mudik` varchar(50) NOT NULL,
  `tujuan_mudik` varchar(255) NOT NULL,
  `keluhan_kesehatan` varchar(255) NOT NULL,
  `status_covid` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email_penduduk` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `wajib_pantau` varchar(20) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_syarat` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id`, `id_syarat`, `nama_dokumen`, `slug`, `file`, `kddesa`) VALUES
(7, 12, 1, 'RT', 'rt', 'download.jpg', 1),
(8, 12, 2, 'KK', 'kk', 'infografis-badai-sitokin-pada-covid-19-1.jpeg', 1),
(10, 13, 1, 'Surat Pengantar ', 'surat-pengantar', '4-aksi-nyata-menuju-indonesia-sehat.jpg', 1),
(11, 13, 2, 'FC KK', 'fc-kk', 'shutterstock_140702578.jpg', 1),
(12, 12, 3, 'KTP', 'ktp', 'Untitled.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `namadusun` varchar(255) NOT NULL,
  `kepala_dusun` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `namadusun`, `kepala_dusun`, `kddesa`) VALUES
(18, 'Dusun Cikandung', 'c', 1),
(20, 'A', 'Arie Rukmana', 2);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_album`, `judul`, `foto`, `kddesa`) VALUES
(3, 2, 'asik', 'ilustrasi-olahraga-lari_169.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darah`
--

CREATE TABLE `golongan_darah` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `golongan_darah`
--

INSERT INTO `golongan_darah` (`id_golongan`, `nama_golongan`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O'),
(5, 'A+'),
(6, 'A-'),
(7, 'B+'),
(8, 'B-'),
(9, 'AB+'),
(10, 'AB-'),
(11, 'O+'),
(12, 'O-'),
(13, 'TIDAK TAHU');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan`
--

CREATE TABLE `hubungan` (
  `id_hubungan` int(10) NOT NULL,
  `nama_hubungan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hubungan`
--

INSERT INTO `hubungan` (`id_hubungan`, `nama_hubungan`) VALUES
(1, 'KEPALA KELUARGA'),
(2, 'SUAMI'),
(3, 'ISTRI'),
(4, 'ANAK'),
(5, 'MENANTU'),
(6, 'CUCU'),
(7, 'ORANGTUA'),
(8, 'MERTUA'),
(9, 'FAMILI'),
(10, 'PEMBANTU'),
(11, 'LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` int(5) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `kode_desa` varchar(100) NOT NULL,
  `nama_kepala_desa` varchar(100) NOT NULL,
  `nip_kepala_desa` varchar(100) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `kode_kecamatan` varchar(100) NOT NULL,
  `nama_kepala_camat` varchar(100) NOT NULL,
  `nip_kepala_camat` varchar(100) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `kode_kabupaten` varchar(100) NOT NULL,
  `nama_propinsi` varchar(100) NOT NULL,
  `kode_propinsi` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(200) DEFAULT NULL,
  `email_desa` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `kantor_desa` varchar(250) DEFAULT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id`, `nama_desa`, `kode_desa`, `nama_kepala_desa`, `nip_kepala_desa`, `kode_pos`, `nama_kecamatan`, `kode_kecamatan`, `nama_kepala_camat`, `nip_kepala_camat`, `nama_kabupaten`, `kode_kabupaten`, `nama_propinsi`, `kode_propinsi`, `logo`, `map`, `alamat_kantor`, `email_desa`, `telepon`, `website`, `kantor_desa`, `kddesa`) VALUES
(1, 'Cikandung', '05', 'A', '12', '4', 'Cimalaka', '45', 'Ar', '154', 'Sumedang', '4', 'Jawa Barat', '6545', '', 'sumedang', 'sum', 'asep@gmail.com', '084', 'www.desa', '', 1),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kat_album`
--

CREATE TABLE `kat_album` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kat_album`
--

INSERT INTO `kat_album` (`id_kat`, `kategori`, `kddesa`) VALUES
(2, 'Album 2', 1),
(4, 'Album 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kat_artikel`
--

CREATE TABLE `kat_artikel` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kat_artikel`
--

INSERT INTO `kat_artikel` (`id_kat`, `kategori`, `kddesa`) VALUES
(7, 'An', 1),
(8, 'An', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kat_budaya`
--

CREATE TABLE `kat_budaya` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kat_budaya`
--

INSERT INTO `kat_budaya` (`id_kat`, `kategori`, `kddesa`) VALUES
(2, 'Album 1', 1),
(5, 'Aasd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kat_umkm`
--

CREATE TABLE `kat_umkm` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kat_umkm`
--

INSERT INTO `kat_umkm` (`id_kat`, `kategori`, `kddesa`) VALUES
(2, 'Kelompok Ternak', 1),
(4, 'as', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id_kk` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_kk` varchar(100) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id_kk`, `id`, `no_kk`, `kddesa`) VALUES
(1, 16, '45455454554545455', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_surat`
--

CREATE TABLE `log_surat` (
  `id_log` int(11) NOT NULL,
  `id_format_surat` int(3) NOT NULL,
  `id_permohonan` int(11) DEFAULT NULL,
  `id_pamong` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `file_surat` varchar(100) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_surat`
--

INSERT INTO `log_surat` (`id_log`, `id_format_surat`, `id_permohonan`, `id_pamong`, `id_user`, `tanggal`, `bulan`, `tahun`, `no_surat`, `file_surat`, `lampiran`) VALUES
(10, 1, 1, 0, 12, '2022-02-10', 'II', '2022', '1', NULL, NULL),
(13, 1, 2, 0, 12, '2022-02-11', 'II', '2022', '2', NULL, NULL),
(14, 1, 3, 0, 13, '2022-02-11', 'II', '2022', '3', NULL, NULL),
(15, 1, 3, 0, 13, '2022-02-11', 'II', '2022', '4', NULL, NULL),
(16, 5, 4, 0, 13, '2022-02-11', 'II', '2022', '1', NULL, NULL),
(17, 5, 4, 0, 13, '2022-02-11', 'II', '2022', '2', NULL, NULL),
(18, 1, 3, 0, 13, '2022-02-12', 'II', '2022', '5', NULL, NULL),
(19, 6, 5, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(20, 10, 6, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(21, 13, 7, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(22, 1, 8, 0, 12, '2022-02-12', 'II', '2022', '6', NULL, NULL),
(23, 11, 9, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(24, 12, 10, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(25, 9, 11, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(26, 9, 11, 0, 12, '2022-02-12', 'II', '2022', '2', NULL, NULL),
(27, 15, 12, 0, 12, '2022-02-12', 'II', '2022', '1', NULL, NULL),
(28, 15, 1, 0, 12, '2022-02-12', 'II', '2022', '2', NULL, NULL),
(29, 17, 2, 0, 12, '2022-02-13', 'II', '2022', '1', NULL, NULL),
(30, 17, 2, 0, 12, '2022-02-13', 'II', '2022', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(10) UNSIGNED NOT NULL,
  `nama_pekerjaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'BELUM/TIDAK BEKERJA'),
(2, 'MENGURUS RUMAH TANGGA'),
(3, 'PELAJAR/MAHASISWA'),
(4, 'PENSIUNAN'),
(5, 'PEGAWAI NEGERI SIPIL (PNS)'),
(6, 'TENTARA NASIONAL INDONESIA (TNI)'),
(7, 'KEPOLISIAN RI (POLRI)'),
(8, 'PERDAGANGAN'),
(9, 'PETANI/PEKEBUN'),
(10, 'PETERNAK'),
(11, 'NELAYAN/PERIKANAN'),
(12, 'INDUSTRI'),
(13, 'KONSTRUKSI'),
(14, 'TRANSPORTASI'),
(15, 'KARYAWAN SWASTA'),
(16, 'KARYAWAN BUMN'),
(17, 'KARYAWAN BUMD'),
(18, 'KARYAWAN HONORER'),
(19, 'BURUH HARIAN LEPAS'),
(20, 'BURUH TANI/PERKEBUNAN'),
(21, 'BURUH NELAYAN/PERIKANAN'),
(22, 'BURUH PETERNAKAN'),
(23, 'PEMBANTU RUMAH TANGGA'),
(24, 'TUKANG CUKUR'),
(25, 'TUKANG LISTRIK'),
(26, 'TUKANG BATU'),
(27, 'TUKANG KAYU'),
(28, 'TUKANG SOL SEPATU'),
(29, 'TUKANG LAS/PANDAI BESI'),
(30, 'TUKANG JAHIT'),
(31, 'TUKANG GIGI'),
(32, 'PENATA RIAS'),
(33, 'PENATA BUSANA'),
(34, 'PENATA RAMBUT'),
(35, 'MEKANIK'),
(36, 'SENIMAN'),
(37, 'TABIB'),
(38, 'PARAJI'),
(39, 'PERANCANG BUSANA'),
(40, 'PENTERJEMAH'),
(41, 'IMAM MASJID'),
(42, 'PENDETA'),
(43, 'PASTOR'),
(44, 'WARTAWAN'),
(45, 'USTADZ/MUBALIGH'),
(46, 'JURU MASAK'),
(47, 'PROMOTOR ACARA'),
(48, 'ANGGOTA DPR-RI'),
(49, 'ANGGOTA DPD'),
(50, 'ANGGOTA BPK'),
(51, 'PRESIDEN'),
(52, 'WAKIL PRESIDEN'),
(53, 'ANGGOTA MAHKAMAH KONSTITUSI'),
(54, 'ANGGOTA KABINET KEMENTERIAN'),
(55, 'DUTA BESAR'),
(56, 'GUBERNUR'),
(57, 'WAKIL GUBERNUR'),
(58, 'BUPATI'),
(59, 'WAKIL BUPATI'),
(60, 'WALIKOTA'),
(61, 'WAKIL WALIKOTA'),
(62, 'ANGGOTA DPRD PROVINSI'),
(63, 'ANGGOTA DPRD KABUPATEN/KOTA'),
(64, 'DOSEN'),
(65, 'GURU'),
(66, 'PILOT'),
(67, 'PENGACARA'),
(68, 'NOTARIS'),
(69, 'ARSITEK'),
(70, 'AKUNTAN'),
(71, 'KONSULTAN'),
(72, 'DOKTER'),
(73, 'BIDAN'),
(74, 'PERAWAT'),
(75, 'APOTEKER'),
(76, 'PSIKIATER/PSIKOLOG'),
(77, 'PENYIAR TELEVISI'),
(78, 'PENYIAR RADIO'),
(79, 'PELAUT'),
(80, 'PENELITI'),
(81, 'SOPIR'),
(82, 'PIALANG'),
(83, 'PARANORMAL'),
(84, 'PEDAGANG'),
(85, 'PERANGKAT DESA'),
(86, 'KEPALA DESA'),
(87, 'BIARAWATI'),
(88, 'WIRASWASTA'),
(89, 'LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `tgl_buat` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `id`, `nik`, `pin`, `tgl_buat`, `status`, `no_wa`, `kddesa`) VALUES
(2, 12, '3332323232', '96e79218965eb72c92a549dd5a330112', '2022-02-08', 1, '', 1),
(5, 13, '2222222222222222', 'a8f5f167f44f4964e6c998dee827110c', '2022-02-08', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` tinyint(3) NOT NULL,
  `nama_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'BELUM MASUK TK/KELOMPOK BERMAIN'),
(2, 'SEDANG TK/KELOMPOK BERMAIN'),
(3, 'TIDAK PERNAH SEKOLAH'),
(4, 'SEDANG SD/SEDERAJAT'),
(5, 'TIDAK TAMAT SD/SEDERAJAT'),
(6, 'SEDANG SLTP/SEDERAJAT'),
(7, 'SEDANG SLTA/SEDERAJAT'),
(8, 'SEDANG  D-1/SEDERAJAT'),
(9, 'SEDANG D-2/SEDERAJAT'),
(10, 'SEDANG D-3/SEDERAJAT'),
(11, 'SEDANG  S-1/SEDERAJAT'),
(12, 'SEDANG S-2/SEDERAJAT'),
(13, 'SEDANG S-3/SEDERAJAT'),
(14, 'SEDANG SLB A/SEDERAJAT'),
(15, 'SEDANG SLB B/SEDERAJAT'),
(16, 'SEDANG SLB C/SEDERAJAT'),
(17, 'TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB'),
(18, 'TIDAK SEDANG SEKOLAH');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_kk`
--

CREATE TABLE `pendidikan_kk` (
  `id_pendidikan_kk` int(10) UNSIGNED NOT NULL,
  `nama_pendidikan_kk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pendidikan_kk`
--

INSERT INTO `pendidikan_kk` (`id_pendidikan_kk`, `nama_pendidikan_kk`) VALUES
(1, 'TIDAK / BELUM SEKOLAH'),
(2, 'BELUM TAMAT SD/SEDERAJAT'),
(3, 'TAMAT SD / SEDERAJAT'),
(4, 'SLTP/SEDERAJAT'),
(5, 'SLTA / SEDERAJAT'),
(6, 'DIPLOMA I / II'),
(7, 'AKADEMI/ DIPLOMA III/S. MUDA'),
(8, 'DIPLOMA IV/ STRATA I'),
(9, 'STRATA II'),
(10, 'STRATA III');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `kk_level` tinyint(2) NOT NULL DEFAULT 0,
  `sex` tinyint(4) UNSIGNED DEFAULT NULL,
  `tempatlahir` varchar(100) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `id_dusun` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `id_rt` int(11) NOT NULL,
  `agama_id` int(1) DEFAULT NULL,
  `id_pendidikan_kk` int(1) DEFAULT NULL,
  `pendidikan_sedang_id` int(1) DEFAULT NULL,
  `id_pekerjaan` int(1) DEFAULT NULL,
  `status_kawin` tinyint(4) DEFAULT NULL,
  `warganegara_id` tinyint(4) NOT NULL DEFAULT 1,
  `dokumen_pasport` varchar(45) DEFAULT NULL,
  `dokumen_kitas` varchar(45) DEFAULT NULL,
  `ayah_nik` varchar(16) DEFAULT NULL,
  `ibu_nik` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `id_cluster` int(11) NOT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `alamat_sebelumnya` varchar(200) DEFAULT NULL,
  `alamat_sekarang` varchar(200) DEFAULT NULL,
  `status_dasar` tinyint(4) NOT NULL DEFAULT 1,
  `hamil` int(1) DEFAULT NULL,
  `cacat_id` int(11) DEFAULT NULL,
  `sakit_menahun_id` int(11) DEFAULT NULL,
  `akta_lahir` varchar(40) DEFAULT NULL,
  `akta_perkawinan` varchar(40) DEFAULT NULL,
  `tanggalperkawinan` date DEFAULT NULL,
  `akta_perceraian` varchar(40) DEFAULT NULL,
  `tanggalperceraian` date DEFAULT NULL,
  `cara_kb_id` tinyint(2) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `tanggal_akhir_paspor` date DEFAULT NULL,
  `ktp_el` tinyint(4) DEFAULT NULL,
  `status_rekam` tinyint(4) DEFAULT NULL,
  `waktu_lahir` varchar(5) DEFAULT NULL,
  `tempat_dilahirkan` tinyint(2) DEFAULT NULL,
  `jenis_kelahiran` tinyint(2) DEFAULT NULL,
  `kelahiran_anak_ke` tinyint(2) DEFAULT NULL,
  `penolong_kelahiran` tinyint(2) DEFAULT NULL,
  `berat_lahir` smallint(6) DEFAULT NULL,
  `panjang_lahir` varchar(10) DEFAULT NULL,
  `tag_id_card` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `nik`, `id_kk`, `kk_level`, `sex`, `tempatlahir`, `tanggallahir`, `id_dusun`, `id_rw`, `id_rt`, `agama_id`, `id_pendidikan_kk`, `pendidikan_sedang_id`, `id_pekerjaan`, `status_kawin`, `warganegara_id`, `dokumen_pasport`, `dokumen_kitas`, `ayah_nik`, `ibu_nik`, `nama_ayah`, `nama_ibu`, `foto`, `id_golongan`, `id_cluster`, `status`, `alamat_sebelumnya`, `alamat_sekarang`, `status_dasar`, `hamil`, `cacat_id`, `sakit_menahun_id`, `akta_lahir`, `akta_perkawinan`, `tanggalperkawinan`, `akta_perceraian`, `tanggalperceraian`, `cara_kb_id`, `telepon`, `tanggal_akhir_paspor`, `ktp_el`, `status_rekam`, `waktu_lahir`, `tempat_dilahirkan`, `jenis_kelahiran`, `kelahiran_anak_ke`, `penolong_kelahiran`, `berat_lahir`, `panjang_lahir`, `tag_id_card`, `created_at`, `created_by`, `updated_at`, `updated_by`, `email`, `kddesa`) VALUES
(12, 'Arie Rukmana', '3332323232', 1, 2, 1, 'c', '2013-02-14', 18, 13, 7, 1, 1, 15, 16, 1, 1, '', '', '1', '2', 'A', 'B', '', 2, 0, 1, '', '', 1, NULL, 3, 7, '1222222222222221', '', '0000-00-00', '', '0000-00-00', NULL, '', '0000-00-00', NULL, NULL, '16:15', 1, 1, 1, 1, 0, '', NULL, '2022-02-06 09:11:45', 0, '2022-02-06 09:11:45', NULL, '', 1),
(13, 'mimii', '2222222222222222', 1, 4, 2, 'sds', '2004-02-09', 18, 13, 7, 2, 1, 16, 11, 2, 1, '', '', '', '', '', '', '', 9, 0, 1, '', '', 1, 0, 5, 8, '', '', '0000-00-00', '', '0000-00-00', NULL, '02254544545', '0000-00-00', NULL, NULL, '16:15', 3, 2, 3, 2, 0, '', NULL, '2022-02-06 09:13:18', 0, '2022-02-06 09:13:18', NULL, '', 1),
(14, 'mana', '1234567891234567', 0, 1, 2, 'sds', '2004-02-09', 18, 13, 7, 2, 1, 16, 11, 2, 1, '', '', '', '', '', '', '', 9, 0, 1, '', '', 1, 0, 5, 8, '', '', '0000-00-00', '', '0000-00-00', NULL, '02254544545', '0000-00-00', NULL, NULL, '16:15', 3, 2, 3, 2, 0, '', NULL, '2022-02-06 09:13:18', 0, '2022-02-06 09:13:18', NULL, '', 2),
(16, 'asdsadasdas', '2222222222221245', 1, 1, 1, 'Suemdnag', '1994-02-08', 18, 13, 7, 1, 2, 3, 2, 1, 1, '', '', '1222222222222222', '1333333333333333', '', '', '', 1, 0, 1, '', '1', 1, 0, 1, 1, '', '', '0000-00-00', '', '0000-00-00', NULL, '', '0000-00-00', NULL, NULL, '15:30', 0, 0, 0, 0, 0, '', NULL, '2022-02-16 08:18:50', 0, '2022-02-16 08:18:50', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_peserta` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_surat`
--

CREATE TABLE `permohonan_surat` (
  `id_permohonan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date NOT NULL DEFAULT current_timestamp(),
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permohonan_surat`
--

INSERT INTO `permohonan_surat` (`id_permohonan`, `id`, `id_surat`, `status`, `created`, `updated`, `kddesa`) VALUES
(1, 12, 15, 3, '2022-02-12', '2022-02-12', 1),
(2, 12, 17, 4, '2022-02-13', '2022-02-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesankeluar`
--

CREATE TABLE `pesankeluar` (
  `id_pesankeluar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_kirim` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanmasuk`
--

CREATE TABLE `pesanmasuk` (
  `id_pesan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_kirim` date NOT NULL DEFAULT current_timestamp(),
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanmasuk`
--

INSERT INTO `pesanmasuk` (`id_pesan`, `id`, `pesan`, `status`, `tgl_kirim`, `kddesa`) VALUES
(7, 13, 'kkjkk', 1, '2022-02-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(11) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `kepala_rt` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id_rt`, `rt`, `id_dusun`, `id_rw`, `kepala_rt`, `kddesa`) VALUES
(6, '01', 18, 13, '', 1),
(7, '02', 18, 13, '', 1),
(8, '03', 18, 13, '', 1),
(9, 'sa', 18, 20, 'mimii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE `rw` (
  `id_rw` int(11) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `kepala_rw` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`id_rw`, `rw`, `id_dusun`, `kepala_rw`, `kddesa`) VALUES
(13, '001', 18, 'mimii', 1),
(14, '002', 18, '', 1),
(15, '003', 18, '', 0),
(16, '004', 18, '', 0),
(20, '0021', 20, 'mimii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting_syarat`
--

CREATE TABLE `setting_syarat` (
  `id_setting` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_syarat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_syarat`
--

INSERT INTO `setting_syarat` (`id_setting`, `id_surat`, `id_syarat`) VALUES
(109, 2, 10),
(110, 2, 11),
(111, 2, 12),
(112, 3, 4),
(113, 3, 5),
(123, 5, 1),
(124, 5, 2),
(127, 1, 1),
(128, 1, 2),
(129, 6, 1),
(130, 6, 2),
(131, 10, 1),
(132, 10, 2),
(133, 10, 3),
(134, 13, 1),
(135, 13, 2),
(136, 11, 1),
(137, 11, 2),
(138, 12, 3),
(139, 9, 1),
(140, 15, 1),
(141, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting_web`
--

CREATE TABLE `setting_web` (
  `id_setting` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_web`
--

INSERT INTO `setting_web` (`id_setting`, `nama`, `file`, `kddesa`) VALUES
(12, 'Kepala Desa', 'YmFkYWktc2l0b2tpbi0xLmpwZw==', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `tipe` int(11) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `wa` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `yt` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `telegram` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id`, `fb`, `wa`, `ig`, `yt`, `twitter`, `telegram`, `kddesa`) VALUES
(7, 'www.facebook.com/', '628946464664646', 'www.instagram.com/', 'www.youtube.com/', 'www.twitter.com/', 'www.telegram.com/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_akta`
--

CREATE TABLE `surat_akta` (
  `id_akta` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `tempatlahiranak` varchar(100) NOT NULL,
  `tgl_anak` date NOT NULL,
  `hari_lahir` varchar(255) NOT NULL,
  `alamat_anak` varchar(255) NOT NULL,
  `nama_ayahanak` varchar(100) NOT NULL,
  `nama_ibuanak` varchar(100) NOT NULL,
  `alamat_orangtua` text NOT NULL,
  `jkanak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_akta`
--

INSERT INTO `surat_akta` (`id_akta`, `id_permohonan`, `id_surat`, `id`, `nama_anak`, `tempatlahiranak`, `tgl_anak`, `hari_lahir`, `alamat_anak`, `nama_ayahanak`, `nama_ibuanak`, `alamat_orangtua`, `jkanak`) VALUES
(1, 2, 17, 12, 'Arie', 'Sumedang', '2022-02-23', 'Senin', 'Sumedanng', 'Aruk c', 'Rukmi', 'Sumedang', 'Laki - Laki');

-- --------------------------------------------------------

--
-- Table structure for table `surat_domisili_usaha`
--

CREATE TABLE `surat_domisili_usaha` (
  `id_domisili` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_domisili_usaha`
--

INSERT INTO `surat_domisili_usaha` (`id_domisili`, `id_permohonan`, `id_surat`, `id`, `nama_usaha`, `alamat_usaha`) VALUES
(2, 1, 15, 12, 'Usaha Ikan Lele', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `surat_format`
--

CREATE TABLE `surat_format` (
  `id_format_surat` int(11) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `url_surat` varchar(100) NOT NULL,
  `url_kades` varchar(50) NOT NULL,
  `url_admin` varchar(255) NOT NULL,
  `url_download` varchar(255) NOT NULL,
  `kode_surat` varchar(10) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `kunci` tinyint(1) NOT NULL DEFAULT 0,
  `favorit` tinyint(1) NOT NULL DEFAULT 0,
  `jenis` tinyint(2) NOT NULL DEFAULT 2,
  `mandiri` tinyint(1) DEFAULT 0,
  `masa_berlaku` int(3) DEFAULT 1,
  `satuan_masa_berlaku` varchar(15) DEFAULT 'M',
  `qr_code` tinyint(1) NOT NULL DEFAULT 0,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_format`
--

INSERT INTO `surat_format` (`id_format_surat`, `nama_surat`, `url_surat`, `url_kades`, `url_admin`, `url_download`, `kode_surat`, `lampiran`, `kunci`, `favorit`, `jenis`, `mandiri`, `masa_berlaku`, `satuan_masa_berlaku`, `qr_code`, `kddesa`) VALUES
(1, 'Keterangan Pengantar', 'surat_ket_pengantar', 'view_surat_ket_pengantar', 'admin_surat_ket_pengantar', 'download_surat_ket_pengantar', 'S-01', NULL, 0, 0, 1, 1, 1, 'DAY', 0, 0),
(2, 'Keterangan Penduduk', 'surat_ket_penduduk', 'view_surat_ket_penduduk', 'admin_surat_ket_penduduk', 'download_surat_ket_penduduk', 'S-02', NULL, 0, 0, 1, 1, 1, 'MONTH', 0, 0),
(3, 'Biodata Penduduk', 'surat_bio_penduduk', 'view_surat_bio_penduduk', 'admin_surat_bio_penduduk', 'download_surat_bio_penduduk', 'S-03', 'f-1.01.php', 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(4, 'Keterangan Pindah Penduduk', 'surat_ket_pindah_penduduk', 'view_surat_ket_pindah_penduduk', 'admin_surat_ket_pindah_penduduk', 'download_surat_ket_pindah_penduduk', 'S-04', 'f-1.08.php,f-1.25.php', 0, 0, 1, 1, 1, 'MONTH', 0, 0),
(5, 'Keterangan Jual Beli', 'surat_ket_jual_beli', 'view_surat_ket_jual_beli', 'admin_surat_ket_jual_beli', 'download_surat_ket_jual_beli', 'S-05', NULL, 0, 0, 1, 1, 1, 'MONTH', 0, 0),
(6, 'Pengantar Surat Keterangan Catatan Kepolisian', 'surat_ket_catatan_kriminal', 'view_surat_ket_catatan_kriminal', 'admin_surat_ket_catatan_kriminal', 'download_surat_ket_catatan_kriminal', 'S-06', NULL, 0, 0, 1, 1, 1, 'WEEK', 0, 0),
(7, 'Keterangan KTP dalam Proses', 'surat_ket_ktp_dalam_proses', 'view_surat_ket_ktp_dalam_proses', 'admin_surat_ket_ktp_dalam_proses', 'download_surat_ket_ktp_dalam_proses', 'S-08', NULL, 0, 0, 1, 0, 1, 'WEEK', 0, 0),
(8, 'Keterangan Beda Identitas', 'surat_ket_beda_nama', 'view_surat_ket_beda_nama', 'admin_surat_ket_beda_nama', 'download_surat_ket_beda_nama', 'S-09', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(9, 'Keterangan Bepergian / Jalan', 'surat_jalan', 'view_surat_jalan', 'admin_surat_jalan', 'download_surat_jalan', 'S-10', NULL, 0, 0, 1, 1, 1, 'WEEK', 0, 0),
(10, 'Keterangan Kurang Mampu', 'surat_ket_kurang_mampu', 'view_surat_ket_kurang_mampu', 'admin_surat_ket_kurang_mampu', 'download_surat_ket_kurang_mampu', 'S-11', NULL, 0, 0, 1, 1, 1, 'MONTH', 0, 0),
(11, 'Pengantar Izin Keramaian', 'surat_izin_keramaian', 'view_surat_izin_keramaian', 'admin_surat_izin_keramaian', 'download_surat_izin_keramaian', 'S-12', NULL, 0, 0, 1, 1, 1, 'MONTH', 0, 0),
(12, 'Pengantar Laporan Kehilangan', 'surat_ket_kehilangan', 'view_surat_ket_kehilangan', 'admin_surat_ket_kehilangan', 'download_surat_ket_kehilangan', 'S-13', NULL, 0, 0, 1, 1, 1, 'WEEK', 0, 0),
(13, 'Keterangan Usaha', 'surat_ket_usaha', 'view_surat_ket_usaha', 'admin_surat_ket_usaha', 'download_surat_ket_usaha', 'S-14', NULL, 0, 0, 1, 1, 1, 'MONTH', 0, 0),
(14, 'Keterangan JAMKESOS', 'surat_ket_jamkesos', 'view_surat_ket_jamkesos', 'admin_surat_ket_jamkesos', 'download_surat_ket_jamkesos', 'S-15', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(15, 'Keterangan Domisili Usaha', 'surat_ket_domisili_usaha', 'view_surat_ket_domisili_usaha', 'admin_surat_ket_domisili_usaha', 'download_surat_ket_domisili_usaha', 'S-16', NULL, 0, 0, 1, 1, 1, 'WEEK', 0, 0),
(16, 'Keterangan Kelahiran', 'surat_ket_kelahiran', 'view_surat_ket_kelahiran', 'admin_surat_ket_kelahiran', 'download_surat_ket_kelahiran', 'S-17', 'f-kelahiran.php', 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(17, 'Permohonan Akta Lahir', 'surat_permohonan_akta', 'view_surat_permohonan_akta', 'admin_surat_permohonan_akta', 'download_surat_permohonan_akta', 'S-18', NULL, 0, 0, 1, 1, 1, 'DAY', 0, 0),
(18, 'Pernyataan Belum Memiliki Akta Lahir', 'surat_pernyataan_akta', 'view_surat_pernyataan_akta', 'admin_surat_pernyataan_akta', 'download_surat_pernyataan_akta', 'S-19', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(19, 'Permohonan Duplikat Kelahiran', 'surat_permohonan_duplikat_kelahiran', 'view_surat_permohonan_duplikat_kelahiran', 'admin_surat_permohonan_duplikat_kelahiran', 'download_surat_permohonan_duplikat_kelahiran', 'S-20', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(20, 'Keterangan Kematian', 'surat_ket_kematian', 'view_surat_ket_kematian', 'admin_surat_ket_kematian', 'download_surat_ket_kematian', 'S-21', 'f-2.29.php', 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(21, 'Keterangan Lahir Mati', 'surat_ket_lahir_mati', 'view_surat_ket_lahir_mati', 'admin_surat_ket_lahir_mati', 'download_surat_ket_lahir_mati', 'S-22', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(22, 'Keterangan Untuk Nikah (N-1 s/d N-7)', 'surat_ket_nikah', 'view_surat_ket_nikah', 'admin_surat_ket_nikah', 'download_surat_ket_nikah', 'S-23', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(23, 'Keterangan Pergi Kawin', 'surat_ket_pergi_kawin', 'view_surat_ket_pergi_kawin', 'admin_surat_ket_pergi_kawin', 'download_surat_ket_pergi_kawin', 'S-30', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(24, 'Keterangan Wali Hakim', 'surat_ket_wali_hakim', 'view_surat_ket_wali_hakim', 'admin_surat_ket_wali_hakim', 'download_surat_ket_wali_hakim', 'S-32', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(25, 'Permohonan Duplikat Surat Nikah', 'surat_permohonan_duplikat_surat_nikah', 'view_surat_permohonan_duplikat_surat_nikah\n\n', '', '', 'S-33', NULL, 0, 0, 1, 0, 1, 'MONTH', 0, 0),
(26, 'Permohonan Cerai', 'surat_permohonan_cerai', '0', '', '', 'S-34', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(27, 'Keterangan Pengantar Rujuk/Cerai', 'surat_ket_rujuk_cerai', '0', '', '', 'S-35', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(28, 'Permohonan Kartu Keluarga', 'surat_permohonan_kartu_keluarga', '0', '', '', 'S-36', 'f-1.15.php,f-1.01.php', 0, 0, 1, 0, 1, 'M', 0, 0),
(29, 'Domisili Usaha Non-Warga', 'surat_domisili_usaha_non_warga', '0', '', '', 'S-37', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(30, 'Keterangan Beda Identitas KIS', 'surat_ket_beda_identitas_kis', '0', '', '', 'S-38', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(32, 'Pernyataan Penguasaan Fisik Bidang Tanah (SPORADIK)', 'surat_sporadik', '0', '', '', 'S-40', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(33, 'Permohonan Perubahan Kartu Keluarga', 'surat_permohonan_perubahan_kartu_keluarga', '0', '', '', 'S-41', 'f-1.16.php,f-1.01.php', 0, 0, 1, 0, 1, 'M', 0, 0),
(34, 'Non Warga', 'surat_non_warga', '0', '', '', '', NULL, 0, 0, 2, 0, 1, 'M', 0, 0),
(35, 'Keterangan Domisili', 'surat_ket_domisili', '0', '', '', 'S-41', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(36, 'Keterangan Penghasilan Orangtua', 'surat_ket_penghasilan_orangtua', '0', '', '', 'S-42', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(37, 'Pengantar Permohonan Penerbitan Buku Pas Lintas', 'surat_permohonan_penerbitan_buku_pas_lintas', '0', '', '', 'S-43', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(38, 'Keterangan Penghasilan Ayah', 'surat_ket_penghasilan_ayah', '0', '', '', 'S-44', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(39, 'Keterangan Penghasilan Ibu', 'surat_ket_penghasilan_ibu', '0', '', '', 'S-45', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(40, 'Perintah Perjalanan Dinas', 'surat_perintah_perjalanan_dinas', '0', '', '', 'S-46', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(41, 'Kuasa', 'surat_kuasa', '0', '', '', 'S-47', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(42, 'Keterangan Kepemilikan Kendaraan', 'surat_ket_kepemilikan_kendaraan', '0', '', '', 'S-48', NULL, 0, 0, 1, 0, 1, 'M', 0, 0),
(43, 'Keterangan Kepemilikan Tanah', 'surat_ket_kepemilikan_tanah', '0', '', '', 'S-49', NULL, 0, 0, 1, 1, 1, 'M', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_izin_keramaian`
--

CREATE TABLE `surat_izin_keramaian` (
  `id_keramaian` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `jenis_acara` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_jalan` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jualbeli`
--

CREATE TABLE `surat_jualbeli` (
  `id_jualbeli` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `rincian_barang` text NOT NULL,
  `nik_pembeli` varchar(20) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `tgllahirpembeli` date NOT NULL,
  `tempatlahirpembeli` varchar(100) NOT NULL,
  `jkpembeli` varchar(20) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `pekerjaan_pembeli` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kehilangan`
--

CREATE TABLE `surat_kehilangan` (
  `id_kehilangan` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `rincian_barang` varchar(255) NOT NULL,
  `kejadian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kriminal`
--

CREATE TABLE `surat_kriminal` (
  `id_kriminal` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar`
--

CREATE TABLE `surat_pengantar` (
  `id_pengantar` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tidakmampu`
--

CREATE TABLE `surat_tidakmampu` (
  `id_tidakmampu` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_usaha`
--

CREATE TABLE `surat_usaha` (
  `id_usaha` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `syarat_surat`
--

CREATE TABLE `syarat_surat` (
  `ref_syarat_id` int(1) UNSIGNED NOT NULL,
  `ref_syarat_nama` varchar(255) NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `syarat_surat`
--

INSERT INTO `syarat_surat` (`ref_syarat_id`, `ref_syarat_nama`, `kddesa`) VALUES
(1, 'Surat Pengantar RT/RW a', 1),
(2, 'Fotokopi KK', 1),
(3, 'Fotokopi KTP', 1),
(4, 'Fotokopi Surat Nikah/Akta Nikah/Kutipan Akta Perkawinan', 1),
(5, 'Fotokopi Akta Kelahiran/Surat Kelahiran bagi keluarga yang mempunyai anak', 1),
(6, 'Surat Pindah Datang dari tempat asal', 1),
(7, 'Surat Keterangan Kematian dari Rumah Sakit, Rumah Bersalin Puskesmas, atau visum Dokter', 1),
(8, 'Surat Keterangan Cerai', 1),
(9, 'Fotokopi Ijasah Terakhir', 1),
(10, 'SK. PNS/KARIP/SK. TNI – POLRI', 1),
(11, 'Surat Keterangan Kematian dari Kepala Desa/Kelurahan', 1),
(12, 'Surat imigrasi / STMD (Surat Tanda Melapor Diri)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `text_berjalan`
--

CREATE TABLE `text_berjalan` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_kades`
--

CREATE TABLE `tweb_kades` (
  `id_kades` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `status` int(11) NOT NULL,
  `kddesa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tweb_kades`
--

INSERT INTO `tweb_kades` (`id_kades`, `username`, `password`, `nama`, `nik`, `status`, `kddesa`) VALUES
(3, 'kades1', '588ed68adce0b03cb7c0a9b189012789', 'asdsadasdas', '2', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_users`
--

CREATE TABLE `tweb_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `status` int(11) NOT NULL,
  `kddesa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tweb_users`
--

INSERT INTO `tweb_users` (`id_users`, `username`, `password`, `nama`, `nik`, `status`, `kddesa`) VALUES
(1, 'aku', '24c9e15e52afc47c225b757e7bee1f9d', 'Admin Desa 1', '3', 1, '1'),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'Admin Desa ', '3222212121212', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kddesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `nama_umkm`, `kode`, `id_kat`, `id`, `deskripsi`, `kddesa`) VALUES
(4, 'A', 'A', 2, 12, 'asd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `allsetting`
--
ALTER TABLE `allsetting`
  ADD PRIMARY KEY (`kddesa`);

--
-- Indexes for table `anggotaumkm`
--
ALTER TABLE `anggotaumkm`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_umkm` (`id_umkm`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `aparat`
--
ALTER TABLE `aparat`
  ADD PRIMARY KEY (`pamong_id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `budaya`
--
ALTER TABLE `budaya`
  ADD PRIMARY KEY (`id_budaya`);

--
-- Indexes for table `covid_pantau`
--
ALTER TABLE `covid_pantau`
  ADD PRIMARY KEY (`id_pantau`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `covid_pemudik`
--
ALTER TABLE `covid_pemudik`
  ADD PRIMARY KEY (`id_terdata`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `golongan_darah`
--
ALTER TABLE `golongan_darah`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `hubungan`
--
ALTER TABLE `hubungan`
  ADD PRIMARY KEY (`id_hubungan`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kat_album`
--
ALTER TABLE `kat_album`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kat_artikel`
--
ALTER TABLE `kat_artikel`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kat_budaya`
--
ALTER TABLE `kat_budaya`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kat_umkm`
--
ALTER TABLE `kat_umkm`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `log_surat`
--
ALTER TABLE `log_surat`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pendidikan_kk`
--
ALTER TABLE `pendidikan_kk`
  ADD PRIMARY KEY (`id_pendidikan_kk`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`),
  ADD KEY `id` (`id`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `permohonan_surat`
--
ALTER TABLE `permohonan_surat`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `pesankeluar`
--
ALTER TABLE `pesankeluar`
  ADD PRIMARY KEY (`id_pesankeluar`);

--
-- Indexes for table `pesanmasuk`
--
ALTER TABLE `pesanmasuk`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_dusun` (`id_dusun`,`id_rw`),
  ADD KEY `id_rw` (`id_rw`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id_rw`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `setting_syarat`
--
ALTER TABLE `setting_syarat`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_akta`
--
ALTER TABLE `surat_akta`
  ADD PRIMARY KEY (`id_akta`);

--
-- Indexes for table `surat_domisili_usaha`
--
ALTER TABLE `surat_domisili_usaha`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `surat_format`
--
ALTER TABLE `surat_format`
  ADD PRIMARY KEY (`id_format_surat`),
  ADD UNIQUE KEY `url_surat` (`url_surat`);

--
-- Indexes for table `surat_izin_keramaian`
--
ALTER TABLE `surat_izin_keramaian`
  ADD PRIMARY KEY (`id_keramaian`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indexes for table `surat_jualbeli`
--
ALTER TABLE `surat_jualbeli`
  ADD PRIMARY KEY (`id_jualbeli`);

--
-- Indexes for table `surat_kehilangan`
--
ALTER TABLE `surat_kehilangan`
  ADD PRIMARY KEY (`id_kehilangan`);

--
-- Indexes for table `surat_kriminal`
--
ALTER TABLE `surat_kriminal`
  ADD PRIMARY KEY (`id_kriminal`);

--
-- Indexes for table `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD PRIMARY KEY (`id_pengantar`);

--
-- Indexes for table `surat_tidakmampu`
--
ALTER TABLE `surat_tidakmampu`
  ADD PRIMARY KEY (`id_tidakmampu`);

--
-- Indexes for table `surat_usaha`
--
ALTER TABLE `surat_usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indexes for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  ADD PRIMARY KEY (`ref_syarat_id`);

--
-- Indexes for table `text_berjalan`
--
ALTER TABLE `text_berjalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_kades`
--
ALTER TABLE `tweb_kades`
  ADD PRIMARY KEY (`id_kades`);

--
-- Indexes for table `tweb_users`
--
ALTER TABLE `tweb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `agama_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `allsetting`
--
ALTER TABLE `allsetting`
  MODIFY `kddesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggotaumkm`
--
ALTER TABLE `anggotaumkm`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aparat`
--
ALTER TABLE `aparat`
  MODIFY `pamong_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `budaya`
--
ALTER TABLE `budaya`
  MODIFY `id_budaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `covid_pantau`
--
ALTER TABLE `covid_pantau`
  MODIFY `id_pantau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `covid_pemudik`
--
ALTER TABLE `covid_pemudik`
  MODIFY `id_terdata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `golongan_darah`
--
ALTER TABLE `golongan_darah`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kat_album`
--
ALTER TABLE `kat_album`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kat_artikel`
--
ALTER TABLE `kat_artikel`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kat_budaya`
--
ALTER TABLE `kat_budaya`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kat_umkm`
--
ALTER TABLE `kat_umkm`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_surat`
--
ALTER TABLE `log_surat`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pendidikan_kk`
--
ALTER TABLE `pendidikan_kk`
  MODIFY `id_pendidikan_kk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pesankeluar`
--
ALTER TABLE `pesankeluar`
  MODIFY `id_pesankeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanmasuk`
--
ALTER TABLE `pesanmasuk`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rw`
--
ALTER TABLE `rw`
  MODIFY `id_rw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `setting_syarat`
--
ALTER TABLE `setting_syarat`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_akta`
--
ALTER TABLE `surat_akta`
  MODIFY `id_akta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_domisili_usaha`
--
ALTER TABLE `surat_domisili_usaha`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_format`
--
ALTER TABLE `surat_format`
  MODIFY `id_format_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `surat_izin_keramaian`
--
ALTER TABLE `surat_izin_keramaian`
  MODIFY `id_keramaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_jualbeli`
--
ALTER TABLE `surat_jualbeli`
  MODIFY `id_jualbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_kehilangan`
--
ALTER TABLE `surat_kehilangan`
  MODIFY `id_kehilangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_kriminal`
--
ALTER TABLE `surat_kriminal`
  MODIFY `id_kriminal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  MODIFY `id_pengantar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_tidakmampu`
--
ALTER TABLE `surat_tidakmampu`
  MODIFY `id_tidakmampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_usaha`
--
ALTER TABLE `surat_usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  MODIFY `ref_syarat_id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `text_berjalan`
--
ALTER TABLE `text_berjalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tweb_kades`
--
ALTER TABLE `tweb_kades`
  MODIFY `id_kades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tweb_users`
--
ALTER TABLE `tweb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggotaumkm`
--
ALTER TABLE `anggotaumkm`
  ADD CONSTRAINT `anggotaumkm_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_umkm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggotaumkm_ibfk_2` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `covid_pantau`
--
ALTER TABLE `covid_pantau`
  ADD CONSTRAINT `covid_pantau_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `covid_pemudik`
--
ALTER TABLE `covid_pemudik`
  ADD CONSTRAINT `covid_pemudik_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`);

--
-- Constraints for table `penerima`
--
ALTER TABLE `penerima`
  ADD CONSTRAINT `penerima_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rt_ibfk_2` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rt_ibfk_3` FOREIGN KEY (`id_rw`) REFERENCES `rw` (`id_rw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rw`
--
ALTER TABLE `rw`
  ADD CONSTRAINT `rw_ibfk_2` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
