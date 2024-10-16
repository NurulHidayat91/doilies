-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 22 Agu 2023 pada 05.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'ANGGI', '089585999555', 'PELUMPANG', '2023-08-11 04:33:08'),
(2, 'DAYAT', '08954999944', 'LONTAR  LUAR NO.29', '2023-08-10 23:08:00'),
(3, 'AGUS', '08954999944', 'SUNTER', '2023-08-13 22:08:09');

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
(1, 'Marketing'),
(2, 'FInance');

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
(1, 'A', 'GANTI UKURAN'),
(2, 'B', 'NAIK ROLL');

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
(1, 'mg');

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
(3, '39');

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
(2, 'SUPERVISOR');

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
(2, '09.00');

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
(3, '35');

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
(1, '01'),
(2, '02'),
(3, '03');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin_geprek`
--

INSERT INTO `mesin_geprek` (`id_mesin_geprek`, `no_wo`, `id_user`, `operator2`, `id_customer`, `tanggal`, `id_mesin`, `id_waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `created`, `updated`) VALUES
(3, '426', 1, 'Dadang', 1, '2023-08-16', 1, 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '426', 1, 'Dadang', 1, '2023-08-16', 1, 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '2023-08-16 04:17:23', '2023-08-16 04:18:00');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin_oven`
--

INSERT INTO `mesin_oven` (`id_mesin_oven`, `no_wo`, `id_user`, `id_customer`, `tanggal`, `id_waktu`, `no_mesin`, `speed`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `created`, `updated`) VALUES
(1, '428', 1, 1, '2023-08-16', 1, '01', '10', 'NSS', 1, 1, 1, 1, '500', '100', '0', 'ok', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '428', 1, 1, '2023-08-16', 2, '01', '10', 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '428', 1, 1, '2023-08-16', 3, '01', '10', 'NSS', 1, 1, 1, 1, '500', '100', '0', 'ok', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '428', 1, 1, '2023-08-16', 4, '01', '10', 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '2023-08-16 04:20:34', '2023-08-16 04:21:11');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin_sealer`
--

