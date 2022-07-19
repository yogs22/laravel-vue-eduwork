-- phpMyAdmin SQL Dump 
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2022 pada 08.38
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_penjualan`
--

CREATE TABLE `faktur_penjualan` (
  `no` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` char(10) NOT NULL,
  `total` char(11) NOT NULL,
  `pajak` char(11) NOT NULL,
  `total_bayar` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faktur_penjualan`
--

INSERT INTO `faktur_penjualan` (`no`, `tanggal`, `id_pelanggan`, `id_karyawan`, `id_obat`, `jumlah`, `total`, `pajak`, `total_bayar`) VALUES
(1, '2022-07-04 16:16:00', 1, 1, 1, '2', '3800', '380', '4180'),
(2, '2022-07-05 09:22:09', 2, 2, 2, '1', '3500', '350', '3850'),
(3, '2022-07-06 07:18:00', 3, 3, 3, '1', '13000', '1300', '14300'),
(4, '2022-07-07 11:10:00', 4, 4, 4, '50', '300000', '30000', '330000'),
(5, '2022-07-08 19:23:15', 5, 5, 5, '10', '144400', '14440', '158840'),
(6, '2022-07-09 17:14:00', 6, 6, 6, '20', '300000', '30000', '330000'),
(7, '2022-07-10 19:22:00', 7, 7, 7, '1', '34299', '3429', '37728'),
(8, '2022-07-11 15:24:09', 8, 8, 8, '20', '7000', '700', '7700'),
(9, '2022-07-12 10:03:00', 9, 9, 9, '1', '30377', '3038', '33457'),
(10, '2022-07-14 14:15:00', 10, 10, 10, '3', '135000', '13500', '148500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_supply`
--

