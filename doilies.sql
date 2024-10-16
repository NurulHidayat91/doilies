-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2024 pada 04.37
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doilies`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bentuk`
--

CREATE TABLE `bentuk` (
  `id_bentuk` int(11) NOT NULL,
  `bentuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bentuk`
--

INSERT INTO `bentuk` (`id_bentuk`, `bentuk`) VALUES
(1, 'OVAL'),
(2, 'RECTANGEL'),
(3, 'SQUARE'),
(4, 'ROUND');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `nohp`, `alamat`, `created`) VALUES
(1, 'Ahmad Rivai', '-', '-', '2023-09-09 03:35:50'),
(2, 'Bareq Amazon', '-', '-', '2023-09-09 03:36:33'),
(3, 'Batavia Box', '-', '-', '2023-09-09 03:36:51'),
(4, 'Buffer Stock', '-', '-', '2023-09-09 03:37:06'),
(5, 'Cabang Bandung', '-', '-', '2023-09-09 03:37:26'),
(6, 'Cabang Medan', '-', '-', '2023-09-09 03:37:37'),
(7, 'Cabang Semarang', '-', '-', '2023-09-09 03:37:51'),
(8, 'Friendly Food', '-', '-', '2023-09-09 03:38:03'),
(9, 'Fuad Dhasty', '-', '-', '2023-09-09 03:38:16'),
(10, 'Huttof', '-', '-', '2023-09-09 03:38:26'),
(11, 'Jannalious', '-', '-', '2023-09-09 03:47:28'),
(12, 'Liana', '-', '-', '2023-09-09 03:47:48'),
(13, 'Lokal & Stock', '-', '-', '2023-09-09 03:48:05'),
(14, 'Majed', '-', '-', '2023-09-09 03:48:20'),
(15, 'National Medical', '-', '-', '2023-09-09 03:48:31'),
(16, 'Tobaku', '-', '-', '2023-09-09 03:48:41'),
(17, 'Toko Cians', '-', '-', '2023-09-09 03:48:48'),
(18, 'SAFCO', '-', '-', '2023-12-29 04:57:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'PPIC'),
(2, 'PRODUKSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtime`
--

CREATE TABLE `downtime` (
  `id_downtime` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `downtime`
--

INSERT INTO `downtime` (`id_downtime`, `kode`, `keterangan`) VALUES
(1, 'A', 'Ganti Ukuran'),
(2, 'B', 'Naik Roll'),
(3, 'C', 'Ganti Teplon'),
(4, 'D', 'Setting Pisau Pemotong'),
(5, 'E', 'Setting Pisau Teplon'),
(6, 'F', 'Ganti Pisau Teplon'),
(7, 'G', 'Trim Menggulung'),
(8, 'H', 'Kertas Nyangkut'),
(9, 'I', 'Perbaikan Mesin'),
(10, 'J', 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grade`
--

INSERT INTO `grade` (`id_grade`, `grade`) VALUES
(1, 'MG'),
(2, 'Al Foil'),
(3, 'SK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gsm`
--

CREATE TABLE `gsm` (
  `id_gsm` int(11) NOT NULL,
  `gsm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gsm`
--

INSERT INTO `gsm` (`id_gsm`, `gsm`) VALUES
(1, '37'),
(2, '38'),
(3, '39'),
(4, '40'),
(5, '45'),
(6, '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'OPERATOR'),
(2, 'LEADER'),
(3, 'KEPALA REGU'),
(4, 'ADMIN'),
(5, 'STAFF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `jam`) VALUES
(1, '08.00'),
(2, '09.00'),
(4, '10.00'),
(5, '11.00'),
(6, '12.00'),
(7, '13.00'),
(8, '14.00'),
(9, '15.00'),
(10, '16.00'),
(11, '17.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_jenis_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_jenis_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Potongan'),
(2, 'MC Geprek'),
(3, 'Sortir polybag'),
(4, 'Mesin Sealer'),
(5, 'Mesin Oven'),
(6, 'Tempel Sticker'),
(7, 'Packing Box');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembar_pack`
--

CREATE TABLE `lembar_pack` (
  `id_lembar` int(11) NOT NULL,
  `lembar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembar_pack`
--

INSERT INTO `lembar_pack` (`id_lembar`, `lembar`) VALUES
(1, '100'),
(2, '250'),
(3, '35'),
(4, '40'),
(5, '55'),
(6, '200'),
(7, '350'),
(8, '400');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL,
  `kode_mesin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `kode_mesin`) VALUES
(1, '0.1'),
(2, '0.2'),
(3, '0.3'),
(5, '0.4'),
(6, '0.5'),
(7, '0.6'),
(8, '0.7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin_geprek`
--

CREATE TABLE `mesin_geprek` (
  `id_mesin_geprek` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `operator2` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin_geprek`
--

INSERT INTO `mesin_geprek` (`id_mesin_geprek`, `no_wo`, `id_user`, `operator2`, `id_customer`, `tanggal`, `id_mesin`, `id_waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `persentase`, `created`, `updated`) VALUES
(1, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-28', 5, 1, 'NS', 13, 2, 24, 2, '136', '104', '0', 'MESIN GEPREK BESAR NO. 4.    13 MENIT SETTING MESIN', '76', '2023-12-29 02:05:40', '2023-12-29 03:45:17'),
(2, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-29', 5, 2, 'NS', 13, 2, 24, 2, '136', '136', '0', 'MESIN GEPREK BESAR NO. 4', '100', '2023-12-29 02:06:38', '2023-12-29 03:45:13'),
(3, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-29', 5, 3, 'NS', 13, 2, 24, 2, '136', '136', '0', 'MESIN GEPREK BESAR NO. 4', '100', '2023-12-29 02:08:11', '2023-12-29 03:45:08'),
(4, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-29', 5, 4, 'NS', 13, 2, 24, 2, '136', '136', '0', 'MESIN GEPREK BESAR NO. 4', '100', '2023-12-29 02:17:03', '2023-12-29 03:45:04'),
(5, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-29', 5, 5, 'NS', 13, 2, 24, 2, '136', '136', '0', 'MESIN GEPREK BESAR NO. 4', '100', '2023-12-29 02:17:03', '2023-12-29 03:44:59'),
(6, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-29', 5, 6, 'NS', 13, 2, 24, 2, '136', '136', '0', 'MESIN GEPREK BESAR NO. 4', '100', '2023-12-29 02:17:22', '2023-12-29 03:44:55'),
(7, 'D23-00753', 32, 'RIAN ANDRIANI', 14, '2023-12-29', 5, 7, 'NS', 13, 2, 24, 2, '136', '80', '2', 'MESIN GEPREK BESAR NO. 4 24 MENIT SUPPLY BAHAN. BROKE WO D23-00753.', '59', '2023-12-29 02:19:57', '2023-12-29 03:44:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin_oven`
--

CREATE TABLE `mesin_oven` (
  `id_mesin_oven` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `no_mesin` varchar(5) NOT NULL,
  `speed` varchar(5) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin_sealer`
--

CREATE TABLE `mesin_sealer` (
  `id_mesin_sealer` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `no_mesin` varchar(5) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin_sealer`
--

INSERT INTO `mesin_sealer` (`id_mesin_sealer`, `no_wo`, `id_user`, `id_customer`, `tanggal`, `id_waktu`, `no_mesin`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `persentase`, `created`, `updated`) VALUES
(1, 'D23-00753', 28, 14, '2023-12-29', 1, '0.4', 'NS', 13, 2, 24, 2, '350', '350', '0', 'SILER 1 SISI', '100', '2023-12-29 02:34:11', '0000-00-00 00:00:00'),
(2, 'D23-00753', 28, 14, '2023-12-29', 2, '0.4', 'NS', 13, 2, 24, 2, '169', '169', '0', 'SILER 1 SISI. 30 MENIT', '100', '2023-12-29 02:35:19', '2023-12-29 02:37:37'),
(3, 'D23-00866', 28, 18, '2023-12-29', 2, '0.4', 'NS', 13, 2, 22, 2, '181', '181', '0', 'SILER 1 SISI. 30 MENIT', '100', '2023-12-29 02:37:21', '2023-12-29 02:37:48'),
(4, 'D23-00865', 28, 18, '2023-12-29', 3, '0.4', 'NS', 13, 2, 22, 2, '270', '270', '0', 'SILER 1 SISI. 30 MENIT', '100', '2023-12-29 02:41:14', '2023-12-29 02:42:05'),
(5, 'D23-00753', 28, 14, '2023-12-29', 3, '0.4', 'NS', 13, 2, 24, 2, '80', '80', '0', 'SILER 1 SISI. 30 MENIT', '100', '2023-12-29 02:41:49', '0000-00-00 00:00:00'),
(6, 'D23-00753', 28, 14, '2023-12-29', 4, '0.4', 'NS', 13, 2, 24, 2, '175', '175', '0', 'SILER 1 SISI 30 MENIT, 30 MENIT SUSUN BAHAN', '100', '2023-12-29 02:43:05', '0000-00-00 00:00:00'),
(7, 'D23-00753', 28, 14, '2023-12-29', 5, '0.4', 'NS', 13, 2, 24, 2, '350', '90', '0', '34 MENIT SILER 1 SISI.', '26', '2023-12-29 02:45:25', '2023-12-29 03:43:59'),
(8, 'D23-00855', 28, 4, '2023-12-29', 5, '0.4', 'NS', 13, 4, 1, 1, '350', '97', '0', 'SILER 1 SISI', '28', '2023-12-29 02:46:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `non_passed`
--

CREATE TABLE `non_passed` (
  `id_non_passed` int(11) NOT NULL,
  `kode_non_passed` varchar(5) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `non_passed`
--

INSERT INTO `non_passed` (`id_non_passed`, `kode_non_passed`, `keterangan`) VALUES
(1, 'A', 'Trim Terpotong'),
(2, 'B', 'Lengket'),
(4, 'C', 'Serabut'),
(5, 'D', 'Kotor'),
(6, 'E', 'Serpihan Penuh'),
(7, 'F', 'Rapuh Patah'),
(8, 'G', 'Motif Terpotong'),
(9, 'H', 'Tulang Bahan Tidak Searah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator_mesin`
--

CREATE TABLE `operator_mesin` (
  `id_operator_mesin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `operator2` varchar(50) NOT NULL,
  `operator3` varchar(50) NOT NULL,
  `operator4` varchar(50) DEFAULT NULL,
  `shift` varchar(10) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_pattern` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `id_gsm` int(11) NOT NULL,
  `lebar` varchar(10) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `satuan_pack` varchar(10) NOT NULL,
  `qty_roll` varchar(5) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `id_speed` int(11) NOT NULL,
  `no_stamp` varchar(10) NOT NULL,
  `target_jam` varchar(10) NOT NULL,
  `jam_proses` varchar(10) NOT NULL,
  `hasil_pack` varchar(5) NOT NULL,
  `hasil_kg` varchar(5) NOT NULL,
  `nonpassed_kode` varchar(10) DEFAULT NULL,
  `nonpassed_pack` varchar(10) DEFAULT NULL,
  `nonpassed_kg` varchar(10) DEFAULT NULL,
  `broke_setting` varchar(5) NOT NULL,
  `broke_trim` varchar(5) NOT NULL,
  `menit_proses` varchar(20) NOT NULL,
  `broke_serpihan` varchar(5) NOT NULL,
  `broke_motif` varchar(5) NOT NULL,
  `sisa_roll` varchar(5) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `id_downtime` int(11) NOT NULL,
  `downtime2` varchar(2) DEFAULT NULL,
  `downtime3` varchar(2) DEFAULT NULL,
  `downtime4` varchar(2) DEFAULT NULL,
  `waktu_downtime` varchar(10) NOT NULL,
  `waktu_downtime2` varchar(10) DEFAULT NULL,
  `waktu_downtime3` varchar(10) DEFAULT NULL,
  `waktu_downtime4` varchar(10) DEFAULT NULL,
  `id_jam` int(11) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `wip` varchar(10) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator_mesin`
--

INSERT INTO `operator_mesin` (`id_operator_mesin`, `id_user`, `operator2`, `operator3`, `operator4`, `shift`, `id_mesin`, `id_customer`, `no_wo`, `id_pattern`, `tanggal`, `id_bentuk`, `id_warna`, `id_ukuran`, `id_grade`, `id_gsm`, `lebar`, `id_lembar`, `satuan_pack`, `qty_roll`, `berat`, `id_speed`, `no_stamp`, `target_jam`, `jam_proses`, `hasil_pack`, `hasil_kg`, `nonpassed_kode`, `nonpassed_pack`, `nonpassed_kg`, `broke_setting`, `broke_trim`, `menit_proses`, `broke_serpihan`, `broke_motif`, `sisa_roll`, `ket`, `id_downtime`, `downtime2`, `downtime3`, `downtime4`, `waktu_downtime`, `waktu_downtime2`, `waktu_downtime3`, `waktu_downtime4`, `id_jam`, `jam_akhir`, `wip`, `persentase`, `created`, `updated`) VALUES
(2, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '5', '479,6', 14, '1471', '29', '700', '28', '29,4', '-', '', '', '0', '0', '20', '0', '0', '0', '08:00-08:09 SETTING SERPIHAN. 08:15-08:25 NAIK ROLL.  08:25-08:47 SETTING LENGKET.', 10, 'B', 'J', '-', '9', '10', '22', '', 1, '09.00', '', '97', '2023-12-29 09:56:09', '2023-12-29 03:38:55'),
(4, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '0', '0', 14, '1471', '86', '2150', '86', '90,3', '-', '', '', '0', '0', '60', '0', '0', '0', '-', 0, '-', '-', '-', '0', '0', '0', '', 2, '10.00', '', '100', '2023-12-29 10:14:20', '2023-12-29 03:39:03'),
(5, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '0', '0', 14, '1471', '44', '1100', '44', '46,2', '-', '', '', '0', '0', '31', '0', '0', '0', '10:30-11:00 GANTI TEPLON.', 3, '-', '-', '-', '29', '0', '0', '', 4, '11.00', '', '100', '2023-12-29 10:16:59', '2023-12-29 03:39:10'),
(6, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '0', '0', 14, '1471', '22', '550', '22', '23,1', '-', '', '', '0', '0', '15', '0', '0', '0', '11:00-11:45 GANTI PAPER MOLD BARU DAN SETTING', 9, '-', '-', '-', '45', '0', '0', '', 5, '12.00', '', '100', '2023-12-29 10:20:01', '2023-12-29 03:39:15'),
(7, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '0', '0', 14, '1471', '86', '2150', '86', '90,3', '-', '', '', '0', '0', '60', '0', '0', '0', '-', 0, '-', '-', '-', '0', '0', '0', '', 7, '14.00', '', '100', '2023-12-29 10:44:01', '2023-12-29 03:39:21'),
(8, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '0', '0', 14, '1471', '86', '2150', '86', '90,3', '-', '', '', '0', '0', '60', '0', '0', '0', '-', 0, '-', '-', '-', '0', '0', '0', '', 8, '15.00', '', '100', '2023-12-29 10:44:54', '2023-12-29 03:39:38'),
(9, 29, 'ELVA WIJAYA', '-', '', 'NS', 6, 14, 'D23-00753', 1, '2023-12-29', 2, 13, 24, 1, 4, '32', 2, '86', '0', '0', 14, '1471', '7', '200', '8', '8,4', '-', '', '', '1,8', '54,2', '5', '45', '0,6', '0', '-', 10, 'A', 'E', '-', '15', '30', '10', '', 9, '16.00', '', '114', '2023-12-29 10:48:43', '2023-12-29 03:39:48'),
(11, 9, 'ANDRI GUNAWAN', '-', '-', 'NS', 5, 18, 'D23-00864', 1, '2023-12-29', 4, 13, 12, 1, 4, '25,5', 2, '173', '5', '87,5', 14, '1472', '138', '1750', '140', '63,7', '-', '', '', '0', '19', '48', '4,8', '0', '0', '08:48 ORDER SELESAI. 08:48-09:00 CLEANING AREA DAN GANTI WO.', 10, '-', '-', '-', '12', '', '', '', 1, '09.00', '', '101', '2023-12-29 01:03:32', '2023-12-29 01:04:05'),
(12, 9, 'ANDRI GUNAWAN', '-', '-', 'NS', 3, 18, 'D23-00865', 3, '2023-12-29', 2, 13, 22, 1, 4, '32,25', 2, '173', '5', '15,75', 14, '1472', '107', '250', '250', '10,75', '-', '', '', '0', '2,8', '37', '2,2', '0', '0', '09:00-09:15 GANTI PISAU. 09:22 ORDER SELESAI. 09:22-09:30 CLEANING AREA DAN GANTI WO.  #NOTE: 09:30-', 6, 'J', '-', '-', '15', '8', '', '', 2, '10.00', '', '234', '2023-12-29 01:09:09', '2023-12-29 01:13:31'),
(13, 29, 'ELVA WIJAYA', '-', '-', 'NS', 1, 4, 'D23-00842', 1, '2024-01-02', 4, 13, 6, 1, 4, '39', 2, '518', '5', '436,86', 14, '1538', '294', '1225', '294', '46,39', '-', '', '', '0', '0', '34', '0', '0', '-', '08:15-08:26 SETTING SERPIHAN. 08:40-08:55 GANTI PISAU.', 10, 'F', '-', '-', '11', '15', '', '', 1, '09.00', '-', '100', '2024-01-02 08:31:41', '0000-00-00 00:00:00'),
(14, 29, 'ELVA WIJAYA', '-', '-', 'NS', 1, 4, 'D23-00842', 1, '2024-01-02', 4, 13, 6, 1, 4, '39', 2, '518', '-', '-', 14, '1538', '518', '2150', '516', '81,43', '-', '', '', '0', '0', '60', '0', '0', '-', '-', 0, '-', '-', '-', '0', '0', '0', '0', 2, '10.00', '-', '100', '2024-01-02 08:33:33', '2024-01-02 08:37:14'),
(15, 29, 'ELVA WIJAYA', '-', '-', 'NS', 1, 4, 'D23-00842', 1, '2024-01-02', 4, 13, 6, 1, 4, '39', 2, '518', '-', '-', 14, '1538', '518', '2150', '516', '81,43', '-', '', '', '0', '0', '60', '0', '0', '-', '-', 0, '-', '-', '-', '0', '0', '0', '0', 4, '11.00', '-', '100', '2024-01-02 08:33:57', '2024-01-02 08:36:55'),
(16, 29, 'ELVA WIJAYA', '-', '-', 'NS', 1, 4, 'D23-00842', 1, '2024-01-02', 4, 13, 6, 1, 4, '39', 2, '518', '-', '-', 14, '1538', '518', '2150', '516', '81,43', '-', '', '', '0', '0', '60', '0', '0', '-', '-', 0, '-', '-', '-', '0', '0', '0', '0', 5, '12.00', '-', '100', '2024-01-02 08:34:46', '2024-01-02 08:36:35'),
(17, 29, 'ELVA WIJAYA', '-', '-', 'NS', 1, 4, 'D23-00842', 1, '2024-01-02', 4, 13, 6, 1, 4, '39', 2, '518', '-', '-', 14, '1538', '406', '1700', '408', '64,38', '-', '', '', '0', '0', '47', '0', '0', '-', '13:47-14:00 CLEANING AREA.', 10, '-', '-', '-', '13', '0', '0', '0', 7, '14.00', '-', '100', '2024-01-02 08:36:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packingbox`
--

CREATE TABLE `packingbox` (
  `id_packingbox` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pattern`
--

CREATE TABLE `pattern` (
  `id_pattern` int(11) NOT NULL,
  `nama_pattern` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pattern`
--

INSERT INTO `pattern` (`id_pattern`, `nama_pattern`) VALUES
(1, 'Flower'),
(2, 'Fish'),
(3, 'New Flower'),
(5, 'Honey Comb'),
(6, 'Star');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polybag`
--

CREATE TABLE `polybag` (
  `id_mesin_polybag` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_admin`
--

CREATE TABLE `proses_admin` (
  `id_proses` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_jenis_pekerjaan` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `id_speed_mesin` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil_potongan` varchar(10) NOT NULL,
  `reject_potongan` varchar(10) NOT NULL,
  `hasil_geprek` varchar(10) NOT NULL,
  `reject_geprek` varchar(10) NOT NULL,
  `hasil_sortir_polybag` varchar(10) NOT NULL,
  `reject_sortir_polybag` varchar(10) NOT NULL,
  `hasil_sealer` varchar(10) NOT NULL,
  `reject_sealer` varchar(10) NOT NULL,
  `hasil_oven` varchar(10) NOT NULL,
  `reject_oven` varchar(10) NOT NULL,
  `hasil_sticker` varchar(10) NOT NULL,
  `reject_sticker` varchar(10) NOT NULL,
  `hasil_packing_box` varchar(10) NOT NULL,
  `reject_packing_box` varchar(10) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `speed_mesin`
--

CREATE TABLE `speed_mesin` (
  `id_speed_mesin` int(11) NOT NULL,
  `speed_mesin` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `speed_mesin`
--

INSERT INTO `speed_mesin` (`id_speed_mesin`, `speed_mesin`) VALUES
(1, '5'),
(2, '10'),
(3, '13'),
(4, '15'),
(5, '25'),
(6, '30'),
(7, '40'),
(8, '45'),
(9, '50'),
(10, '55'),
(11, '60'),
(12, '65'),
(13, '70'),
(14, '75'),
(15, '77'),
(16, '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sticker`
--

CREATE TABLE `sticker` (
  `id_sticker` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `target` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `rejected` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `persentase` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_mesin`
--

CREATE TABLE `target_mesin` (
  `id_target_mesin` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `id_speed_mesin` int(11) NOT NULL,
  `target_mesin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `target_mesin`
--

INSERT INTO `target_mesin` (`id_target_mesin`, `id_bentuk`, `id_ukuran`, `id_lembar`, `id_speed_mesin`, `target_mesin`) VALUES
(1, 4, 2, 1, 14, '1728'),
(2, 4, 1, 2, 14, '1728'),
(3, 4, 2, 2, 14, '691'),
(4, 4, 1, 2, 14, '1037'),
(5, 4, 1, 1, 14, '2592'),
(6, 4, 3, 1, 14, '2592'),
(7, 4, 5, 1, 14, '1296'),
(8, 4, 5, 2, 14, '518'),
(9, 4, 6, 1, 14, '1296'),
(10, 4, 6, 2, 14, '518'),
(11, 4, 7, 1, 14, '1944'),
(12, 4, 7, 2, 14, '778'),
(13, 4, 8, 1, 14, '864'),
(14, 4, 8, 2, 14, '346'),
(15, 4, 9, 1, 14, '864'),
(16, 4, 9, 2, 14, '346'),
(17, 4, 10, 1, 14, '864'),
(18, 4, 10, 2, 14, '346'),
(19, 4, 11, 1, 14, '432'),
(20, 4, 11, 2, 14, '173'),
(21, 4, 12, 1, 14, '432'),
(22, 4, 12, 2, 14, '173'),
(23, 4, 13, 1, 14, '432'),
(24, 4, 13, 2, 14, '173'),
(25, 4, 14, 1, 14, '432'),
(26, 4, 14, 2, 14, '173'),
(27, 4, 15, 1, 14, '216'),
(28, 4, 15, 2, 14, '86'),
(29, 4, 16, 1, 14, '216'),
(30, 4, 16, 2, 14, '86'),
(31, 4, 17, 1, 14, '216'),
(32, 4, 17, 2, 14, '86'),
(33, 4, 18, 1, 14, '216'),
(34, 4, 18, 2, 14, '86'),
(35, 4, 19, 1, 14, '216'),
(36, 4, 19, 2, 14, '86'),
(37, 4, 20, 1, 14, '216'),
(38, 4, 20, 2, 14, '86'),
(39, 4, 21, 1, 14, '216'),
(40, 4, 21, 2, 14, '86'),
(41, 2, 28, 1, 14, '648'),
(42, 2, 28, 2, 14, '259'),
(43, 2, 29, 2, 14, '648'),
(44, 2, 29, 2, 14, '259'),
(45, 2, 22, 1, 14, '432'),
(46, 2, 22, 2, 14, '173'),
(47, 2, 27, 1, 14, '216'),
(48, 2, 27, 2, 14, '86'),
(49, 2, 23, 1, 14, '216'),
(50, 2, 23, 2, 14, '86'),
(51, 2, 24, 1, 14, '216'),
(52, 2, 24, 2, 14, '86'),
(53, 2, 25, 1, 14, '216'),
(54, 2, 25, 2, 14, '86'),
(55, 2, 26, 1, 14, '216'),
(56, 2, 26, 2, 14, '86'),
(57, 1, 33, 1, 14, '432'),
(58, 1, 33, 2, 14, '173'),
(59, 1, 22, 1, 14, '432'),
(60, 1, 22, 2, 14, '173'),
(61, 1, 31, 1, 14, '216'),
(62, 1, 31, 2, 14, '86'),
(63, 1, 32, 1, 14, '216'),
(64, 1, 32, 2, 14, '86'),
(65, 3, 37, 1, 14, '432'),
(66, 1, 37, 2, 14, '173'),
(67, 3, 36, 1, 14, '432'),
(68, 3, 36, 2, 14, '173'),
(69, 3, 35, 1, 14, '216'),
(70, 3, 35, 2, 14, '86');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(20, 1, 2),
(24, 1, 9),
(29, 1, 10),
(30, 1, 11),
(31, 1, 12),
(32, 1, 13),
(33, 1, 14),
(34, 1, 15),
(35, 1, 16),
(36, 1, 17),
(37, 1, 18),
(38, 1, 19),
(39, 1, 20),
(40, 1, 21),
(41, 1, 22),
(42, 1, 23),
(43, 1, 24),
(44, 1, 25),
(45, 1, 26),
(56, 1, 37),
(58, 1, 38),
(62, 2, 27),
(63, 3, 27),
(67, 1, 50),
(68, 1, 51),
(69, 1, 36),
(70, 1, 27),
(71, 2, 10),
(74, 2, 13),
(75, 2, 50),
(76, 2, 2),
(77, 2, 36),
(78, 3, 36),
(80, 2, 40),
(81, 1, 40),
(82, 1, 52);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(4, 'Sample Menu', 'Sample Menu', 'fa fa-graduation-cap', 0, 'y'),
(5, 'Sample Menu', 'Sample Menu', 'fa fa-bed', 0, 'y'),
(6, 'Sample Menu', 'Sample Menu', 'fa-id-card', 0, 'y'),
(7, 'Sample Menu', 'Sample Menu', 'fa fa-area-chart', 0, 'y'),
(8, 'Sample Menu', 'Sample Menu', 'fa-id-card', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'MASTER KARYAWAN', '#', 'fa fa-area-chart', 0, 'y'),
(11, 'DIVISI', 'divisi', 'fa fa-briefcase', 10, 'y'),
(12, 'JABATAN', 'jabatan', 'fa fa-briefcase', 10, 'y'),
(13, 'MASTER DOILIES', '#', 'fa fa-area-chart', 0, 'y'),
(14, 'CUSTOMER', 'customer', 'fa fa-users', 13, 'y'),
(15, 'UKURAN', 'ukuran', 'fa fa-briefcase', 13, 'y'),
(16, 'DOWNTIME', 'downtime', 'fa fa-briefcase', 13, 'y'),
(17, 'MESIN', 'mesin', 'fa fa-briefcase', 13, 'y'),
(18, 'GRADE', 'grade', 'fa fa-briefcase', 13, 'y'),
(19, 'SPEED MESIN', 'speedmesin', 'fa fa-briefcase', 13, 'y'),
(20, 'NON_PASSED', 'nonpassed', 'fa fa-briefcase', 13, 'y'),
(21, 'BENTUK', 'bentuk', 'fa fa-briefcase', 13, 'y'),
(22, 'WAKTU', 'waktu', 'fa fa-briefcase', 13, 'y'),
(23, 'WARNA', 'warna', 'fa fa-briefcase', 13, 'y'),
(24, 'PATTERN', 'pattern', 'fa fa-briefcase', 13, 'y'),
(25, 'LEMBAR', 'lembar', 'fa fa-briefcase', 13, 'y'),
(26, 'GSM', 'gsm', 'fa fa-briefcase', 13, 'y'),
(27, 'FORM PACKAGING', '#', 'fa fa-area-chart', 0, 'y'),
(28, 'FORM POTONGAN', 'potongan', 'fa fa-briefcase', 27, 'y'),
(29, 'FORM MESIN GEPREK', 'mesingeprek', 'fa fa-briefcase', 27, 'y'),
(30, 'FORM MESIN SEALER', 'mesinsealer', 'fa fa-briefcase', 27, 'y'),
(31, 'FORM MESIN OVEN', 'mesinoven', 'fa fa-briefcase', 27, 'y'),
(32, 'FORM MESIN POLYBAG', 'mesinpolybag', 'fa fa-briefcase', 27, 'y'),
(33, 'FORM PACKING BOX', 'packingbox', 'fa fa-briefcase', 27, 'y'),
(34, 'FORM STICKER', 'sticker', 'fa fa-briefcase', 27, 'y'),
(35, 'FORM TRANSFER FG', 'transferfg', 'fa fa-briefcase', 27, 'y'),
(36, 'FORM OPERATOR MESIN', 'operatormesin', 'fa fa-area-chart', 0, 'y'),
(37, 'JAM', 'jam', 'fa fa-briefcase', 13, 'y'),
(38, 'JENIS PEKERJAAN', 'jenispekerjaan', 'fa fa-briefcase', 13, 'y'),
(39, 'FORM PROSES ADMIN', 'prosesadmin', 'fa fa-area-chart', 0, 'y'),
(40, 'LAPORAN OPERATOR', '#', 'fa fa-area-chart', 0, 'y'),
(41, 'LAPORAN  POTONGAN', 'laporan/potongan', 'fa fa-briefcase', 40, 'y'),
(42, 'LAPORAN MESIN GEPREK', 'laporan/laporangeprek', 'fa fa-briefcase', 40, 'y'),
(43, 'LAPORAN MESIN SEALER', 'laporan/laporansealer', 'fa fa-briefcase', 40, 'y'),
(44, 'LAPORAN MESIN OVEN', 'laporan/laporan_oven', 'fa fa-briefcase', 40, 'y'),
(45, 'LAPORAN SORTIR POLYBAG', 'laporan/laporan_polybag', 'fa fa-briefcase', 40, 'y'),
(46, 'LAPORAN PACKING BOX', 'laporan/laporan_packing_box', 'fa fa-briefcase', 40, 'y'),
(47, 'LAPORAN STICKER', 'laporan/laporan_sticker', 'fa fa-briefcase', 40, 'y'),
(48, 'LAPORAN TRANSFER FG', 'laporan/laporan_transfer_fg', 'fa fa-briefcase', 40, 'y'),
(49, 'LAPORAN ADMIN', '#', 'fa fa-area-chart', 0, 'y'),
(50, 'LAPORAN HARIAN MESIN', 'operatormesin/cetak', 'fa fa-briefcase', 0, 'y'),
(51, 'LAPORAN HARIAN PACKAGING', 'prosesadmin/cetak', 'fa fa-briefcase', 49, 'y'),
(52, 'TARGET MESIN', 'target_mesin', 'fa fa-briefcase', 13, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `nik`, `username`, `email`, `password`, `id_jabatan`, `id_divisi`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Nuris', '0001', 'nuris', 'nuris.akbar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 'Cover_TIPSTRIK_codeigniter.jpg', 1, 'y'),
(2, 'SHOBUR S', '123456', 'SHOBUR', 'Shobur@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 5, 1, '', 2, 'y'),
(3, 'SIGID', '123', 'SIGID', '-', '106a7579968ee17bfa4556aa09e3ba55', 2, 1, '', 0, 'y'),
(4, 'SIGID', '13245', 'SIGID', '-', '3089c8aeda09245955c8001b37f6dba3', 2, 1, '', 2, 'y'),
(5, 'EGA LESTARI', '10560911', 'EGA LESTARI', '-', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '', 2, 'y'),
(6, 'RICO AJI', '10800214', 'RICO AJI', '-', 'e10adc3949ba59abbe56e057f20f883e', 2, 2, '', 2, 'y'),
(8, 'DIANA', '62351022', 'DIANA', '-', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '', 2, 'y'),
(9, 'KHOERUL AMRI', '11820719', 'KHOERUL AMRI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(10, 'ELVA WIJAYA', '11620119', 'ELVA WIJAYA', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(14, 'DAYAT PUSAT', '123456', 'dayat', '-', '7c5bf58e52551adb753bb000c95e8cd3', 4, 1, '', 2, 'y'),
(27, 'MARYANIH MA\'ANAH', '61430722', 'MARYANIH MA\'ANAH', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(28, 'EMAS SELAWATI', '55850820', 'EMAS SELAWATI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(29, 'ABDUL GOFUR', '12791020', 'ABDUL GOFUR', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 2, 'y'),
(30, 'M.IQBAL HIMAWAN', '58610222', 'M.IQBAL HIMAWAN', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(31, 'BADU PALIHIN', '5864 0222', 'BADU PALIHIN', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(32, 'ELDI SAPUTRA', '6005 0522', 'ELDI SAPUTRA', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(33, 'CARMA', '6004 0522', 'CARMA', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(34, 'IIN SAPUTRI', '6144 0722', 'IIN SAPUTRI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'n'),
(35, 'DEDE HARIS', '1247 0620', 'DEDE HARIS', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(36, 'RUSLIYADI', '5860 0222', 'RUSLIYADI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(37, 'MARYANIH MA\'ANAH', '6143 0722', 'MARYANIH MA\'ANAH', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(38, 'ANDRI GUNAWAN', '4688 0319', 'ANDRI GUNAWAN', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(39, 'ABDUL ROZAK', '5169 0819', 'ABDUL ROZAK', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(40, 'KETRA MELDAYANI', '5572 0820', 'KETRA MELDAYANI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(41, 'EMAS SELAWATI', '5585 0820', 'EMAS SELAWATI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(42, 'YUNINGSIH', '6024 0421', 'YUNINGSIH', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(43, 'ELIS SAMINI', '6206 0621', 'ELIS SAMINI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(44, 'NENGSIH', '6148 0621', 'NENGSIH', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(45, 'RIAN ANDRIANI', '5683 0119', 'RIAN ANDRIANI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(46, 'RISMA UMEGA', '6020 0421', 'RISMA UMEGA', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(47, 'USUP', '6249 0821', 'USUP', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y'),
(48, 'DENDI', '60170522', 'DENDI', '-', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '', 3, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_fg`
--

CREATE TABLE `transfer_fg` (
  `id_transfer_fg` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_lembar` int(11) NOT NULL,
  `id_pattern` int(11) NOT NULL,
  `box_qty` varchar(5) NOT NULL,
  `box_pack` varchar(5) NOT NULL,
  `box_pcs` varchar(5) NOT NULL,
  `box_kg` varchar(5) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `id_gsm` int(11) NOT NULL,
  `no_stock` varchar(10) NOT NULL,
  `no_form` varchar(20) NOT NULL,
  `kode_sistem` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `ukuran`) VALUES
(1, '3,5\"'),
(2, '4,5\"'),
(3, '4,5\" New'),
(5, '5\"'),
(6, '5,5\"'),
(7, '5,5\" New'),
(8, '6,5\"'),
(9, '7\"'),
(10, '7,5\"'),
(11, '8,5\"'),
(12, '9,5\"'),
(13, '10,5\"'),
(14, '11,5\"'),
(15, '12\"'),
(16, '12,5\"'),
(17, '14\"'),
(18, '14,5\"'),
(19, '16\"'),
(20, '16,5\"'),
(21, '13,5\"'),
(22, '8\"X12\"'),
(23, '10,5\"X14,5'),
(24, '12\"X16\"'),
(25, '12,5\" X 18,5\"'),
(26, '14\" X 18\"'),
(27, '10\" X 14,5\"'),
(28, '6,5\" X 9,5\"'),
(29, '6,5\"x14,5\"'),
(30, '8\" X 12\"'),
(31, '10,5\" X 14\"'),
(32, '11,5 \" X 14,5\"'),
(33, '7,5\" X 10\"'),
(34, '4,5\"X6,5\"'),
(35, '12,5\" X 12,5\"'),
(36, '10\" X 10\"'),
(37, '8\"X 8\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `waktu`) VALUES
(1, '08.00 - 09.00'),
(2, '09.00 - 10.00'),
(3, '10.00 - 11.00'),
(4, '11.00 - 12.00'),
(5, '13.00-14.00'),
(6, '14.00-15.00'),
(7, '15.00-16.00'),
(8, '16.00-17.00'),
(9, '17.00-18.00'),
(10, '19.00-20.00'),
(11, '20.00-21.00'),
(12, '21.00-22.00'),
(13, '22.00-23.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`) VALUES
(1, 'Yellow'),
(2, 'Brown'),
(3, 'Dark Red'),
(4, 'Red'),
(5, 'Pink'),
(6, 'Batik 1'),
(7, 'Batik 2'),
(8, 'Batik 3'),
(9, 'Batik 4'),
(10, 'Batik 5'),
(11, 'Golden Yellow'),
(12, 'Green'),
(13, 'White'),
(14, 'White NF'),
(15, 'White B'),
(16, 'Blue'),
(17, 'Pink New'),
(18, 'Green Light');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bentuk`
--
ALTER TABLE `bentuk`
  ADD PRIMARY KEY (`id_bentuk`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `downtime`
--
ALTER TABLE `downtime`
  ADD PRIMARY KEY (`id_downtime`);

--
-- Indeks untuk tabel `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indeks untuk tabel `gsm`
--
ALTER TABLE `gsm`
  ADD PRIMARY KEY (`id_gsm`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id_jenis_pekerjaan`);

--
-- Indeks untuk tabel `lembar_pack`
--
ALTER TABLE `lembar_pack`
  ADD PRIMARY KEY (`id_lembar`);

--
-- Indeks untuk tabel `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indeks untuk tabel `mesin_geprek`
--
ALTER TABLE `mesin_geprek`
  ADD PRIMARY KEY (`id_mesin_geprek`);

--
-- Indeks untuk tabel `mesin_oven`
--
ALTER TABLE `mesin_oven`
  ADD PRIMARY KEY (`id_mesin_oven`);

--
-- Indeks untuk tabel `mesin_sealer`
--
ALTER TABLE `mesin_sealer`
  ADD PRIMARY KEY (`id_mesin_sealer`);

--
-- Indeks untuk tabel `non_passed`
--
ALTER TABLE `non_passed`
  ADD PRIMARY KEY (`id_non_passed`);

--
-- Indeks untuk tabel `operator_mesin`
--
ALTER TABLE `operator_mesin`
  ADD PRIMARY KEY (`id_operator_mesin`);

--
-- Indeks untuk tabel `packingbox`
--
ALTER TABLE `packingbox`
  ADD PRIMARY KEY (`id_packingbox`);

--
-- Indeks untuk tabel `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`id_pattern`);

--
-- Indeks untuk tabel `polybag`
--
ALTER TABLE `polybag`
  ADD PRIMARY KEY (`id_mesin_polybag`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indeks untuk tabel `proses_admin`
--
ALTER TABLE `proses_admin`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indeks untuk tabel `speed_mesin`
--
ALTER TABLE `speed_mesin`
  ADD PRIMARY KEY (`id_speed_mesin`);

--
-- Indeks untuk tabel `sticker`
--
ALTER TABLE `sticker`
  ADD PRIMARY KEY (`id_sticker`);

--
-- Indeks untuk tabel `target_mesin`
--
ALTER TABLE `target_mesin`
  ADD PRIMARY KEY (`id_target_mesin`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indeks untuk tabel `transfer_fg`
--
ALTER TABLE `transfer_fg`
  ADD PRIMARY KEY (`id_transfer_fg`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bentuk`
--
ALTER TABLE `bentuk`
  MODIFY `id_bentuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `downtime`
--
ALTER TABLE `downtime`
  MODIFY `id_downtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gsm`
--
ALTER TABLE `gsm`
  MODIFY `id_gsm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id_jenis_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lembar_pack`
--
ALTER TABLE `lembar_pack`
  MODIFY `id_lembar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mesin_geprek`
--
ALTER TABLE `mesin_geprek`
  MODIFY `id_mesin_geprek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mesin_oven`
--
ALTER TABLE `mesin_oven`
  MODIFY `id_mesin_oven` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mesin_sealer`
--
ALTER TABLE `mesin_sealer`
  MODIFY `id_mesin_sealer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `non_passed`
--
ALTER TABLE `non_passed`
  MODIFY `id_non_passed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `operator_mesin`
--
ALTER TABLE `operator_mesin`
  MODIFY `id_operator_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `packingbox`
--
ALTER TABLE `packingbox`
  MODIFY `id_packingbox` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pattern`
--
ALTER TABLE `pattern`
  MODIFY `id_pattern` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `polybag`
--
ALTER TABLE `polybag`
  MODIFY `id_mesin_polybag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proses_admin`
--
ALTER TABLE `proses_admin`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `speed_mesin`
--
ALTER TABLE `speed_mesin`
  MODIFY `id_speed_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `sticker`
--
ALTER TABLE `sticker`
  MODIFY `id_sticker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `target_mesin`
--
ALTER TABLE `target_mesin`
  MODIFY `id_target_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transfer_fg`
--
ALTER TABLE `transfer_fg`
  MODIFY `id_transfer_fg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
