-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 09:59 AM
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
  `tgl_masuk_stock` datetime NOT NULL,
  `nama_katalog` varchar(28) NOT NULL,
  `deskripsi_katalog` text NOT NULL,
  `nama_gambar` varchar(45) NOT NULL,
  `nama_gambar2` varchar(58) NOT NULL,
  `nama_gambar3` varchar(58) NOT NULL,
  `nama_gambar4` varchar(58) NOT NULL,
  `nama_gambar5` varchar(58) NOT NULL,
  `kategori_id` int(28) NOT NULL,
  `harga` int(28) NOT NULL,
  `stock` int(28) NOT NULL,
  `sold` int(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`katalog_id`, `tgl_masuk_stock`, `nama_katalog`, `deskripsi_katalog`, `nama_gambar`, `nama_gambar2`, `nama_gambar3`, `nama_gambar4`, `nama_gambar5`, `kategori_id`, `harga`, `stock`, `sold`) VALUES
(2, '2023-10-02 14:24:20', 'Creatick', '<p>ID Card adalah kartu yang tidak hanya sebagai kartu identitas karyawan perusahaan, tetapi memberi arti tersendiri dalam mendukung formalitas dan nilai atau image perusahaan.</p>', '650a861f3f3a8.png', '650a861f3f58f.png', '650a861f3f76f.png', '650a861f3f916.png', '650a861f3fb2f.png', 2, 2000000, 500, 0),
(3, '2023-09-14 09:26:35', 'SHADOWKEEP', '<p>Kartu Nama digital Yang Bertemakan Hitam Dan gold</p>', '650a88dbd9be4.png', '650a88dbd9d6b.png', '650a88dbd9f19.png', '650a88dbda0bb.png', '650a88dbda290.png', 1, 50000, 100, 0),
(4, '2023-10-02 14:26:50', 'SHADEPON', '<p>Kartu Nama digital Yang Bertemakan Hitam Dan gold</p>', '650a88a766ba2.png', '650a88a766df6.png', '650a88a766fb8.png', '650a88a76715d.png', '650a88a7672ec.png', 1, 60000, 500, 0),
(5, '2023-10-02 14:27:01', 'RIVERHEDGE', '<p>ID Card adalah kartu yang tidak hanya sebagai kartu identitas karyawan perusahaan, tetapi memberi arti tersendiri dalam mendukung formalitas dan nilai atau image perusahaan.</p>', '650a8880d4038.png', '650a8880d42d6.png', '650a8880d44c5.png', '650a8880d6f58.png', '650a8880d70bb.png', 1, 80000, 475, 25),
(6, '2023-08-11 23:27:04', 'DELUXEL', '<p>Kartu Nama digital Yang Bertemakan Hitam Dan gold</p>', '650a88262739b.png', '650a88262755d.png', '650a8826276c9.png', '650a88262ba0b.png', '650a88262bc80.png', 1, 100000, 400, 0),
(7, '2023-09-22 12:27:17', 'IMAGININ', '<p>Kartu Nama digital Yang Bertemakan Oren Dan Putih</p>', '650a87edd1bda.png', '650a87edd1e2a.png', '650a87edd2016.png', '650a87edd21d0.png', '650a87edd2332.png', 1, 120000, 145, 0),
(8, '2023-09-22 14:27:34', 'ICEACRE', '<p>Kartu Nama digital Yang Bertemakan Ungu Dan Putih</p>', '650a879c6a848.png', '650a8793ca2fb.png', '650a8793ca4bf.png', '650a8793ca62d.png', '650a8793ca7a2.png', 1, 140000, 556, 0),
(9, '2023-09-22 14:27:40', 'HEYSTYLISH', '<p>Kartu Nama digital Yang Bertemakan</p>', '650a8755ae487.png', '650a8755ae623.png', '650a8755ae823.png', '650a8755ae9e8.png', '650a8755aebe4.png', 1, 160000, 234, 0),
(10, '2023-09-22 14:27:40', 'GOLDLYN', 'Kartu Nama digital Yang Bertemakan Hitam Dan gold', '650a871b4e3c9.png', '650a871b4e5d2.png', '650a871b4e7e4.png', '650a871b4e9d2.png', '650a871b4eb49.png', 1, 180000, 123, 0),
(11, '2023-09-22 14:27:40', 'Creatick', '<p style=\"line-height:1.5;text-align:justify;\">Deskripsi&nbsp;Paket Basic Card Digital kami adalah solusi yang sempurna untuk memperkenalkan bisnis Anda ke era digital. Dengan harga terjangkau, Anda akan mendapatkan akses ke kartu digital yang elegan dan ramah lingkungan, dirancang khusus untuk meningkatkan visibilitas dan memperluas jangkauan Anda. Fitur-fitur termasuk:</p><p>&nbsp;</p><figure class=\"table\" style=\"height:181.109px;width:100%;\"><table class=\"ck-table-resized\" style=\"border-collapse:collapse;border-style:hidden;border-width:0px;margin-left:auto;margin-right:auto;\" border=\"1\"><colgroup><col style=\"width:3.15%;\"><col style=\"width:96.85%;\"></colgroup><tbody><tr style=\"height:23.3906px;\"><td style=\"border-width:0px;height:23.3906px;\">1</td><td style=\"border-width:0px;height:23.3906px;\"><span style=\"font-family:arial, helvetica, sans-serif;font-size:12pt;\">Kartu Digital Interaktif</span></td></tr><tr style=\"height:22.375px;\"><td style=\"border-width:0px;height:22.375px;\">2</td><td style=\"border-width:0px;height:22.375px;\"><span style=\"font-family:arial, helvetica, sans-serif;font-size:12pt;\">Tautan Sosial Media</span></td></tr><tr style=\"height:23.3906px;\"><td style=\"border-width:0px;height:23.3906px;\">3</td><td style=\"border-width:0px;height:23.3906px;\"><span style=\"font-family:arial, helvetica, sans-serif;font-size:12pt;\">Informasi Kontak</span></td></tr><tr style=\"height:22.3906px;\"><td style=\"border-width:0px;height:22.3906px;\">4</td><td style=\"border-width:0px;height:22.3906px;\">Logo Bisnis</td></tr><tr style=\"height:22.3906px;\"><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td></tr><tr style=\"height:22.3906px;\"><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td></tr><tr style=\"height:22.3906px;\"><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td></tr><tr style=\"height:22.3906px;\"><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td><td style=\"border-width:0px;height:22.3906px;\">&nbsp;</td></tr></tbody></table></figure><p>&nbsp;</p>', '650a86caa68ed.png', '650a86caa6ae1.png', '650a86caa6c29.png', '650a86caa6d78.png', '650a86caa6ed8.png', 1, 258000, 115, 10),
(12, '2023-09-22 14:27:40', 'Javawebster1', '<p>Desain Logo Dan Kartu</p>', '650a8a01a30fe.jpeg', '0', '0', '0', '0', 3, 360000, 128, 0),
(13, '2023-09-22 14:27:40', 'Javawebster2', '<p>Desain Logo Dan Kartu</p>', '650a8a25d97d5.jpeg', '0', '0', '0', '0', 3, 500000, 290, 0),
(14, '2023-09-24 12:27:40', 'Javawebster3', '<p>Desain Logo Dan Kartu</p>', '650a8a3a7b793.jpeg', '0', '0', '0', '0', 3, 900000, 235, 0),
(15, '2023-09-21 11:20:40', 'Javawebster4', '<p>Desain Logo Dan Kartu</p>', '650a8a5d355cd.jpeg', '0', '0', '0', '0', 3, 1000000, 245, 0),
(16, '2023-09-22 15:27:40', 'Javawebster5', '<p>ASUUUUUUUUUUUUUUUUUUUU</p>', '650a8a8073a1c.jpeg', '0', '0', '0', '0', 2, 1550000, 255, 0),
(28, '2023-10-20 13:14:00', 'akuhs', 'Fitur Dan Keunggulan: &lt;br&gt; Paket Basic kami adalah solusi yang sempurna &lt;br&gt; untuk memperkenalkan bisnis Anda ke era digital. Dengan  &lt;br&gt; harga terjangkau, Anda akan mendapatkan akses ke kartu digital  &lt;br&gt; yang elegan dan ramah lingkungan, dirancang khusus untuk  &lt;br&gt; meningkatkan visibilitas dan memperluas jangkauan Anda.  &lt;br&gt; Fitur-fitur termasuk: &lt;br&gt; 1. Kartu Digital Interaktif &lt;br&gt; 2. Tautan Sosial Media ', '65321abba7bfc.jpg', '0', '0', '0', '0', 1, 450000, 100, 0);

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
(14, 'takiya@takiya.com', 'takiya', '$2y$10$INfL2Nc1h1MIyg0u6rOlUexhHjfah48swBdWb9wNdEhNb5SytKgEe', 1, 2, '+628765432678'),
(15, 'pasyaseptian079@gmail.com', 'Pasya', '$2y$10$cfrOmOX2S3ubEGCJ3LzQDukaMuLST.ZMJHM3tS.NDnUrsg8zRkdAq', 2, 1, '+6289602648625'),
(16, 'restu@gmail.com', 'restu', '$2y$10$LEjCPei7tK67eM53Zt1eP.Jw0IxRi/F8dvrrAQEhgrwqB7250hJ8a', 2, 1, '+6287656567809');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` int(11) NOT NULL,
  `kategori_id` int(28) NOT NULL,
  `nama_paket` varchar(48) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `fitur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `kategori_id`, `nama_paket`, `harga_paket`, `fitur`) VALUES
