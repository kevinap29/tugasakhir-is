-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 10:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir_is`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `jurusan` enum('Informatika','Sistem Informasi (S1)','DKV','Sistem Informasi (D3)','Akuntansi') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8','9','dll') NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `google_secret_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `nama`, `npm`, `jurusan`, `semester`, `username`, `email`, `password`, `google_secret_code`) VALUES
(1, 'DSC03652.JPG', 'Kevin Agustiansyah Putra', '021170035', 'Sistem Informasi (S1)', '7', 'kevin29', 'kevinagustiansyah298@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'OZIFOEKJBM6KRUZK'),
(2, 'foto-nurul.jpg', 'Nurul Fitri Yany', '021170031', 'Sistem Informasi (S1)', '7', 'nurul_21', 'nurulalfitriyany@gmail.com', '3a54d9651c8e6a23af2aa8db46a2fced', '4QDROU2O54BSKGCR'),
(3, 'foto-al.jpg', 'M. Alfian Ardiansyah', '021170008', 'Sistem Informasi (S1)', '7', 'callmeaal', 'alfianardiansyah08@gmail.com', 'c2cbb8889ebc5ab5591ca30b64a4e47a', 'RYYFATWRHIMOW3WH'),
(4, 'foto-ucok.jpg', 'REZKI OKTARON LINGGA', '021170001', 'Sistem Informasi (S1)', '7', 'ucok30', 'rezkioktaron28@gmail.com', '58cec1e7119d8ffe98b1eedaf7f575a7', 'PPN5ZZTWCWURAYKT'),
(5, 'foto-riska.jpg', 'Riska Melliawati', '021170026', 'Sistem Informasi (S1)', '7', 'rskamell', 'riska.mellya05@gmail.com', '839e9c1a49e7ebdeddf258630a89a2bc', '5KRFUPNMSDKFHNZM'),
(6, 'foto-dwi.jpg', 'Dwi Anggraini ', '021170004', 'Sistem Informasi (S1)', '7', 'dwianggraini', 'dwi@gmail.com', 'a332f0ceba7338f88bc2550fbaeaae2b', 'DH4OAQFVVXTO2BK6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
