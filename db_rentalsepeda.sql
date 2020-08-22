-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2020 pada 15.14
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rentalsepeda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsepeda`
--

CREATE TABLE `tbsepeda` (
  `id` int(20) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `hargasewa` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbsepeda`
--

INSERT INTO `tbsepeda` (`id`, `kode`, `merk`, `jenis`, `warna`, `hargasewa`, `image`) VALUES
(1, '001', 'polygon', 'standart', 'putih', 5, '1598102056.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `id` int(20) NOT NULL,
  `kodenota` varchar(100) NOT NULL,
  `noktp` varchar(100) NOT NULL,
  `kodesepeda` varchar(100) NOT NULL,
  `tanggaltransaksi` varchar(100) NOT NULL,
  `jumlahhari` int(20) NOT NULL,
  `totalbayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(20) NOT NULL,
  `noktp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `roleuser` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id`, `noktp`, `email`, `password`, `nama`, `nohp`, `alamat`, `roleuser`) VALUES
(1, '03314709382', 'admin@email.com', '$2y$10$FiJfKMBU1TeyljPGm7Jny.mrSsGQoH7cmKK9FDezjTQXyZv.p3v5e', 'Admin', '08546879132', 'Kudus', 1),
(2, '03317832834', 'tono@gmail.com', '$2y$10$8u5ULkMzlIXZKMdRd9F0aubyNx.E2RJEH8WoksUmSSnSgV6PLBKhu', 'Tono Paijo', '08547578387', 'Kudus', 2),
(3, '03317746375', 'budi@gmail.com', '$2y$10$yA6F6psIaLeR5BZ9DkvomOH3Ro0DzVkZJifMl2qMGIYbmgaX8Xm9q', 'Budi Budiman', '08548476352', 'Jepara', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbsepeda`
--
ALTER TABLE `tbsepeda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbsepeda`
--
ALTER TABLE `tbsepeda`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
