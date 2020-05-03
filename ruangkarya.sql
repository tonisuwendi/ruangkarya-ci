-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2020 pada 09.16
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangkarya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cookie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `cookie`) VALUES
(1, 'admin', '$2y$10$cCwU3liXQWYkqHsvPOFn2ugj.yYqMGjiD6QGQMkd3xOnSuQqFqkE.', '0LlSr8HYBEtjW8ZVdPepXwGFoi9QnC2pAMthTOHxmfE1hvNJ6mUSsN3QlYaWqqnk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`) VALUES
(1, 'Desain', 1),
(2, 'Animasi', 2),
(3, 'Video', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `randId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id`, `name`, `randId`) VALUES
(44, '15884896240101.jpg', '162935348'),
(45, '15884896240102.jpg', '162935348'),
(46, '1588489762872.jpg', '2134095625'),
(47, '15884897628721.jpg', '2134095625'),
(48, '1588489869216.jpg', '194143595'),
(49, '15884901003631.jpg', '8114528247'),
(50, '15884901003632.jpg', '8114528247'),
(51, '15884901003633.jpg', '8114528247'),
(52, '1588490100363.png', '8114528247'),
(53, '1588490100363.jpeg', '8114528247');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `file` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `file2` varchar(30) NOT NULL,
  `linkyt` varchar(30) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `date_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `name`, `category`, `file`, `description`, `file2`, `linkyt`, `slug`, `date_input`) VALUES
(56, 'Desain Bagus Banget Ini Loh, Kalian Harus Lihat Ini', 1, '1588489624010.jpg', '', '162935348', '', 'desain-bagus-banget-ini-loh-kalian-harus-lihat-ini-1575925898', '2020-05-03 14:07:04'),
(57, 'Animasi Orang Berlari Lari Terus Berenang Terus Naik Sepeda Terus Nonton TV', 2, '1588489762872.gif', 'Diatas adalah gambar animasi\r\nDibawah saya sertakan foto foto wanita wkwk', '2134095625', '', 'animasi-orang-berlari-lari-terus-berenang-terus-naik-sepeda-terus-nonton-tv-445064499', '2020-05-03 14:09:23'),
(58, 'Video Blackpink Nihh Buat Yang Pengin Nonton Hehe', 3, 'tOCUE8wRQYY', '', '194143595', '', 'video-blackpink-nihh-buat-yang-pengin-nonton-hehe-89297779', '2020-05-03 14:11:09'),
(59, 'Desain Botol Obat Bisa Jadi Inspirasimu', 1, '1588490100363.jpg', 'Supaya kamu cepat sembuh, nih saya kasih foto-foto buat cuci mata', '8114528247', '', 'desain-botol-obat-bisa-jadi-inspirasimu-525501883', '2020-05-03 14:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `favicon` varchar(30) NOT NULL,
  `banner` varchar(30) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `logo`, `favicon`, `banner`, `text`) VALUES
(1, 'Ruang Karya', '1588289587120.png', '1588290141774.png', '1588289031566.jpg', 'TEMUKAN DESAIN UNIK\r\nHANYA DI RUANGKARYA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