CREATE TABLE `faktur_supply` (
  `no` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_obat` varchar(20) NOT NULL,
  `total` varchar(12) NOT NULL,
  `pajak` varchar(12) NOT NULL,
  `total_bayar` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faktur_supply`
--

INSERT INTO `faktur_supply` (`no`, `tanggal`, `id_karyawan`, `id_supplier`, `id_obat`, `jumlah_obat`, `total`, `pajak`, `total_bayar`) VALUES
(1, '2022-07-15 10:15:07', 1, 1, 1, '55', '83600', '8360', '91960'),
(2, '2022-07-14 13:12:21', 2, 2, 2, '20', '56000', '5600', '61600'),
(3, '2022-07-13 10:46:13', 3, 3, 3, '100', '960000', '96000', '1056000'),
(4, '2022-07-12 13:55:19', 4, 4, 4, '25', '112500', '11250', '123750'),
(5, '2022-07-11 11:05:21', 5, 5, 5, '90', '974700', '97470', '1072170'),
(6, '2022-07-08 09:34:36', 6, 6, 6, '50', '562500', '56250', '618750'),
(7, '2022-07-07 08:10:00', 7, 7, 7, '70', '1800750', '180075', '1980825'),
(8, '2022-07-06 10:23:00', 8, 8, 8, '100', '26250', '2625', '28875'),
(9, '2022-07-05 10:12:00', 9, 9, 9, '150', '3414375', '341437', '3755813'),
(10, '2022-07-04 13:16:00', 10, 10, 10, '150', '5062500', '506250', '5568750');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_telepon` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `alamat`, `kota`, `status`, `no_telepon`) VALUES
(1, 'Fauzi Nurdiansyah', 'Rusunami Bandar Kemayoran', 'Jakarta Utara', 'Jomblo', '085712345678'),
(2, 'Faizin Nurdiansyah', 'Purwokerto', 'Purwokerto', 'Belum Menikah', '0812789456123'),
(3, 'Nasrun', 'Sleman', 'Yogyakarta', 'Belum Menikah', ''),
(4, 'Sabar', 'Cikarang', 'Bekasi', 'Belum Menikah', NULL),
(5, 'Melisa', 'Sukatani', 'Bekasi', 'Belum Menikah', NULL),
(6, 'Rohman', 'Cikarang', 'Bekasi', 'Menikah', NULL),
(7, 'Isna', 'Cikarang', 'Bekasi', 'Menikah', NULL),
(8, 'Aryo', 'Banjarnegara', 'Banjarnegara', 'Belum Menikah', NULL),
(9, 'Fitria', 'Pulo Kapuk', 'Bekasi', 'Belum Menikah', '083143218765'),
(10, 'Euis', 'Cipanas', 'Bandung', 'Belum Menikah', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `harga` int(7) NOT NULL,
  `stock` varchar(10) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `harga`, `stock`, `id_supplier`) VALUES
(1, 'Paracetamol 500 Mg', 'Analgesik', 1900, '200', 1),
(2, 'Dexametashone 0,5 mg', 'Kortikosteroid', 3500, '300', 2),
(3, 'OBH', 'Obat Bebas Terbatas', 13000, '57', 3),
(4, 'Antalgin', 'analgesik', 6000, '225', 4),
(5, 'Kalpanax', 'Obat Anti Jamur', 14440, '44', 5),
(6, 'Antasida 100 mg', 'OTC', 15000, '98', 6),
(7, 'Chlorpheniramine Inframind 4mg', 'Antihistamin', 34299, '20', 7),
(8, 'Piroxicam 20 mg', 'NSAID', 349, '150', 8),
(9, 'Zegavit', 'Obat Bebas', 30377, '50', 9),
(10, 'Omeheart', 'Suplemen', 45000, '33', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `jenis_kelamin`, `pekerjaan`) VALUES
(1, 'Eko', 'Kelapa Gading, Jakarta Utara', 'Laki-Laki', 'Pegawai Swasta'),
(2, 'Dwi', 'Cikarang', 'Perempuan', 'Pegawai Swasta'),
(3, 'Tri', 'Cikarang', 'Perempuan', 'Pegawai Swasta'),
(4, 'Kuadra', 'Bekasi', 'Laki-laki', 'Wiraswasta'),
(5, 'Panca', 'Jakarta Selatan', 'Perempuan', 'Gamers'),
(6, 'Hapta', 'Jakarta Utara', 'Laki-laki', ''),
(7, 'Hexa', 'Cikarang', 'Perempuan', 'Ibu rumah tangga'),
(8, 'Okta', 'Cibitung', 'Permpuan', 'Pegawai Swasta'),
(9, 'Ayu', 'Bogor', 'Perempuan', 'Staff Tata Usaha'),
(10, 'Juju', 'Pemalang', 'Laki-laki', 'Freelance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telepon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `kota`, `no_telepon`) VALUES
(1, 'Kimia Farma', 'Pasar Baru, Jakarta Pusat', 'DKI Jakarta', '0812112112111'),
(2, 'Sanbe Farma', 'Jl. Rawa Gelam IV, RW.9, Jatinegara, Kec. Cakung', 'Jakarta Timur', '081311311311'),
(3, 'Dexa Medica', 'Jl Raya Gading Bukit Indah No.8, RT.18/RW.8', 'Jakarta Utara', '0819119111911'),
(4, 'Pharos Indonesia', 'Jl. Tawes, RT.5/RW.8, Tj. Priok, Kec. Tj. Priok', 'Jakarta Utara', '082121212121'),
(5, 'Tempo Scan Pacific', 'Jl. HR. Rasuna Said Kav. 11, RT.7/RW.2, Kuningan', 'Jakarta Selatan', '083131313131'),
(6, 'Kalbe Farma', 'Kawasan Industri Pulogadung, Jl. Rawagatel Blok 3S', 'Jakarta Timur', '085712345678'),
(7, 'Novell Pharm', 'Jl. Raya Pos Pengumben Raya No.8, RT.5/RW.5', 'Jakarta Barat', '081234234234'),
(8, 'Fahrenheit', 'Jl. Jeruk Raya No.1, RT.006/RW.021, Harapan Baru', 'Bekasi', '083987654321'),
(9, 'Sanofi-Afentis', 'Pulo Mas Timur K, RT.3/RW.12, Kayu Putih', 'Jakarta Timur', '087712345678'),
(10, 'Soho', 'Jl. Pulogadung No.6, RW.3, Rw. Terate, Kec. Cakung', 'Jakarta Timur', '089895674321');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_id_karyawan_fp` (`id_karyawan`);

--
-- Indeks untuk tabel `faktur_supply`
--
ALTER TABLE `faktur_supply`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_obat_supply` (`id_obat`),
  ADD KEY `fk_karyawan` (`id_karyawan`),
  ADD KEY `fk_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `faktur_supply`
--
ALTER TABLE `faktur_supply`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD CONSTRAINT `fk_id_karyawan_fp` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `faktur_supply`
--
ALTER TABLE `faktur_supply`
  ADD CONSTRAINT `fk_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `fk_obat_supply` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
