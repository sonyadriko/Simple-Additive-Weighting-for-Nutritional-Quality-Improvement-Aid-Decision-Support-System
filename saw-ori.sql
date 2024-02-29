-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 07:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw-ori`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `jenis_kelamin`) VALUES
(4, 'Ahmad Fahim', 'laki-laki'),
(5, 'Ahmad Syahidul Akvi', 'laki-laki'),
(6, 'Al Fatih Shaquel', 'laki-laki'),
(8, 'Archello', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `detail_hasil`
--

CREATE TABLE `detail_hasil` (
  `id_detail_hasil` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `hasil_akhir` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_hasil`
--

INSERT INTO `detail_hasil` (`id_detail_hasil`, `id_hasil`, `nama_alternatif`, `hasil_akhir`, `ranking`) VALUES
(1, 15, 'Ahmad Syahidul Akvi', 0.6425, 1),
(2, 15, 'Anaku Anaya Wardhana', 0.6425, 2),
(3, 15, 'Ahmad Fahim', 0.4925, 3),
(4, 15, 'Al Fatih Shaquel', 0.21, 4),
(5, 15, 'Archello', 0.21, 5),
(6, 16, 'Ahmad Syahidul Akvi', 0.6425, 1),
(7, 16, 'Anaku Anaya Wardhana', 0.6425, 2),
(8, 16, 'Ahmad Fahim', 0.4925, 3),
(9, 16, 'Al Fatih Shaquel', 0.21, 4),
(10, 16, 'Archello', 0.21, 5),
(11, 17, 'Anaku Anaya Wardhana', 0.6425, 1),
(12, 17, 'Ahmad Fahim', 0.4925, 2),
(13, 17, 'Ahmad Syahidul Akvi', 0.3975, 3),
(14, 17, 'Al Fatih Shaquel', 0.21, 4),
(15, 17, 'Archello', 0.21, 5),
(16, 18, 'Anaku Anaya Wardhana', 0.6425, 1),
(17, 18, 'Ahmad Fahim', 0.4925, 2),
(18, 18, 'Ahmad Syahidul Akvi', 0.3975, 3),
(19, 18, 'Al Fatih Shaquel', 0.21, 4),
(20, 18, 'Archello', 0.21, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`) VALUES
(15, '2024-01-22 17:27:05'),
(16, '2024-01-22 17:28:00'),
(17, '2024-01-22 17:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `tipe_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(1, 'BERAT BADAN MENURUT UMUR (BB/U)', 0.1, 'benefit'),
(2, 'TINGGI BADAN MENURUT UMUR (TB/U)', 0.1, 'benefit'),
(3, 'BERAT BADAN MENURUT TINGGI BADAN (BB/TB)', 0.2, 'benefit'),
(4, 'LINGKAR LENGAN MENURUT UMUR (LL/U)', 0.25, 'benefit'),
(5, 'INDEKS MASSA TUBUH MENURUT UMUR (IMT/U)', 0.35, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `alternatif` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `berat` double NOT NULL,
  `tinggi` double NOT NULL,
  `lila` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `alternatif`, `jenis_kelamin`, `umur`, `berat`, `tinggi`, `lila`) VALUES
(1, 'Ahmad Fahim', 'laki-laki', 24, 5.8, 65, 12.6),
(2, 'Ahmad Syahidul Akvi', 'laki-laki', 28, 5.5, 66, 14),
(3, 'Al Fatih Shaquel', 'laki-laki', 28, 6.7, 71.5, 13),
(5, 'Anaku Anaya Wardhana', 'perempuan', 30, 8.1, 72.5, 12.8),
(6, 'Archello', 'laki-laki', 28, 6.9, 73, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `kategori_status_gizi` varchar(255) NOT NULL,
  `bobot_kategori` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `kategori_status_gizi`, `bobot_kategori`) VALUES
(1, 1, 'Berat badan sangat kurang', 0.15),
(2, 1, 'Berat badan kurang', 0.25),
(3, 5, 'status 1', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_admin`, `nama`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'pimpinan', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'kepala puskesmas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `detail_hasil`
--
ALTER TABLE `detail_hasil`
  ADD PRIMARY KEY (`id_detail_hasil`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_hasil`
--
ALTER TABLE `detail_hasil`
  MODIFY `id_detail_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
