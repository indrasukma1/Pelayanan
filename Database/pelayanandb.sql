-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2020 pada 08.10
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanandb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nama_admin` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`nama_admin`, `username`, `password`, `jenis_kelamin`, `alamat`) VALUES
('Faizal Azis', 'admin', 'faizal', 'Laki-laki', 'Jl. Panoongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_jadwal`
--

CREATE TABLE `tbl_detail_jadwal` (
  `kode_jadwal` varchar(10) COLLATE utf8_bin NOT NULL,
  `semester` varchar(1) COLLATE utf8_bin NOT NULL,
  `hari` varchar(8) COLLATE utf8_bin NOT NULL,
  `waktu` varchar(15) COLLATE utf8_bin NOT NULL,
  `kode_matakuliah` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_dosen` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_ruangan` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_detail_jadwal`
--

INSERT INTO `tbl_detail_jadwal` (`kode_jadwal`, `semester`, `hari`, `waktu`, `kode_matakuliah`, `kode_dosen`, `kode_ruangan`) VALUES
('J111111111', '1', 'Senin', '08:00-09:00', 'M222222222', 'D111111111', 'A02'),
('J333333333', '1', 'Senin', '08:00 - 09:00', 'M111111111', 'D333333333', 'A02'),
('J111111111', '2', 'Selasa', '08:00-09:00', 'M222222222', 'D111111111', 'A03'),
('J333333333', '2', 'Selasa', '08:00-09:00', 'M111111111', 'D111111111', 'A03'),
('J333333333', '2', 'Senin', '08:00-09:00', 'M111111111', 'D111111111', 'A02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_kelas`
--

CREATE TABLE `tbl_detail_kelas` (
  `kode_prodi` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8_bin NOT NULL,
  `NPM` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_detail_kelas`
--

INSERT INTO `tbl_detail_kelas` (`kode_prodi`, `kode_kelas`, `NPM`) VALUES
('86208', '8610801A', '1802510040');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_krs`
--

CREATE TABLE `tbl_detail_krs` (
  `kode_krs` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_matakuliah` varchar(10) COLLATE utf8_bin NOT NULL,
  `SKS` int(2) NOT NULL,
  `kode_dosen` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_detail_krs`
--

INSERT INTO `tbl_detail_krs` (`kode_krs`, `kode_matakuliah`, `SKS`, `kode_dosen`) VALUES
('KRS1111111', 'M222222222', 2, 'D222222222'),
('KRS1111111', 'M333333333', 2, 'D333333333'),
('KRS1111111', 'M333333333', 4, 'D555555555'),
('KRS2222222', 'M222222222', 4, 'D222222222'),
('KRS2222222', 'M333333333', 2, 'D444444444'),
('KRS2222222', 'M333333333', 2, 'D555555555'),
('KRS1111111', 'M111111111', 2, 'D111111111'),
('KRS1111111', 'M222222222', 4, 'D333333333'),
('KRS1111111', 'M222222222', 2, 'D444444444'),
('KRS2222222', 'M111111111', 2, 'D111111111'),
('KRS223', 'M111111111', 4, 'D111111111'),
('KRS223', 'M222222222', 2, 'D222222222'),
('KRS223', 'M333333333', 2, 'D333333333'),
('KRS223', 'M111111111', 4, 'D444444444'),
('KRS223', 'M222222222', 2, 'D555555555'),
('KRS223', 'MTK334', 2, 'D222222222'),
('KRS0224', 'M111111111', 2, 'D111111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `kode_dosen` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL,
  `nama_dosen` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`kode_dosen`, `password`, `nama_dosen`, `jenis_kelamin`) VALUES
('D111111111', '111111111', 'Anugerah', 'Laki-laki'),
('D222222222', 'mahrita', 'Mahrita', 'Perempuan'),
('D333333333', 'debora', 'Debora', 'Perempuan'),
('D444444444', 'lydia', 'Lydia', 'Perempuan'),
('D555555555', 'rudi123', 'Rudi', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kode_jadwal` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_prodi` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kode_jadwal`, `kode_prodi`, `kode_kelas`) VALUES
('J111111111', '86208', 'IA'),
('J222222222', '86108', 'IA'),
('J333333333', '86208', '8610801A'),
('JDW0334', '86108', 'IA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kode_prodi` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kode_prodi`, `kode_kelas`) VALUES
('86208', 'IB'),
('86108', 'IA'),
('86208', '8610801A'),
('86208', 'IIA'),
('86108', 'IIIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `kode_krs` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_prodi` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8_bin NOT NULL,
  `tahun_akademik` varchar(10) COLLATE utf8_bin NOT NULL,
  `semester` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`kode_krs`, `kode_prodi`, `kode_kelas`, `tahun_akademik`, `semester`) VALUES
('KRS0224', '86108', 'IA', '2021/2022', '2'),
('KRS2222222', '86208', '8610801A', '2020/2021', '1'),
('KRS223', '86208', '8610801A', '2021/2022', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `NPM` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL,
  `Nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `prodi` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8_bin NOT NULL,
  `tempatTglLahir` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`NPM`, `password`, `Nama`, `prodi`, `jenis_kelamin`, `tempatTglLahir`, `alamat`) VALUES
('1254886622', 'devi', 'Devianti', 'S1 Pendidikan Guru Madrasah Ibtidaiyah', 'P', 'Ciamis, 22-07-1996', 'Lingkungan Belender'),
('1802510040', 'faizal23', 'Faizal Azis', 'S1 Pendidikan Agama Islam', 'L', 'Ciamis, 23-04-2000', 'JL. Panoongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `kode_matakuliah` varchar(10) COLLATE utf8_bin NOT NULL,
  `matakuliah` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`kode_matakuliah`, `matakuliah`) VALUES
('M111111111', 'Bahasa Arab'),
('M222222222', 'Bahasa Indonesia'),
('M333333333', 'Bahasa Inggris'),
('MTK334', 'Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `NPM` varchar(10) COLLATE utf8_bin NOT NULL,
  `kode_matakuliah` varchar(10) COLLATE utf8_bin NOT NULL,
  `SKS` varchar(2) COLLATE utf8_bin NOT NULL,
  `kode_dosen` varchar(10) COLLATE utf8_bin NOT NULL,
  `semester` varchar(2) COLLATE utf8_bin NOT NULL,
  `tahun_akademik` varchar(10) COLLATE utf8_bin NOT NULL,
  `nilai_kehadiran` int(3) NOT NULL,
  `tugas_terstruktur` int(3) NOT NULL,
  `tugas_mandiri` int(3) NOT NULL,
  `UTS` int(3) NOT NULL,
  `UAS` int(3) NOT NULL,
  `nilai_akhir` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`NPM`, `kode_matakuliah`, `SKS`, `kode_dosen`, `semester`, `tahun_akademik`, `nilai_kehadiran`, `tugas_terstruktur`, `tugas_mandiri`, `UTS`, `UAS`, `nilai_akhir`) VALUES
('1802510040', 'M222222222', '2', 'D222222222', '1', '2020/2021', 100, 85, 90, 95, 95, 93),
('1802510040', 'M222222222', '2', 'D222222222', '2', '2020/2021', 100, 90, 95, 100, 100, 98),
('1802510040', 'M111111111', '2', 'D111111111', '1', '', 100, 85, 95, 85, 85, 89),
('1802510040', 'M111111111', '4', 'D111111111', '2', '', 90, 89, 93, 85, 85, 88),
('1802510040', 'M333333333', '2', 'D333333333', '2', '', 52, 60, 62, 70, 90, 67),
('1802510040', 'M333333333', '2', 'D555555555', '1', '', 90, 95, 85, 98, 90, 92),
('1802510040', 'M222222222', '2', 'D555555555', '2', '', 100, 100, 98, 0, 98, 82);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `kode_prodi` varchar(10) COLLATE utf8_bin NOT NULL,
  `nama_prodi` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`kode_prodi`, `nama_prodi`) VALUES
('86108', 'S2 Pendidikan Agama Islam'),
('86207', 'S1 Pendidikan Islam Anak Usia Dini'),
('86208', 'S1 Pendidikan Agama Islam'),
('86232', 'S1 Pendidikan Guru Madrasah Ibtidaiyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kode_ruangan` varchar(10) COLLATE utf8_bin NOT NULL,
  `keterangan` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kode_ruangan`, `keterangan`) VALUES
('A02', 'Gedung A Nomor 02'),
('A03', 'Gedung A Nomor 03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_jadwal` (`kode_jadwal`),
  ADD KEY `kode_prodi` (`kode_prodi`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`kode_krs`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`NPM`),
  ADD KEY `Prodi` (`prodi`);

--
-- Indeks untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
