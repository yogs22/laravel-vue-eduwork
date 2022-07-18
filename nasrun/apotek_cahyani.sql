-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 12.33
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
-- Struktur dari tabel `detail_karyawan`
--

CREATE TABLE `detail_karyawan` (
  `id` int(11) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlpn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(10) NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `pengirim` varchar(32) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kode_satuan` varchar(10) NOT NULL,
  `tanggal pengiriman` date NOT NULL,
  `tanggal terima` date NOT NULL,
  `penerima` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(32) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `detail_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlpn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kode_satuan` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `active` varchar(10) NOT NULL,
  `expired` date NOT NULL,
  `no_faktur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `penanggung_jawab` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlpn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(32) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `status_barang` varchar(20) NOT NULL,
  `active` varchar(20) NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD UNIQUE KEY `kode_satuan` (`kode_satuan`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`),
  ADD UNIQUE KEY `no_faktur` (`no_faktur`),
  ADD KEY `fk_nama_perusahaan` (`perusahaan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `fk_detailkaryawan` (`detail_karyawan`),
  ADD KEY `nama_karyawan` (`nama_karyawan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_pelanggan` (`nama_pelanggan`);

--
-- Indeks untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`),
  ADD UNIQUE KEY `active` (`active`),
  ADD KEY `fk_kode_brng` (`kode_barang`),
  ADD KEY `fk_kode_satuan` (`kode_satuan`),
  ADD KEY `fk_nama_brng` (`nama_barang`),
  ADD KEY `fk_no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_perusahaan` (`nama_perusahaan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_namakaryawan` (`nama_karyawan`),
  ADD KEY `fk_idpelanggan` (`id_pelanggan`),
  ADD KEY `fk_nama_pelanggan` (`nama_pelanggan`),
  ADD KEY `fk_nm_barang` (`nama_barang`),
  ADD KEY `fk_status` (`status_barang`),
  ADD KEY `fk_active` (`active`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `fk_nama_perusahaan` FOREIGN KEY (`perusahaan`) REFERENCES `suplier` (`nama_perusahaan`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_detailkaryawan` FOREIGN KEY (`detail_karyawan`) REFERENCES `detail_karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD CONSTRAINT `fk_kode_brng` FOREIGN KEY (`kode_barang`) REFERENCES `faktur` (`kode_barang`),
  ADD CONSTRAINT `fk_kode_satuan` FOREIGN KEY (`kode_satuan`) REFERENCES `faktur` (`kode_satuan`),
  ADD CONSTRAINT `fk_nama_brng` FOREIGN KEY (`nama_barang`) REFERENCES `faktur` (`nama_barang`),
  ADD CONSTRAINT `fk_no_faktur` FOREIGN KEY (`no_faktur`) REFERENCES `faktur` (`no_faktur`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_active` FOREIGN KEY (`active`) REFERENCES `stok_obat` (`active`),
  ADD CONSTRAINT `fk_idpelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `fk_nama_barang` FOREIGN KEY (`nama_barang`) REFERENCES `barang` (`nama_barang`),
  ADD CONSTRAINT `fk_nama_pelanggan` FOREIGN KEY (`nama_pelanggan`) REFERENCES `pelanggan` (`nama_pelanggan`),
  ADD CONSTRAINT `fk_namakaryawan` FOREIGN KEY (`nama_karyawan`) REFERENCES `karyawan` (`nama_karyawan`),
  ADD CONSTRAINT `fk_nm_barang` FOREIGN KEY (`nama_barang`) REFERENCES `stok_obat` (`nama_barang`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_barang`) REFERENCES `stok_obat` (`status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
