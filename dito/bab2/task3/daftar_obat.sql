-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2022 pada 12.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `expired` date NOT NULL,
  `anjuran_pemakaian` text NOT NULL,
  `stock` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_obat`
--

INSERT INTO `daftar_obat` (`id`, `nama_obat`, `expired`, `anjuran_pemakaian`, `stock`) VALUES
(1, 'komix', '2025-08-05', 'sehari 2x 30 menit setelah makan', '125'),
(2, 'bodrexin', '2023-08-16', 'sehari 2x setelah makan', '355'),
(3, 'panadol', '2026-08-21', '1x sehari sebelum tidur', '200'),
(4, 'proris ibuprofen', '2024-08-03', '2x sehari sebelum dan sesudah tidur', '100'),
(5, 'antihistamin', '2027-08-09', '3x sehari setelah makan', '40'),
(6, 'mylanta', '2026-08-29', '2x sehari sebelum makan', '150'),
(7, 'mycoral', '2030-08-15', 'oleskan setelah mandi', '30'),
(8, 'bronkodilator', '2026-08-01', '1x sehari', '17'),
(9, 'betadine', '2031-08-20', 'teteskan ke permukaan yang luka', '45'),
(10, 'kolton', '2025-08-29', '1 hari sekali setelah makan', '23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_obat`
--
ALTER TABLE `daftar_obat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
