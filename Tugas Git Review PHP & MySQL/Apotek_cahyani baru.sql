-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2022 pada 02.49
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
-- Struktur dari tabel `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id` int(11) NOT NULL,
  `tanggal_join` date DEFAULT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlpn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_supplier`
--

INSERT INTO `data_supplier` (`id`, `tanggal_join`, `nama_perusahaan`, `alamat`, `penanggung_jawab`, `jabatan`, `email`, `no_tlpn`) VALUES
(1, '2022-07-30', 'PT Abbot Indonesia', 'Wisma Pondok Indah 2, Suite 1000. Jl. Sultan Iskandar Muda Kav.V – TA Pondok Indah, Jakarta 12310. Indonesia Phone : 021-27587888, website : https://abbott.co.id', 'Aditya Pratama', 'Manager', 'hallo@abbotindonesia.com', '0217899989'),
(2, '2022-07-30', 'PT Aditama Raya Farmindo', 'Jl. Rungkut Industri, Kali Rungkut, Rungkut, Kota SBY, Jawa Timur 60293, Indonesia\r\nTelepon: +62 31 8412497', 'Deby Suitno', 'Manager', 'admin@aditamaraya.com', '0214555473'),
(4, '2022-07-30', 'PT Afiat', 'Jl. Mahar Martanegara No. 138, Cimindi, Jawa Barat 40522, Indonesia Telepon:+62226613339 Website :www.ptafiat.com', 'Yosi Komuraji', 'Direktur', 'hallo@ptafiat.com', '0215233652'),
(5, '2022-07-30', 'PT Afifarma', 'Jalan Mauni Industri No.8 Kediri, Jawa Timur 64131 Telp: (0354) 683675-683679 Fax : (0354) 687292 atau 683679', 'Inda Permata Sari', 'Manager', 'admin@afifarma.com', '0218854558'),
(6, '2022-07-30', 'PT. Actavis Indonesia', 'Jl Raya Jakarta Bogor Km 28 Jakarta 13710\r\nPO Box 1044/JAT JAKARTA – 13010\r\nTelp: 021-8710311 Fax: 021-8710044, 8711382', 'Puput Indah Sari', 'Manager', 'info_id@actavis.com', '0215488688'),
(7, '2022-07-31', 'PT Apex Pharma Indonesia', 'Menara Batavia Lt 22\r\nJl KH Masyur Kav 126 JAKARTA – 10220\r\nTelp: 021-5746695 Fax: 021-5724515\r\nPabrik: Jl. Raya Serang Km. 11,5 Ds. Bunder Cikupa Tangerang 15710\r\nTelp: 021-5960339, 5960340 Fax: 021-5960341', 'Lamran Lakudi', 'Manager', 'admin@apexfarma.id', '0213326588'),
(8, '2022-07-31', 'PT ASTA Medica, Transfarma Medica Indah', 'Wisma Pondok Indah Lt 4\r\nJl Sultan Iskandar Muda Blok V-TA Pondok Indah JAKARTA – 12310\r\nTelp: 021-7697323 Fax:021-7697328', 'Lusiana Make', 'Direktur', 'halo@astamedic.com', '0214587696'),
(9, '2022-07-31', 'PT AstraZeneca Indonesia', 'Siemens Lt.3 Kav 88, Jl. T. B. Simatupang, Kebagusan, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12520, Indonesia\r\nTelp: 021-78835777\r\nPabrik: Jl. Raya Kasrie 110, Pandaan 67156 Jawa Timur Telp: 0343-631761', 'Konyun Vishu', 'Direktur', 'info@astrazeneca.co.id', '0218577361'),
(10, '2022-07-31', 'PT Bayer Indonesia Tbk', 'Mid Plaza I Lt 14 Jl Jenderal Sudirman Kav. 10-11\r\nJAKARTA – 10220 PO BOX 3098/Jakarta 10002\r\nTelp.: 021-5703661 Fax.: 021-5700591\r\nPabrik: Jl. Raya Jakarta-Bogor Km. 38 Jakarta\r\nTelp.: 021-8710421-425', 'Vroy Ahmad Zailani', 'Manager', 'info@buyerindonesia.com', '0218889633'),
(11, '2022-07-29', 'PT. Medica Abadi', 'Jl. Janti Gg. Puntodewo No.167 Banguntapan, Bantul, D.I. Yogyakarta, 00000', 'Alex Robinhas', 'Direktur', 'info@medicabadi.com', '0215569996');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_karyawan`
--

