-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 11.11
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_cahyani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailkaryawan`
--

CREATE TABLE `tb_detailkaryawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `domisili` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_tlpn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detailkaryawan`
--

INSERT INTO `tb_detailkaryawan` (`id_karyawan`, `tempat_lahir`, `tanggal_lahir`, `domisili`, `agama`, `pendidikan_terakhir`, `email`, `no_tlpn`) VALUES
('022101', 'Randangan', '1997-06-05', 'Jl. Trans Sulawesi Desa Buntulia', 'Islam', 'SMK Kesehatan', 'nasrunhabu567@gmail.com', '081288639586'),
('022102', 'Manado', '1997-06-09', 'Jl. Trans Sulawesi, Desa Marisa', 'kristen', 'SMK Teknik', NULL, '081384507337');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `detail_karyawan` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`detail_karyawan`, `id`, `nama`, `jabatan`) VALUES
('022101', '22101', 'Nasrun Habu', 'Crew Stroe'),
('022102', '22102', 'Muhammad Taufik Pratama', 'Assisten Manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detailkaryawan`
--
ALTER TABLE `tb_detailkaryawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_detailkaryawan` (`detail_karyawan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `fk_tb_detailkaryawan` FOREIGN KEY (`detail_karyawan`) REFERENCES `tb_detailkaryawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