INSERT INTO `mesin_sealer` (`id_mesin_sealer`, `no_wo`, `id_user`, `id_customer`, `tanggal`, `id_waktu`, `no_mesin`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `created`, `updated`) VALUES
(8, '428', 1, 1, '2023-08-16', 1, '01', 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '0000-00-00 00:00:00', '2023-08-16 04:34:30'),
(9, '428', 1, 1, '2023-08-16', 2, '01', 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '2023-08-16 04:34:05', '2023-08-16 04:34:40');

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
(2, 'B', 'Lengket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator_mesin`
--

CREATE TABLE `operator_mesin` (
  `id_operator_mesin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `operator2` varchar(50) NOT NULL,
  `operator3` varchar(50) NOT NULL,
  `operator4` varchar(50) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_wo` varchar(20) NOT NULL,
  `id_pattern` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_bentuk` int(11) NOT NULL,
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
  `broke_setting` varchar(5) NOT NULL,
  `broke_trim` varchar(5) NOT NULL,
  `menit_proses` varchar(20) NOT NULL,
  `broke_serpihan` varchar(5) NOT NULL,
  `broke_motif` varchar(5) NOT NULL,
  `sisa_roll` varchar(5) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_downtime` int(11) NOT NULL,
  `waktu_downtime` varchar(10) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `persentase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `packingbox`
--

INSERT INTO `packingbox` (`id_packingbox`, `no_wo`, `id_user`, `tanggal`, `id_waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `id_customer`, `created`, `updated`) VALUES
(3, '428', 1, '2023-08-18', 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', 1, '2023-08-18 09:35:23', '2023-08-18 09:48:51');

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
(3, 'Honey Comb');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `polybag`
--

INSERT INTO `polybag` (`id_mesin_polybag`, `no_wo`, `id_user`, `id_customer`, `tanggal`, `id_waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `created`, `updated`) VALUES
(4, '426', 1, 1, '2023-08-16', 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '426', 1, 1, '2023-08-16', 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', '2023-08-16 04:24:29', '2023-08-16 04:24:45');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `no_wo`, `id_user`, `tanggal`, `id_waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `id_customer`, `created`, `updated`) VALUES
(9, '425', 1, '2023-08-18', 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', 1, '2023-08-18 08:52:37', '0000-00-00 00:00:00');

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
(1, '10'),
(2, '20');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sticker`
--

INSERT INTO `sticker` (`id_sticker`, `no_wo`, `id_user`, `tanggal`, `id_waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `target`, `hasil`, `rejected`, `keterangan`, `id_customer`, `created`, `updated`) VALUES
(1, '428', 1, '2023-08-18', 1, 'NS', 1, 1, 1, 1, '500', '100', '0', 'ok', 1, '2023-08-18 10:15:03', '0000-00-00 00:00:00'),
(2, '428', 1, '2023-08-18', 2, 'NSs', 1, 1, 1, 1, '500', '100', '0', 'ok', 1, '2023-08-18 10:25:10', '2023-08-18 10:30:33');

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
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
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
(55, 1, 27),
(56, 1, 37),
(57, 1, 36);

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
(27, 'MASTER FORM OPERATOR', '#', 'fa fa-area-chart', 0, 'y'),
(28, 'FORM POTONGAN', 'potongan', 'fa fa-briefcase', 27, 'y'),
(29, 'FORM MESIN GEPREK', 'mesingeprek', 'fa fa-briefcase', 27, 'y'),
(30, 'FORM MESIN SEALER', 'mesinsealer', 'fa fa-briefcase', 27, 'y'),
(31, 'FORM MESIN OVEN', 'mesinoven', 'fa fa-briefcase', 27, 'y'),
(32, 'FORM MESIN POLYBAG', 'mesinpolybag', 'fa fa-briefcase', 27, 'y'),
(33, 'FORM PACKING BOX', 'packingbox', 'fa fa-briefcase', 27, 'y'),
(34, 'FORM STICKER', 'sticker', 'fa fa-briefcase', 27, 'y'),
(35, 'FORM TRANSFER FG', 'transferfg', 'fa fa-briefcase', 27, 'y'),
(36, 'FORM OPERATOR MESIN', 'operatormesin', 'fa fa-area-chart', 0, 'y'),
(37, 'JAM', 'jam', 'fa fa-briefcase', 13, 'y');

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
(1, 'Nuris', '0001', 'nuris', 'nuris.akbar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'Cover_TIPSTRIK_codeigniter.jpg', 1, 'y'),
(3, 'Muhammad hafidz Muzaki', '0003', 'hafid', 'hafid2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 2, '7.png', 2, 'y'),
(4, 'Nurul Hidayat', '0002', 'dayat', 'dhayat000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '', 1, 'y');

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
(2, 'Admin');

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
  `box_qty` varchar(5) NOT NULL,
  `box_kg` varchar(5) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `gsm` varchar(10) NOT NULL,
  `no_stock` varchar(10) NOT NULL,
  `kode_sistem` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transfer_fg`
--

INSERT INTO `transfer_fg` (`id_transfer_fg`, `no_wo`, `id_user`, `tanggal`, `waktu`, `shift`, `id_warna`, `id_bentuk`, `id_ukuran`, `id_lembar`, `box_qty`, `box_kg`, `keterangan`, `id_customer`, `grade`, `gsm`, `no_stock`, `kode_sistem`) VALUES
(2, '428', 1, '2023-08-21', '08.00 - 09.00', 'NS', 1, 1, 1, 1, '300', '10', 'ok', 1, 'mg', '37', '03', 'DO45995');

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
(1, '4,5 inch'),
(2, '3,5 inch'),
(3, '5,5 inch');

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
(4, '11.00 - 12.00');

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
(1, 'Batik 1'),
(2, 'Brown'),
(3, 'Dark Red'),
(4, 'Red'),
(5, 'Pink Yellow');

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `downtime`
--
ALTER TABLE `downtime`
  MODIFY `id_downtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gsm`
--
ALTER TABLE `gsm`
  MODIFY `id_gsm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lembar_pack`
--
ALTER TABLE `lembar_pack`
  MODIFY `id_lembar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mesin_geprek`
--
ALTER TABLE `mesin_geprek`
  MODIFY `id_mesin_geprek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mesin_oven`
--
ALTER TABLE `mesin_oven`
  MODIFY `id_mesin_oven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mesin_sealer`
--
ALTER TABLE `mesin_sealer`
  MODIFY `id_mesin_sealer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `non_passed`
--
ALTER TABLE `non_passed`
  MODIFY `id_non_passed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `operator_mesin`
--
ALTER TABLE `operator_mesin`
  MODIFY `id_operator_mesin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `packingbox`
--
ALTER TABLE `packingbox`
  MODIFY `id_packingbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pattern`
--
ALTER TABLE `pattern`
  MODIFY `id_pattern` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `polybag`
--
ALTER TABLE `polybag`
  MODIFY `id_mesin_polybag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `speed_mesin`
--
ALTER TABLE `speed_mesin`
  MODIFY `id_speed_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sticker`
--
ALTER TABLE `sticker`
  MODIFY `id_sticker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transfer_fg`
--
ALTER TABLE `transfer_fg`
  MODIFY `id_transfer_fg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