CREATE TABLE `detail_karyawan` (
  `id` int(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Buddha','Hindu') NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_karyawan`
--

INSERT INTO `detail_karyawan` (`id`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `pendidikan`, `email`, `no_telpon`) VALUES
(1, 'Randangan', '1997-06-05', 'Islam', 'Jl. Trans Sulawesi', 'SMK Kesehatan Muhammadiyah Randangan', 'nasrunhabu567@gmail.com', '081288639586'),
(2, 'Manado', '1997-07-07', 'Kristen', 'Jl. Trans Sulawesi', 'SMK Akuntansi', 'taufikpratama@gmail.com', '081288568856'),
(3, 'Buntulia', '1998-02-26', 'Islam', 'Jl. Trans Sulawesi', 'S1 Komputer', 'ittovanhar@gmail.com', '081355689982');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transasksi`
--

CREATE TABLE `detail_transasksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transasksi`
--

INSERT INTO `detail_transasksi` (`id`, `id_transaksi`, `nama_obat`, `jumlah`, `harga`) VALUES
(1, 1, 'DULCOLAX', 6, 12000),
(2, 2, 'PANADOL', 12, 24000),
(3, 1, 'PARAMEX', 10, 20000),
(4, 1, 'PANADOL', 3, 6000),
(5, 2, 'BODREX', 3, 15000),
(6, 3, 'BODREX', 1, 2000),
(7, 3, 'DULCOLAX', 3, 6000),
(8, 3, 'PARAMEX', 7, 14000),
(9, 4, 'DULCOLAX', 15, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(11) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `kode_faktur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `tanggal_masuk`, `nama_perusahaan`, `kode_faktur`) VALUES
(1, '2022-07-31', 'PT. Actavis Indonesia', 'aci11001'),
(2, '2022-07-31', 'PT Abbot Indonesia', 'ai12001'),
(3, '2022-07-31', 'PT Bayer Indonesia Tbk', 'byr14001'),
(4, '2022-07-31', 'PT AstraZeneca Indonesia', 'AZ13001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_obat`
--

CREATE TABLE `faktur_obat` (
  `id` int(11) NOT NULL,
  `id_faktur` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur_obat`
--

INSERT INTO `faktur_obat` (`id`, `id_faktur`, `id_obat`) VALUES
(1, 1, 3),
(2, 1, 2),
(3, 1, 4),
(4, 1, 1),
(5, 3, 4),
(6, 3, 3),
(7, 4, 4),
(8, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `Jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `Jabatan`) VALUES
(1, 'Nasrun Habu', 'Crew Store'),
(2, 'Taufik Pratama', 'Assistant Manager'),
(3, 'Itto Van Hoten', 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `kode_obat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `kode_obat`) VALUES
(1, 'PANADOL', 'PND11'),
(2, 'PARAMEX', 'PRX11'),
(3, 'DULCOLAX', 'DLX20'),
(4, 'BODREX', 'BDX11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Buddha','Hindu') NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlpn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `tanggal_lahir`, `agama`, `alamat`, `email`, `no_tlpn`) VALUES
(1, 'Julia', '1989-07-13', 'Kristen', 'Marisa', '', '081233211233'),
(2, 'Parman', '1991-02-19', 'Buddha', 'Jakarta', '', '081245666588'),
(3, 'Alex', '1995-02-03', 'Kristen', 'Manado', '', '085218787899'),
(4, 'Tiara', '1987-07-12', 'Hindu', 'Palembang', '', '081355669882'),
(5, 'Qotrun Nada Gobel', '1949-02-16', 'Islam', 'Gorontalo', '', '081222566983'),
(6, 'Deby lusiana', '1970-09-10', 'Kristen', 'Gorontalo', '', '085213256656'),
(7, 'Sandi Deluma', '1988-09-04', 'Islam', 'Gorontalo', '', '081212558666'),
(8, 'Habri', '1985-12-23', 'Islam', 'Gorontalo', '', '085266988951'),
(9, 'Cinta Laraki', '1998-06-03', 'Kristen', 'Jakarta', '', '085366986690'),
(10, 'Kristian', '1997-06-05', 'Kristen', 'Manado', '', '081222545583');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_transaksi`, `nama_karyawan`, `nama_pelanggan`) VALUES
(1, '2022-07-31', 'Nasrun Habu', 'Habri'),
(2, '2022-07-31', 'Nasrun Habu', 'Sandi Deluma'),
(3, '2022-07-31', 'Nasrun Habu', 'Julia'),
(4, '2022-07-31', 'Nasrun Habu', 'Parman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_pelanggan` (`nama_perusahaan`);

--
-- Indeks untuk tabel `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transasksi`
--
ALTER TABLE `detail_transasksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idtransaksi` (`id_transaksi`),
  ADD KEY `fk_nmobat` (`nama_obat`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `fk_nmperusahaan` (`nama_perusahaan`);

--
-- Indeks untuk tabel `faktur_obat`
--
ALTER TABLE `faktur_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idfaktur` (`id_faktur`),
  ADD KEY `fk_idobat` (`id_obat`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `nama_karyawan` (`nama_karyawan`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_pelanggan` (`nama_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nmkaryawan` (`nama_karyawan`),
  ADD KEY `fk_nmpelanggan` (`nama_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_supplier`
--
ALTER TABLE `data_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_transasksi`
--
ALTER TABLE `detail_transasksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `faktur_obat`
--
ALTER TABLE `faktur_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transasksi`
--
ALTER TABLE `detail_transasksi`
  ADD CONSTRAINT `fk_idtransaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `fk_nmobat` FOREIGN KEY (`nama_obat`) REFERENCES `obat` (`nama_obat`);

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `fk_nmperusahaan` FOREIGN KEY (`nama_perusahaan`) REFERENCES `data_supplier` (`nama_perusahaan`);

--
-- Ketidakleluasaan untuk tabel `faktur_obat`
--
ALTER TABLE `faktur_obat`
  ADD CONSTRAINT `fk_idfaktur` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`),
  ADD CONSTRAINT `fk_idobat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_detail` FOREIGN KEY (`id_karyawan`) REFERENCES `detail_karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_nmkaryawan` FOREIGN KEY (`nama_karyawan`) REFERENCES `karyawan` (`nama_karyawan`),
  ADD CONSTRAINT `fk_nmpelanggan` FOREIGN KEY (`nama_pelanggan`) REFERENCES `pelanggan` (`nama_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
