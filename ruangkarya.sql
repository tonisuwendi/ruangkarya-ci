-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2020 pada 06.22
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
(6, 'Mediadruckwerk Musterbox', 1, '1588244705220.jpg', 'Aliquam eget leo quis nunc faucibus tincidunt ac sed nisl. Donec id orci aliquet, tincidunt mauris ac, vestibulum mi. Pellentesque sed laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie pharetra libero, porttitor tempus diam venenatis et. Nam eget felis a massa hendrerit rutrum. Integer maximus elit mauris, eu venenatis urna euismod vitae. Donec molestie, felis tempor dictum tempor, tellus justo interdum felis, et porttitor ante urna vitae leo. Fusce ut lectus vitae erat pulvinar posuere pellentesque vel urna. Nullam gravida felis vel ex sagittis, et euismod massa laoreet. Fusce pellentesque tellus nec leo placerat, nec accumsan dui consectetur.', '', '', 'mediadruckwerk-musterbox-1862846239', '2020-04-30 13:05:05'),
(7, 'Passionfruit - Stickers', 1, '1588244768708.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin imperdiet nulla et magna viverra blandit. Nunc finibus massa a erat volutpat efficitur. Cras tempus, risus id aliquet dictum, dolor urna porttitor libero, sit amet viverra turpis arcu porta nulla. Donec euismod sodales orci, non porttitor massa lobortis vitae. Integer ultricies ipsum nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lacinia ex lectus, eu lacinia ligula maximus vitae. Curabitur ac posuere risus. Curabitur blandit mauris non luctus mattis. Curabitur vel velit sed augue vehicula aliquam. Ut eu elit a elit tempus sagittis.', '', '', 'passionfruit-stickers-1249523535', '2020-04-30 13:06:08'),
(8, 'Meadowlark Cards', 1, '1588244846363.jpg', 'ras eu tristique lorem. Curabitur lacinia sapien vestibulum sem maximus commodo. Nullam ut tincidunt nisl. Quisque congue suscipit enim. In neque diam, auctor ac nisi in, porta ullamcorper lorem. Duis imperdiet risus mi, vel porttitor justo dapibus ac. Fusce et ultrices turpis, et luctus massa. Aenean quis massa commodo, cursus dui gravida, aliquam urna. Fusce id dolor et diam varius sollicitudin nec non augue. Nam porttitor porta quam, id dictum ligula malesuada vitae. Suspendisse fermentum est lorem, ultricies commodo dui dictum sit amet. Morbi ut maximus lectus. Vivamus et maximus turpis.', '', '', 'meadowlark-cards-1987524728', '2020-04-30 13:07:26'),
(9, 'ZONA NYAMAN - NIKISUKA (Reggae SKA Version) | Fourtwnty', 3, 'mucs3GPVdgQ', 'Ut feugiat ligula non tortor interdum vulputate. Nam in quam fermentum, vehicula nulla non, lobortis tortor. Cras interdum nibh magna, sit amet ornare erat interdum et. Sed tincidunt augue sapien, vel lobortis augue lobortis ac. Vivamus vel dui vitae purus finibus tincidunt. Donec semper diam porta efficitur venenatis. Maecenas mollis tortor nibh, sed facilisis orci dictum vel. Sed purus neque, imperdiet sagittis hendrerit vel, molestie a urna. Morbi dictum, quam a feugiat commodo, nisi metus auctor metus, vitae dictum odio sem ac massa. Suspendisse a nisl at turpis lobortis pretium. Sed sed gravida nunc. Nam eu imperdiet augue. Aliquam sollicitudin semper magna, nec auctor nibh auctor id. Aliquam ac posuere tellus, elementum posuere elit.', '', '', 'zona-nyaman-nikisuka-reggae-ska-version-fourtwnty-884791652', '2020-04-30 13:09:49'),
(10, 'Bender Indonesia', 2, '1588245113967.gif', 'Donec vitae sollicitudin dui, eu viverra justo. Integer nibh libero, mattis quis nunc scelerisque, sollicitudin placerat dui. Suspendisse condimentum velit ut est vestibulum commodo eu in magna. Curabitur tortor nulla, maximus sed eros eu, tempus dictum mi. Suspendisse ante nibh, posuere ac turpis ut, hendrerit consequat massa. Duis vel iaculis justo. Nam accumsan tincidunt vulputate. Sed cursus velit ac nisl porta mollis. Morbi id odio commodo, mattis lacus vel, vestibulum risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin eu ipsum sed libero hendrerit efficitur ac placerat dui. Praesent commodo nibh et tortor scelerisque vestibulum. Duis pulvinar, tortor sed faucibus tincidunt, leo ligula tincidunt nisi, commodo venenatis odio eros quis eros.', '', '', 'bender-indonesia-2010076573', '2020-04-30 13:11:53'),
(11, 'Designsake\'s Small Batch Maple Syrup', 1, '1588245211085.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin imperdiet nulla et magna viverra blandit. Nunc finibus massa a erat volutpat efficitur. Cras tempus, risus id aliquet dictum, dolor urna porttitor libero, sit amet viverra turpis arcu porta nulla. Donec euismod sodales orci, non porttitor massa lobortis vitae. Integer ultricies ipsum nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lacinia ex lectus, eu lacinia ligula maximus vitae. Curabitur ac posuere risus. Curabitur blandit mauris non luctus mattis. Curabitur vel velit sed augue vehicula aliquam. Ut eu elit a elit tempus sagittis.\r\n\r\nAliquam eget leo quis nunc faucibus tincidunt ac sed nisl. Donec id orci aliquet, tincidunt mauris ac, vestibulum mi. Pellentesque sed laoreet lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie pharetra libero, porttitor tempus diam venenatis et. Nam eget felis a massa hendrerit rutrum. Integer maximus elit mauris, eu venenatis urna euismod vitae. Donec molestie, felis tempor dictum tempor, tellus justo interdum felis, et porttitor ante urna vitae leo. Fusce ut lectus vitae erat pulvinar posuere pellentesque vel urna. Nullam gravida felis vel ex sagittis, et euismod massa laoreet. Fusce pellentesque tellus nec leo placerat, nec accumsan dui consectetur.', '', '', 'designsakes-small-batch-maple-syrup-1134821335', '2020-04-30 13:13:31');

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
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
