-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 08:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'Alfarez', '1234', 'Alfarez'),
(2, 'Kevin', '1234', 'Kevin'),
(3, 'Diaz', '1234', 'Diaz');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `kode_departemen` varchar(45) NOT NULL,
  `nama_departemen` varchar(45) NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`kode_departemen`, `nama_departemen`, `jumlah_karyawan`) VALUES
('A16', 'Accounting', 15),
('G20', 'General Affairs', 6),
('H11', 'HRD', 1),
('I19', 'IT ', 3),
('P10', 'Production', 15),
('P13', 'Purchasing', 111),
('P21', 'PPIC ', 11),
('Q12', 'Quality Assurance', 50),
('S14', ' Sales & Marketing', 50),
('W17', 'Warehouse', 7);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` varchar(45) NOT NULL,
  `nama_jabatanfk` varchar(45) NOT NULL,
  `jumlah_gaji` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `nama_jabatanfk`, `jumlah_gaji`) VALUES
('1', 'Direksi', 90000),
('2', 'Direktur Utama', 70000),
('3', 'Direktur', 50000),
('4', 'Administrasi', 30000),
('5', 'Divisi Regional', 8000),
('6', 'Manajer', 7000),
('7', 'Karyawan', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` varchar(45) NOT NULL,
  `nama_jabatan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
('C01', 'Direksi'),
('C02', 'Direktur Utama'),
('C03', 'Direktur'),
('C04', 'Administrasi'),
('C05', 'Divisi Regional'),
('C06', 'Manajer'),
('C07', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(45) NOT NULL,
  `kode_departemen` varchar(45) NOT NULL,
  `kode_jabatan` varchar(45) NOT NULL,
  `nama_karyawan` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `jenkel` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` varchar(45) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `no_telp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `kode_departemen`, `kode_jabatan`, `nama_karyawan`, `alamat`, `jenkel`, `tgl_lahir`, `pendidikan`, `agama`, `tgl_masuk`, `no_telp`) VALUES
('c22', 'A16', 'C01', 'bung', 'boyolali', 'Laki-Laki', '2000-09-05', 'smkn', 'islam', '2020-05-06', '2343344'),
('K0001', 'H11', 'C03', 'kevin', 'solo', 'Laki-Laki', '2000-09-05', 'smk', 'islam', '2020-05-08', '0856473242310'),
('K0002', 'P13', 'C03', 'farez', 'solo', 'laki-laki', '2000-09-02', 'smk', 'islam', '2020-04-09', '08564353310'),
('s123', 'P13', 'C02', 'sayaka', 'soba', 'Perempuan', '2000-04-05', 'esteh', 'islam', '2020-04-05', '08321323432'),
('t10', 'S14', 'C02', 'siyu', 'skoharjo', 'Laki-Laki', '2020-12-24', 'esteh 2', 'islam', '2020-12-24', '083223212');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `kd_gj` varchar(30) NOT NULL,
  `id_karyawan` varchar(45) NOT NULL,
  `nm_karyawan` varchar(45) NOT NULL,
  `nm_departemen` varchar(45) NOT NULL,
  `tgl_gaji` varchar(45) NOT NULL,
  `overtime` int(11) NOT NULL,
  `fee_lembur` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`kd_gj`, `id_karyawan`, `nm_karyawan`, `nm_departemen`, `tgl_gaji`, `overtime`, `fee_lembur`, `total`) VALUES
('ko1', 'K003', 'abi', 'Marketing', '25-01-2021', 0, 0, 192000000),
('ko3', 'K005', 'aidan', 'Marketing', '24-01-2021', 1, 25000, 192025000),
('ko4', 'K004', 'kijang', 'Marketing', '24-01-2021', 5, 125000, 192125000),
('ko5', 'K005', 'aidan', 'IT', '31-01-2021', 1, 25000, 9625000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`kode_departemen`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `gaji_ibfk_1` (`nama_jabatanfk`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `nama_departemenfk` (`kode_departemen`),
  ADD KEY `nama_jabatanfk` (`kode_jabatan`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`kd_gj`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kode_departemen`) REFERENCES `departemen` (`kode_departemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
