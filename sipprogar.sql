-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Nov 2020 pada 09.23
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipprogar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'BAGRENPROGGAR SETDITAJENAD'),
(2, 'BAGTU SETDITAJENAD'),
(3, 'BAGLOG SETDITAJENAD'),
(5, 'BAGTER SETDITAJENAD'),
(6, 'BAGURDAL SETDITAJENAD'),
(7, 'BAGPERS SETDITAJENAD'),
(8, 'BAGPAM SETDITAJENAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_progress`
--

CREATE TABLE `tbl_progress` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `dana` float NOT NULL,
  `progress` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jabatan` int(20) NOT NULL,
  `isValid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id_task` int(11) NOT NULL,
  `nama_task` varchar(255) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `biaya` float NOT NULL,
  `digunakan` float NOT NULL,
  `sisa` float NOT NULL,
  `progress` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `nip` int(20) NOT NULL,
  `nrp` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `pangkat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdDtm` date NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDtm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`nip`, `nrp`, `nama`, `email`, `mobile`, `roleId`, `pangkat`, `jabatan`, `id_jabatan`, `password`, `isDeleted`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(19721117, '197211171994032004', 'Perwitasari', 'perwitasariwijaya@gmail.com', '081321347579', 1, 'Penata Tk I III/d', 'Kaur Sunproggar Bagrenproggar Setditajenad', 1, '$2y$10$uVRjxjI/uotkTzq9flRFG.VMlvMDc2fg/KARqG2SGdr8hb3jUvpWe', 0, '2020-11-25', 123, '2020-11-25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tbl_progress`
--
ALTER TABLE `tbl_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indeks untuk tabel `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_progress`
--
ALTER TABLE `tbl_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
