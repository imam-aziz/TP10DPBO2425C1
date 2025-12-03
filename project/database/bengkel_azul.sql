-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 10:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS bengkel_azul;
USE bengkel_azul;

--
-- Database: `bengkel_azul`
--

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id` int(11) NOT NULL,
  `nama_mekanik` varchar(100) NOT NULL,
  `spesialisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id`, `nama_mekanik`, `spesialisasi`) VALUES
(1, 'Udin Knalpot', 'Mesin & Kaki-kaki'),
(2, 'Joko Kabel', 'Kelistrikan'),
(3, 'Asep Busi', 'Tune Up & Servis Ringan'),
(4, 'Rian CVT', 'Transmisi Matic');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `kontak`) VALUES
(1, 'Ahmad Kholid', '08123456789'),
(2, 'Bunga Lestari', '08567891234'),
(3, 'Candra Wijaya', '081122334455'),
(4, 'Dinda Pertiwi', '081998877665'),
(5, 'Erik Subejo', '081345678901'),
(6, 'Fajar Sidik', '081233445566'),
(7, 'Galih Pratama', '085711223344'),
(8, 'Hesti Susanti', '087812341234'),
(9, 'Indra Bekti', '081299887766'),
(10, 'Joni Iskandar', '085612345678'),
(11, 'Azulas', '00000000000');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_servis`
--

CREATE TABLE `pesanan_servis` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mekanik` int(11) NOT NULL,
  `id_servis` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan_servis`
--

INSERT INTO `pesanan_servis` (`id`, `id_pelanggan`, `id_mekanik`, `id_servis`, `tgl_masuk`, `catatan`) VALUES
(1, 1, 1, 1, '2023-10-01', 'Suara mesin agak kasar di putaran rendah'),
(2, 2, 3, 2, '2023-10-01', 'Pakai oli matic standard pabrik'),
(3, 3, 4, 6, '2023-10-02', 'Tarikan awal gredek/getar parah'),
(4, 4, 2, 5, '2023-10-02', 'Lampu depan mati, sekring sering putus'),
(5, 5, 1, 4, '2023-10-03', 'Rem belakang bunyi cit cit'),
(6, 6, 3, 7, '2023-10-03', 'Ban bawa sendiri, cuma jasa pasang'),
(7, 7, 1, 3, '2023-10-04', 'Motor ngebul putih tebal, ring piston kena'),
(8, 8, 3, 1, '2023-10-05', 'Cek tekanan angin ban sekalian'),
(9, 9, 4, 2, '2023-10-05', 'Ganti filter oli juga kalau kotor'),
(10, 10, 2, 5, '2023-10-06', 'Starter tangan tidak berfungsi');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id` int(11) NOT NULL,
  `jenis_servis` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id`, `jenis_servis`, `biaya`) VALUES
(1, 'Servis Rutin', 50000),
(2, 'Ganti Oli Mesin', 25000),
(3, 'Servis Besar (Turun Mesin)', 300000),
(4, 'Ganti Kampas Rem', 35000),
(5, 'Perbaikan Kelistrikan', 75000),
(6, 'Servis CVT Matic', 65000),
(7, 'Ganti Ban Luar', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_servis`
--
ALTER TABLE `pesanan_servis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_ps_mekanik` (`id_mekanik`),
  ADD KEY `fk_ps_servis` (`id_servis`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan_servis`
--
ALTER TABLE `pesanan_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan_servis`
--
ALTER TABLE `pesanan_servis`
  ADD CONSTRAINT `fk_ps_mekanik` FOREIGN KEY (`id_mekanik`) REFERENCES `mekanik` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ps_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ps_servis` FOREIGN KEY (`id_servis`) REFERENCES `servis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
