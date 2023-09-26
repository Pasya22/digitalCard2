-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `card_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `katalog_id` int(1) NOT NULL,
  `nama_katalog` varchar(28) NOT NULL,
  `deskripsi_katalog` text NOT NULL,
  `nama_gambar` varchar(45) NOT NULL,
  `nama_gambar2` varchar(58) NOT NULL,
  `nama_gambar3` varchar(58) NOT NULL,
  `nama_gambar4` varchar(58) NOT NULL,
  `nama_gambar5` varchar(58) NOT NULL,
  `kategori_id` int(28) NOT NULL,
  `harga` varchar(28) NOT NULL,
  `stock` int(28) NOT NULL,
  `sold` int(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`katalog_id`, `nama_katalog`, `deskripsi_katalog`, `nama_gambar`, `nama_gambar2`, `nama_gambar3`, `nama_gambar4`, `nama_gambar5`, `kategori_id`, `harga`, `stock`, `sold`) VALUES
(1, 'Card Digital', 'Apa Ajaweh22', '650a8627020a0.png', '0', '0', '0', '0', 3, 'Rp.65,000', 10, 0),
(2, 'Creatick', 'ID Card adalah kartu yang tidak hanya sebagai kartu identitas karyawan perusahaan, tetapi memberi arti tersendiri dalam mendukung formalitas dan nilai atau image perusahaan.\n', '650a861f3f3a8.png', '650a861f3f58f.png', '650a861f3f76f.png', '650a861f3f916.png', '650a861f3fb2f.png', 2, '10000', 10, 0),
(3, 'SHADOWKEEP', 'Kartu Nama digital Yang Bertemakan Hitam Dan gold', '650a88dbd9be4.png', '650a88dbd9d6b.png', '650a88dbd9f19.png', '650a88dbda0bb.png', '650a88dbda290.png', 1, '10000', 10, 0),
(4, 'SHADEPON', 'Kartu Nama digital Yang Bertemakan Hitam Dan gold', '650a88a766ba2.png', '650a88a766df6.png', '650a88a766fb8.png', '650a88a76715d.png', '650a88a7672ec.png', 1, '30000', 10, 0),
(5, 'RIVERHEDGE', 'ID Card adalah kartu yang tidak hanya sebagai kartu identitas karyawan perusahaan, tetapi memberi arti tersendiri dalam mendukung formalitas dan nilai atau image perusahaan.\n', '650a8880d4038.png', '650a8880d42d6.png', '650a8880d44c5.png', '650a8880d6f58.png', '650a8880d70bb.png', 1, '300000', 45, 9),
(6, 'DELUXEL', 'Kartu Nama digital Yang Bertemakan Hitam Dan gold', '650a88262739b.png', '650a88262755d.png', '650a8826276c9.png', '650a88262ba0b.png', '650a88262bc80.png', 1, '20000', 10, 0),
(7, 'IMAGININ', 'Kartu Nama digital Yang Bertemakan Oren Dan Putih', '650a87edd1bda.png', '650a87edd1e2a.png', '650a87edd2016.png', '650a87edd21d0.png', '650a87edd2332.png', 1, '30000', 10, 0),
(8, 'ICEACRE', 'Kartu Nama digital Yang Bertemakan Ungu Dan Putih', '650a879c6a848.png', '650a8793ca2fb.png', '650a8793ca4bf.png', '650a8793ca62d.png', '650a8793ca7a2.png', 1, '30000', 7, 3),
(9, 'HEYSTYLISH', 'Kartu Nama digital Yang Bertemakan ', '650a8755ae487.png', '650a8755ae623.png', '650a8755ae823.png', '650a8755ae9e8.png', '650a8755aebe4.png', 1, '20000', 4, 6),
(10, 'GOLDLYN', 'Kartu Nama digital Yang Bertemakan Hitam Dan gold', '650a871b4e3c9.png', '650a871b4e5d2.png', '650a871b4e7e4.png', '650a871b4e9d2.png', '650a871b4eb49.png', 1, '30000', 10, 0),
(11, 'Creatick', '<p style=\"line-height: 1.5; text-align: justify;\">Deskripsi&nbsp;Paket Basic Card Digital kami adalah solusi yang sempurna untuk memperkenalkan bisnis Anda ke era digital. Dengan harga terjangkau, Anda akan mendapatkan akses ke kartu digital yang elegan dan ramah lingkungan, dirancang khusus untuk meningkatkan visibilitas dan memperluas jangkauan Anda. Fitur-fitur termasuk:</p>\r\n<p>&nbsp;</p>\r\n<table style=\"border-collapse: collapse; width: 100%; border-style: hidden; height: 181.109px; border-width: 0px; margin-left: auto; margin-right: auto;\" border=\"1\"><colgroup><col style=\"width: 3.14894%;\"><col style=\"width: 96.8511%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 23.3906px;\">\r\n<td style=\"height: 23.3906px; border-width: 0px;\">1</td>\r\n<td style=\"height: 23.3906px; border-width: 0px;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Kartu Digital Interaktif</span></td>\r\n</tr>\r\n<tr style=\"height: 22.375px;\">\r\n<td style=\"height: 22.375px; border-width: 0px;\">2</td>\r\n<td style=\"height: 22.375px; border-width: 0px;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Tautan Sosial Media</span></td>\r\n</tr>\r\n<tr style=\"height: 23.3906px;\">\r\n<td style=\"height: 23.3906px; border-width: 0px;\">3</td>\r\n<td style=\"height: 23.3906px; border-width: 0px;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Informasi Kontak</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 0px;\">4</td>\r\n<td style=\"height: 22.3906px; border-width: 0px;\">Logo Bisnis</td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n<td style=\"height: 22.3906px; border-width: 0px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '650a86caa68ed.png', '650a86caa6ae1.png', '650a86caa6c29.png', '650a86caa6d78.png', '650a86caa6ed8.png', 1, '20000', 10, 0),
(12, 'Javawebster1', 'Desain Logo Dan Kartu', '650a8a01a30fe.jpeg', '0', '0', '0', '0', 3, '20000', 10, 0),
(13, 'Javawebster2', 'Desain Logo Dan Kartu', '650a8a25d97d5.jpeg', '0', '0', '0', '0', 3, '10000', 10, 0),
(14, 'Javawebster3', 'Desain Logo Dan Kartu', '650a8a3a7b793.jpeg', '0', '0', '0', '0', 3, '10000', 8, 2),
(15, 'Javawebster4', 'Desain Logo Dan Kartu', '650a8a5d355cd.jpeg', '0', '0', '0', '0', 3, '100000', 10, 0),
(16, 'Javawebster5', '<p>ASUUUUUUUUUUUUUUUUUUUU</p>', '650a8a8073a1c.jpeg', '0', '0', '0', '0', 2, '23444', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `status_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status_kategori`) VALUES
(1, 'Card Digital', 'Active'),
(2, 'Web Teamplate', 'Active'),
(3, 'logo', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(28) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `no_telepon` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `email`, `username`, `password`, `role_id`, `is_active`, `no_telepon`) VALUES
(13, 'admin2@admin.com', 'admin2', '$2y$10$WFLRbAYojYQx./HB7681YOdl6B3GPkJGDjp5kLO66SVQNlBDoFLqq', 1, 1, '+6289602648689'),
(14, 'takiya@takiya.com', 'takiya', '$2y$10$SDfiIasCV336CHexhXdmj.Nt1RaZWoiNletag7ZZwmsozcORORMca', 1, 1, '+628765432678'),
(15, 'pasyaseptian079@gmail.com', 'Pasya', '$2y$10$cfrOmOX2S3ubEGCJ3LzQDukaMuLST.ZMJHM3tS.NDnUrsg8zRkdAq', 2, 1, '+6289602648623');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` int(11) NOT NULL,
  `kategori_id` int(28) NOT NULL,
  `nama_paket` varchar(48) NOT NULL,
  `fitur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `trx_id` int(11) NOT NULL,
  `kode_trx` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `katalog_id` int(11) NOT NULL,
  `metode_trx` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_trx` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`trx_id`, `kode_trx`, `id_user`, `katalog_id`, `metode_trx`, `jumlah`, `status_trx`) VALUES
(1, '2345453', 13, 5, 'BCA', 1, 'Pending'),
(2, '2345453', 15, 9, 'BCA', 1, 'Pending'),
(3, '2345453', 15, 9, 'BCA', 1, 'Pending'),
(4, '2345453', 15, 8, 'BCA', 2, 'Pending');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `Stokkaluar` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN 
	UPDATE catalog SET stock = stock - NEW.jumlah
    WHERE katalog_id = NEW.katalog_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokterjual` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN 
	UPDATE catalog SET sold = sold + NEW.jumlah
    WHERE katalog_id = NEW.katalog_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`katalog_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`paket_id`),
  ADD KEY `katalog_id` (`kategori_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`trx_id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `katalog_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `trx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
