-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 06:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psikotes_depresi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `kategori`) VALUES
(1, 'admin@psikolog.com', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `Idpasien` int(12) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Namapasien` varchar(255) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Jeniskelamin` varchar(32) NOT NULL,
  `Tgllahir` date NOT NULL,
  `Idpenyakit` varchar(12) NOT NULL,
  `Nilai_diagnosa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `Soalid` int(11) NOT NULL,
  `Soal` text NOT NULL,
  `Nilai_H1` varchar(12) NOT NULL,
  `Nilai_H2` varchar(12) NOT NULL,
  `Moderate` int(11) NOT NULL,
  `Major` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`Soalid`, `Soal`, `Nilai_H1`, `Nilai_H2`, `Moderate`, `Major`) VALUES
(1, 'Kehilangan minat dan kegembiraan', '0.713', '0.856', 0, 0),
(2, 'Gagasan tentang rasa bersalah dan tidak berguna', '0.856', '0.569', 1, 1),
(3, 'Mood depresif', '0', '0.569', 0, 1),
(4, 'Mengalami kesulitan untuk fokus dan\r\nberkonsetrasi', '0.282', '0.426', 1, 1),
(5, 'harga diri dan kepercayaan diri yang kurang', '0.426', '0', 0, 0),
(6, 'Perbuatan yang membahayakan dirinya sendiri atau bunuh diri', '0', '0.569', 0, 0),
(7, 'Pandangan masa depan yang suram dan pesimistis ', '0.282', '0.569', 1, 1),
(8, 'Berkurangnya energi yang menuju keadaan mudah lelah dan menurunya aktivitas', '0.282', '0.426', 1, 1),
(9, 'Tidur tergangguTidur terganggu', '0', '0.426', 0, 0),
(10, 'Mengalami waham dan halusinasi', '0', '0.426', 0, 0),
(11, 'Lamanya gejala tersebut berlangsung sekurang - kurangnya 2 minggu', '0.282', '0.569', 1, 1),
(12, 'Merasa sedih dan kesepian ', '0.426', '0.713', 1, 1),
(13, 'Mengatasi kesulitan untuk meneruskan kegiatan sosial, pekerjaan atau urusan rumah tangga', '0.569', '', 1, 0),
(14, 'Nafsu makan tidak menentu, terkadang naik, kadang menurun', '0.282', '0.713', 1, 1),
(15, 'Hanya sedikit kesulitan dalam pekerjaan dan kegiatan sosial yang biasa dilakukan', '0', '0.713', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Namapasien` varchar(255) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Passwd` varchar(32) NOT NULL,
  `Jkel` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`Idpasien`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`Soalid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `Idpasien` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `Soalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
