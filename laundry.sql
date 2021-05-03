-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 01:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` char(4) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `gaji_perbulan` int(11) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `tgl_berhenti` date NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nama_karyawan`, `jeniskelamin`, `alamat`, `no_hp`, `gaji_perbulan`, `tgl_bergabung`, `tgl_berhenti`, `aktif`) VALUES
('K000', 'Rindu', 'Perempuan', 'Padang', '081243548777', 0, '2018-01-01', '0000-00-00', 2),
('K001', 'Indah Permata', 'Perempuan', 'Padang', '08123456792', 1300000, '2018-02-01', '2019-02-28', 0),
('K002', 'Ayu Kharisma', 'Perempuan', 'Padang', '087840927394', 1300000, '2018-01-15', '2019-10-31', 0),
('K003', 'Budi Haryanto', 'Laki-Laki', 'Padang', '08128349834', 1200000, '2019-06-10', '2020-03-09', 0),
('K004', 'Lilis Permata', 'Perempuan', 'Padang', '08122334458', 1250000, '2020-02-03', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` char(4) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama_pelanggan`, `jeniskelamin`, `alamat`, `no_hp`) VALUES
('P001', 'Intan Haryati', 'Perempuan', 'Padang', '081243568387'),
('P002', 'Ahmad Arif', 'Laki-Laki', 'Padang', '08234454345'),
('P003', 'Nursyahrina', 'Perempuan', 'Padang', '082284003073'),
('P004', 'Maysarah', 'Perempuan', 'Padang', '082282553856'),
('P005', 'Abdul Karim', 'Laki-Laki', 'Padang', '08236749827'),
('P006', 'Shinta Pratiwi', 'Perempuan', 'Padang', '085634872555'),
('P007', 'Muhammad Zuhdi', 'Laki-Laki', 'Padang', '085544338866');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `pengeluaran_id` varchar(14) NOT NULL,
  `total` int(11) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `karyawan_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`pengeluaran_id`, `total`, `detail`, `tgl_pengeluaran`, `karyawan_id`) VALUES
('20210130093105', 125000, 'Beli Bahan', '2021-01-01', 'K004'),
('20210130104609', 1250000, 'Pembayaran Gaji Karyawan January 2021', '2021-01-30', 'K000'),
('20210130110802', 500000, 'Bayar Listrik', '2021-01-15', 'K004');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` varchar(14) NOT NULL,
  `pelanggan_id` char(7) NOT NULL,
  `karyawan_id` char(6) NOT NULL,
  `berat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `pelanggan_id`, `karyawan_id`, `berat`, `total`, `tgl_order`, `tgl_selesai`) VALUES
('20210130151203', 'P001', 'K004', 10, 70000, '2021-01-01', '2021-01-03'),
('20210130151243', 'P002', 'K004', 15, 105000, '2021-01-01', '2021-01-04'),
('20210130151304', 'P003', 'K004', 15, 105000, '2021-01-02', '2021-01-04'),
('20210130151345', 'P004', 'K004', 20, 140000, '2021-01-02', '2021-01-05'),
('20210130164704', 'P002', 'K004', 25, 175000, '2021-01-05', '2021-01-08'),
('20210130164722', 'P005', 'K004', 25, 175000, '2021-01-07', '2021-01-09'),
('20210130164748', 'P003', 'K004', 18, 126000, '2021-01-08', '2021-01-10'),
('20210130164804', 'P001', 'K004', 19, 133000, '2021-01-10', '2021-01-12'),
('20210130164821', 'P004', 'K004', 20, 140000, '2021-01-11', '2021-01-13'),
('20210130164855', 'P003', 'K004', 22, 154000, '2021-01-13', '2021-01-15'),
('20210130164918', 'P002', 'K004', 18, 126000, '2021-01-16', '2021-01-18'),
('20210130170149', 'P005', 'K004', 15, 105000, '2021-01-17', '2021-01-19'),
('20210130170220', 'P001', 'K004', 8, 56000, '2021-01-17', '2021-01-20'),
('20210130170251', 'P004', 'K004', 18, 126000, '2021-01-20', '2021-01-22'),
('20210130170310', 'P003', 'K004', 12, 84000, '2021-01-21', '2021-01-23'),
('20210130171108', 'P006', 'K004', 20, 140000, '2021-01-21', '2021-01-23'),
('20210130171129', 'P007', 'K004', 18, 126000, '2021-01-22', '2021-01-24'),
('20210130171209', 'P005', 'K004', 17, 119000, '2021-01-23', '2021-01-25'),
('20210130171253', 'P002', 'K004', 19, 133000, '2021-01-24', '2021-01-26'),
('20210130171310', 'P004', 'K004', 20, 140000, '2021-01-25', '2021-01-27'),
('20210130171348', 'P001', 'K004', 17, 119000, '2021-01-26', '2021-01-28'),
('20210130171433', 'P006', 'K004', 8, 56000, '2021-01-26', '2021-01-28'),
('20210130171537', 'P003', 'K004', 15, 105000, '2021-01-27', '2021-01-29'),
('20210130171617', 'P007', 'K004', 10, 70000, '2021-01-27', '2021-01-29'),
('20210130171846', 'P005', 'K004', 18, 126000, '2021-01-28', '0000-00-00'),
('20210130172114', 'P004', 'K004', 15, 105000, '2021-01-29', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(4) NOT NULL,
  `namauser` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `namauser`, `username`, `password`, `level`) VALUES
('U001', 'Rindu', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superuser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
