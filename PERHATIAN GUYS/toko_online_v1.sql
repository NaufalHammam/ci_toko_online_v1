-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 05:04 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kd_merek` varchar(11) NOT NULL,
  `kd_distributor` varchar(11) NOT NULL,
  `tanggal_masuk` varchar(255) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `stok_barang` int(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nama_barang`, `kd_merek`, `kd_distributor`, `tanggal_masuk`, `harga_barang`, `stok_barang`, `keterangan`) VALUES
(12, 'Buku A3', '16', '7', '2020-11-10', 2500, 150, 'Isi 32 lembar, SIDU'),
(13, 'Pulpen ', '14', '5', '2020-11-09', 2000, 100, 'Pulpen original dari luar negri'),
(14, 'Tipe x', '15', '6', '2020-11-03', 4500, 50, 'Untuk kerjasama dengan pulpen'),
(16, 'Gundam X Standar', '14', '5', '2020-11-01', 1500000, 0, 'Limited Edition');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `kd_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(255) NOT NULL,
  `alamat_distributor` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`kd_distributor`, `nama_distributor`, `alamat_distributor`, `no_telp`) VALUES
(5, 'Biru sang distributor', 'Gn putri selatan', '0899'),
(6, 'Merah sang distributor', 'Kuningan, Luragung landeuh', '0877'),
(7, 'Hijau sang distributor', 'Jauh', '0866');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan_master`
--

CREATE TABLE `tbl_laporan_master` (
  `kd_laporan_master` int(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `waktu_kegiatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan_master`
--

INSERT INTO `tbl_laporan_master` (`kd_laporan_master`, `kd_user`, `kegiatan`, `waktu_kegiatan`) VALUES
(46, '1', 'Menambahkan merek dengan nama merek = Cap anakonda', '2020-11-13 03:23:56'),
(47, '1', 'Menambahkan merek dengan nama merek = Cap pacar', '2020-11-13 03:24:04'),
(48, '1', 'Menambahkan merek dengan nama merek = Cap Semut', '2020-11-13 03:24:15'),
(49, '1', 'Menambahkan distributor dengan nama distributor = Biru sang distributor', '2020-11-13 03:24:48'),
(50, '1', 'Menambahkan distributor dengan nama distributor = Merah sang distributor', '2020-11-13 03:25:26'),
(51, '1', 'Menambahkan distributor dengan nama distributor = Hijau sang distributor', '2020-11-13 03:26:10'),
(52, '1', 'Mengubah isi merek dengan kode merek = 15 yang diubah : Nama merek =Cap Gajah', '2020-11-13 03:26:28'),
(53, '1', 'Menambahkan barang dengan nama barang = Buku A3', '2020-11-13 03:38:43'),
(54, '1', 'Menambahkan barang dengan nama barang = Pulpen ', '2020-11-13 03:40:03'),
(55, '1', 'Menambahkan barang dengan nama barang = Tipe x', '2020-11-13 03:41:19'),
(56, '1', 'Mengubah isi barang dengan kode barang = 12 yang diubah : Nama barang = Buku A3, Kode merek = 16, Kode distributor = 7, Tanggal masuk = 2020-11-10, Harga barang = 2500, Stok barang = 150, Keterangan = si 32 lemb', '2020-11-13 03:42:08'),
(57, '1', 'Menambahkan barang dengan nama barang = ea', '2020-11-13 03:42:36'),
(58, '1', 'Menghapus barang dengan kode barang = 15', '2020-11-13 03:42:45'),
(59, '1', 'Menambahkan barang dengan nama barang = Gundam X Standar', '2020-11-13 03:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan_transaksi`
--

CREATE TABLE `tbl_laporan_transaksi` (
  `kd_laporan_transaksi` int(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `waktu_kegiatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan_transaksi`
--

INSERT INTO `tbl_laporan_transaksi` (`kd_laporan_transaksi`, `kd_user`, `kegiatan`, `waktu_kegiatan`) VALUES
(4, '6', 'Menambahkan transaksi, kode barang = 16, jumlah barang dibeli = 1, total harga = Rp. 1,500,000', '2020-11-13 03:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merek`
--

CREATE TABLE `tbl_merek` (
  `kd_merek` int(11) NOT NULL,
  `nama_merek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_merek`
--

INSERT INTO `tbl_merek` (`kd_merek`, `nama_merek`) VALUES
(14, 'Cap anakonda'),
(15, 'Cap Gajah'),
(16, 'Cap Semut');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `jumlah_beli` int(15) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `tanggal_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kd_transaksi`, `kd_barang`, `kd_user`, `jumlah_beli`, `total_harga`, `tanggal_beli`) VALUES
(16, '16', '6', 1, 1500000, '2020-11-13 03:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_user` int(11) NOT NULL COMMENT '1 = admin, 2 = kasir, 3 = manager',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `nama`, `username`, `password`, `level_user`, `created_at`, `created_by`) VALUES
(1, 'NHA Admin man', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-11-13 03:22:50', 'Moderator'),
(5, 'hapus', '1', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2020-11-13 03:27:58', 'Umhxc2ZDeHlpc1JpYWNIUVdzNG1sZz09 - NHA Admin man'),
(6, 'Kasir man', 'kasir', 'c7911af3adbd12a035b289556d96470a', 2, '2020-11-13 03:36:51', 'Umhxc2ZDeHlpc1JpYWNIUVdzNG1sZz09 - NHA Admin man'),
(7, 'manager man', 'manager', '1d0258c2440a8d19e716292b231e3190', 3, '2020-11-13 03:37:03', 'Umhxc2ZDeHlpc1JpYWNIUVdzNG1sZz09 - NHA Admin man');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`kd_distributor`);

--
-- Indexes for table `tbl_laporan_master`
--
ALTER TABLE `tbl_laporan_master`
  ADD PRIMARY KEY (`kd_laporan_master`);

--
-- Indexes for table `tbl_laporan_transaksi`
--
ALTER TABLE `tbl_laporan_transaksi`
  ADD PRIMARY KEY (`kd_laporan_transaksi`);

--
-- Indexes for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  ADD PRIMARY KEY (`kd_merek`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `kd_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_laporan_master`
--
ALTER TABLE `tbl_laporan_master`
  MODIFY `kd_laporan_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_laporan_transaksi`
--
ALTER TABLE `tbl_laporan_transaksi`
  MODIFY `kd_laporan_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  MODIFY `kd_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
