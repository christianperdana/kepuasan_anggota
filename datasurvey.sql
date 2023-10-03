-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2022 pada 10.03
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datasurvey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `id_super` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `super_admin`
--

INSERT INTO `super_admin` (`id_super`, `username`, `password`) VALUES
(1, 'superadmin', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `TP` varchar(255) NOT NULL,
  `pelayanan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `kepuasan` varchar(20) NOT NULL,
  `saran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`id_user`, `nama`, `TP`, `pelayanan`, `tanggal`, `kepuasan`, `saran`) VALUES
(1, 'nyamuk jail', 'singkawang', 'Teller', '2022-08-11', 'Puas', 'fgujeuj'),
(5, 'nyamuk jail', 'singkawang', 'Teller', '2022-08-11', 'Puas', 'dgagag'),
(6, 'nyamuk jail', 'singkawang', 'Pelayanan Pinjaman', '2022-08-11', 'Sangat Puas', 'terlalu pintar'),
(7, 'kutil kuda', 'magelangan', 'Member Service', '2022-08-11', 'Sangat Puas', 'anget - anget enak tenan'),
(8, 'ssss', 'magelangan', 'Teller', '2022-08-25', 'Tidak Puas', ''),
(9, 'kutil kuda', 'brambangan', 'Member Service', '2022-08-25', 'Tidak Puas', 'sfastqgagasewaegfqegqy2w 26326 etwtw w'),
(10, 'sepeda ontel', 'singkawang', 'Teller', '2022-08-25', 'Sangat Puas', 'etwetqfgasdgw'),
(11, '2et2', '4t2t2', 'Teller', '2022-08-25', 'Sangat Puas', 'sfagsc srwdg w');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'phany', 'cubonaventura1'),
(17, 'nasi padang', 'tambahrendang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id_super`);

--
-- Indeks untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id_super` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `survey`
--
ALTER TABLE `survey`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
