-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 04:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_thl` int(11) NOT NULL,
  `jam1` time NOT NULL,
  `jam2` time NOT NULL,
  `tanggal` date NOT NULL,
  `shift1` varchar(255) NOT NULL,
  `shift2` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_thl`, `jam1`, `jam2`, `tanggal`, `shift1`, `shift2`, `status`) VALUES
(2, 6, '21:28:00', '00:00:00', '2023-11-21', 'Kerja', '', '1'),
(3, 5, '00:00:00', '21:35:00', '2023-11-21', 'Tidak Hadir', 'Kerja', '1'),
(5, 6, '20:35:00', '00:00:00', '2023-12-05', '', '', '1'),
(6, 6, '12:42:00', '13:14:00', '2023-12-04', 'Melaksanakan Kerja', '', '1'),
(7, 6, '13:13:00', '00:00:00', '2023-12-05', '', '', '1'),
(8, 6, '00:00:00', '13:15:00', '2023-12-07', '', 'Bekerja', '1');

-- --------------------------------------------------------

--
-- Table structure for table `thl`
--

CREATE TABLE `thl` (
  `id_thl` int(11) NOT NULL,
  `npnp` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thl`
--

INSERT INTO `thl` (`id_thl`, `npnp`, `nama`, `jenis_kelamin`, `jabatan`, `qr_code`) VALUES
(5, '123123123', 'Jack Poluan', 'Laki-Laki', 'Manager', 'uploads/qrcode/123123123.png'),
(6, '331222311', 'Harly', 'Laki-Laki', 'Manager', 'uploads/qrcode/331222311.png'),
(7, '123232323', 'Johan', 'Laki-Laki', 'Manager', 'uploads/qrcode/123232323.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '$2y$10$idJrNeCvcBb.0rxE4RGEqepRecMmzd.tB95eac2B4lmTS5j1Hv5LC', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `thl`
--
ALTER TABLE `thl`
  ADD PRIMARY KEY (`id_thl`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thl`
--
ALTER TABLE `thl`
  MODIFY `id_thl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
