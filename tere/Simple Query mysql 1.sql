-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220715.346923e20a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2022 pada 18.29
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembeli`
--

CREATE TABLE `data_pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat_pembeli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pembeli`
--

INSERT INTO `data_pembeli` (`id`, `nama_pembeli`, `umur`, `alamat_pembeli`) VALUES
(1, 'Regina', 19, 'Cilacap'),
(2, 'SESI', 16, 'Jakarta'),
(3, 'rini', 20, 'Bekasi'),
(4, 'Tere', 23, 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(8) NOT NULL,
  `id_pembeli` int(8) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `id_pembeli`, `nama_obat`, `jenis_obat`, `stok_obat`) VALUES
(1, 2, 'ANTALGIN', 'SSKIT GIGI', 15),
(2, 1, 'Bodrex', 'Demam', 12),
(3, 3, 'Paracetamol', 'Demam', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(8) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `alamat_pembeli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama_pembeli`, `jumlah_beli`, `alamat_pembeli`) VALUES
(1, 'Tere', 4, 'Jakarta'),
(2, 'Regina', 2, 'Cilacap'),
(3, 'SESI', 3, 'Jakarta'),
(4, 'rini', 2, 'Bekasi'),
(5, 'Cika', 3, 'Bogor'),
(6, 'Tisa', 3, 'Cilacap'),
(7, 'Andri', 3, 'Bogor'),
(8, 'ARDI', 3, 'Cilacap'),
(9, 'Fari', 6, 'Jogja'),
(10, 'Andi', 2, 'Bekasi'),
(11, 'Beti', 4, 'Cilacap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_pembeli` int(11) NOT NULL,
  `nama_penjual` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_pembeli`, `nama_penjual`, `tanggal_transaksi`) VALUES
(1, 'Ratih', '2022-07-18'),
(2, 'Ani', '2022-07-01'),
(3, 'Rika', '2022-07-04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pembeli`
--
ALTER TABLE `data_pembeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_pembeli` (`alamat_pembeli`),
  ADD KEY `nama_pembeli` (`nama_pembeli`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_pembeli` (`nama_pembeli`),
  ADD KEY `alamat_pembeli` (`alamat_pembeli`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pembeli`
--
ALTER TABLE `data_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pembeli`
--
ALTER TABLE `data_pembeli`
  ADD CONSTRAINT `data_pembeli_ibfk_2` FOREIGN KEY (`alamat_pembeli`) REFERENCES `pembeli` (`alamat_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pembeli_ibfk_3` FOREIGN KEY (`nama_pembeli`) REFERENCES `pembeli` (`nama_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