(1, 1, 'Paket Basic', 2500000, '<p style=\"text-align:justify;\"><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:18px;\"><strong>Fitur Dan Keunggulan:</strong></span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Paket Basic kami adalah solusi yang sempurna</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">untuk memperkenalkan bisnis Anda ke era digital. Dengan&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">harga terjangkau, Anda akan mendapatkan akses ke kartu digital&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">yang elegan dan ramah lingkungan, dirancang khusus untuk&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">meningkatkan visibilitas dan memperluas jangkauan Anda.&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Fitur-fitur termasuk:</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">1.&nbsp;Kartu Digital Interaktif</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">2.&nbsp;Tautan Sosial Media&nbsp;</span></p>'),
(2, 1, 'Paket Super', 1800000, '<p style=\"text-align:justify;\"><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:18px;\"><strong>Fitur Dan Keunggulan:</strong></span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Paket Basic kami adalah solusi yang sempurna</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">untuk memperkenalkan bisnis Anda ke era digital. Dengan&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">harga terjangkau, Anda akan mendapatkan akses ke kartu digital&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">yang elegan dan ramah lingkungan, dirancang khusus untuk&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">meningkatkan visibilitas dan memperluas jangkauan Anda.&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Fitur-fitur termasuk:</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">1.&nbsp;Kartu Digital Interaktif</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">2.&nbsp;Tautan Sosial Media&nbsp;</span></p>'),
(3, 1, 'Paket Comunity', 2850000, '<p style=\"text-align:justify;\"><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:18px;\"><strong>Fitur Dan Keunggulan:</strong></span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Paket Basic kami adalah solusi yang sempurna</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">untuk memperkenalkan bisnis Anda ke era digital. Dengan&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">harga terjangkau, Anda akan mendapatkan akses ke kartu digital&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">yang elegan dan ramah lingkungan, dirancang khusus untuk&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">meningkatkan visibilitas dan memperluas jangkauan Anda.&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Fitur-fitur termasuk:</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">1.&nbsp;Kartu Digital Interaktif</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">2.&nbsp;Tautan Sosial Media&nbsp;</span></p>'),
(4, 2, 'Paket Super Web', 3000000, '<p style=\"text-align:justify;\"><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:18px;\"><strong>Fitur Dan Keunggulan:</strong></span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Paket Basic kami adalah solusi yang sempurna</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">untuk memperkenalkan bisnis Anda ke era digital. Dengan&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">harga terjangkau, Anda akan mendapatkan akses ke kartu digital&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">yang elegan dan ramah lingkungan, dirancang khusus untuk&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">meningkatkan visibilitas dan memperluas jangkauan Anda.&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Fitur-fitur termasuk:</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">1.&nbsp;Kartu Digital Interaktif</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">2.&nbsp;Tautan Sosial Media&nbsp;</span></p>'),
(5, 2, 'Paket Basic Web', 2600000, '<p style=\"text-align:justify;\"><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:18px;\"><strong>Fitur Dan Keunggulan:</strong></span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Paket Basic kami adalah solusi yang sempurna</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">untuk memperkenalkan bisnis Anda ke era digital. Dengan&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">harga terjangkau, Anda akan mendapatkan akses ke kartu digital&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">yang elegan dan ramah lingkungan, dirancang khusus untuk&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">meningkatkan visibilitas dan memperluas jangkauan Anda.&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Fitur-fitur termasuk:</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">1.&nbsp;Kartu Digital Interaktif</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">2.&nbsp;Tautan Sosial Media&nbsp;</span></p>'),
(6, 2, 'Paket Comunity Web', 1560000, '<p style=\"text-align:justify;\"><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:18px;\"><strong>Fitur Dan Keunggulan:</strong></span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Paket Basic kami adalah solusi yang sempurna</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">untuk memperkenalkan bisnis Anda ke era digital. Dengan&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">harga terjangkau, Anda akan mendapatkan akses ke kartu digital&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">yang elegan dan ramah lingkungan, dirancang khusus untuk&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">meningkatkan visibilitas dan memperluas jangkauan Anda.&nbsp;</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">Fitur-fitur termasuk:</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">1.&nbsp;Kartu Digital Interaktif</span><br><span style=\"color:hsl(0,0%,0%);font-family:\'Courier New\', Courier, monospace;font-size:14px;\">2.&nbsp;Tautan Sosial Media&nbsp;</span></p>');

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
  `tgl_keluar_stock` datetime NOT NULL,
  `kode_trx` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `katalog_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `paket_id` int(16) NOT NULL,
  `total` int(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_trx` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`trx_id`, `tgl_keluar_stock`, `kode_trx`, `id_user`, `katalog_id`, `kategori_id`, `paket_id`, `total`, `jumlah`, `status_trx`) VALUES
(1, '2023-10-16 17:03:10', 'XWN96RMX', 15, 5, 1, 0, 800000, 10, 1),
(2, '2023-10-16 17:03:10', '7HBTQ68X', 15, 5, 1, 2, 0, 0, 1),
(3, '2023-10-16 14:49:29', 'UJYXRM5E', 16, 5, 1, 0, 1200000, 15, 2),
(4, '2023-10-17 04:46:37', 'W1UHN6IM', 16, 11, 1, 0, 1290000, 5, 2),
(5, '2023-10-17 09:07:16', 'RMVWRJ73', 15, 11, 1, 0, 1290000, 5, 1),
(6, '2023-10-20 05:13:51', '1RCKRVV6', 15, 26, 1, 0, 2250000, 5, 1);

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
  ADD KEY `id_user` (`id_user`),
  ADD KEY `paket_id` (`paket_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `katalog_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `trx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
