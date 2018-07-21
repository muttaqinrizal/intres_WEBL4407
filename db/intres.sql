-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 03:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intres`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `tag_id` int(10) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`tag_id`, `tag_name`) VALUES
(1, ''),
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(10) NOT NULL,
  `nama_kat` varchar(20) NOT NULL,
  `desc_kat` text NOT NULL,
  `pembuat` varchar(30) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`, `desc_kat`, `pembuat`, `tgl_dibuat`) VALUES
(1, 'Matlab', 'sdsds', 'galang', '2018-06-19'),
(2, 'Unity', 'unity kat', 'galang', '2018-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_konten` int(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `solved` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama`, `id_konten`, `isi_komentar`, `tanggal`, `solved`) VALUES
(2, 'ganarqiz', 5, '<p>tlong bantuannya, makasih</p>\r\n', '2018-07-19 06:24:14', 'N'),
(5, 'ganarqiz', 4, '<p>Semoga membantu</p>\r\n', '2018-07-19 06:42:40', 'Y'),
(7, 'ganarqiz', 4, '<p>ada kesulitan?</p>\r\n', '2018-07-19 06:43:12', 'N'),
(8, 'anonymous', 4, '<p>Makasih infonya</p>\r\n', '2018-07-19 07:45:51', 'N'),
(9, 'galang', 8, '<p>monggo</p>\r\n', '2018-07-19 08:08:22', 'N'),
(11, 'galang', 7, '<p>help</p>\r\n', '2018-07-19 08:09:31', 'N'),
(12, 'galang', 4, '<p>sangat membantu</p>\r\n', '2018-07-19 08:10:00', 'N'),
(13, 'rambu', 8, '<p>coba buka link ini mas</p>\r\n\r\n<p><a href=\"https://bytes.com/topic/php/answers/621973-how-decrypt-md5-encrypted-password\">https://bytes.com/topic/php/answers/621973-how-decrypt-md5-encrypted-password</a></p>\r\n', '2018-07-19 08:14:16', 'N'),
(14, 'rambu', 7, '<p>tes</p>\r\n', '2018-07-19 08:14:36', 'N'),
(15, 'rambu', 7, '<p>pake base64 coba</p>\r\n\r\n<p><a href=\"https://bytes.com/topic/php/answers/621973-how-decrypt-md5-encrypted-password\">https://bytes.com/topic/php/answers/621973-how-decrypt-md5-encrypted-password</a></p>\r\n', '2018-07-19 08:15:13', 'N'),
(16, 'rambu', 5, '<p>up</p>\r\n', '2018-07-19 08:15:36', 'N'),
(17, 'rambu', 9, '<p>ajain plis</p>\r\n', '2018-07-19 08:15:52', 'N'),
(18, 'rambu', 10, '<p>coba aja</p>\r\n', '2018-07-19 08:17:30', 'N'),
(19, 'anonymous', 9, '<p>ni buka</p>\r\n\r\n<p><a href=\"https://www.w3schools.com/html/html_tables.asp\">https://www.w3schools.com/html/html_tables.asp</a></p>\r\n', '2018-07-19 08:18:13', 'N'),
(20, 'anonymous', 11, '<p>JSSJ</p>\r\n', '2018-07-19 14:48:36', 'N'),
(21, 'anarqi', 11, '<p>ss</p>\r\n', '2018-07-19 14:49:07', 'N'),
(22, 'anarqi', 5, '<p>gini</p>\r\n', '2018-07-21 20:13:24', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `idkonten` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `tag` text NOT NULL,
  `pembuat` varchar(30) NOT NULL,
  `post` enum('Y','N') NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `vote` int(100) DEFAULT '0',
  `pengunjung` int(11) NOT NULL,
  `jml_komentar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`idkonten`, `judul`, `tipe`, `deskripsi`, `tag`, `pembuat`, `post`, `tgl_dibuat`, `vote`, `pengunjung`, `jml_komentar`) VALUES
(4, 'Deteksi Titik Sudut Citra Untuk Identifikasi Bentuk', 'Info', '<p myriad=\"\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 1em 0px; padding: 0px; vertical-align: baseline; line-height: 21px; font-size: 14px; color: rgb(78, 78, 78); font-family: \" text-align:=\"\" trebuchet=\"\">Proses identifikasi bentuk pada citra digital salah satunya dapat dilakukan dengan cara melakukan deteksi terhadap jumlah garis dan titik sudut penyusun objek dalam citra. Berikut ini merupakan contoh pemrograman matlab mengenai deteksi garis dan titik sudut menggunakan transformasi Hough.</p>\r\n\r\n<p myriad=\"\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 1em 0px; padding: 0px; vertical-align: baseline; line-height: 21px; font-size: 14px; color: rgb(78, 78, 78); font-family: \" text-align:=\"\" trebuchet=\"\">Langkah-langkahnya adalah sebagai berikut:<br />\r\n1. Membaca, meresize, dan menampilkan citra</p>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number1 index0 alt2\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">clc; clear; close all; warning off all;</code></div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number2 index1 alt1\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\">&nbsp;</div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number3 index2 alt2\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey comments\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">% baca &amp; resize citra</code></div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number4 index3 alt1\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">I = imread(</code><code 0px=\"\" auto=\"\" bitstream=\"\" blue=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey string\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">&#39;bintang.jpg&#39;</code><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">);</code></div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number5 index4 alt2\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">I = imresize(I,0.2);</code></div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number6 index5 alt1\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\">&nbsp;</div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number7 index6 alt2\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey comments\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">% menampilkan citra asli</code></div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number8 index7 alt1\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">figure,imshow(I);</code></div>\r\n\r\n<div 0px=\"\" 1.1em=\"\" 1em=\"\" auto=\"\" background-attachment:=\"\" background-clip:=\"\" background-image:=\"\" background-origin:=\"\" background-position:=\"\" background-repeat:=\"\" background-size:=\"\" baseline=\"\" bitstream=\"\" border-radius:=\"\" border:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"line number9 index8 alt2\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" float:=\"\" height:=\"\" initial=\"\" left:=\"\" line-height:=\"\" ltr=\"\" margin:=\"\" none=\"\" outline:=\"\" overflow:=\"\" padding:=\"\" position:=\"\" pre=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-family: Consolas, \" top:=\"\" vera=\"\" vertical-align:=\"\" visible=\"\" white-space:=\"\" width:=\"\"><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">title(</code><code 0px=\"\" auto=\"\" bitstream=\"\" blue=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey string\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">&#39;Citra Asli&#39;</code><code 0px=\"\" auto=\"\" bitstream=\"\" black=\"\" border-radius:=\"\" bottom:=\"\" box-shadow:=\"\" box-sizing:=\"\" class=\"matlabkey plain\" color:=\"\" content-box=\"\" courier=\"\" direction:=\"\" display:=\"\" float:=\"\" height:=\"\" inline=\"\" left:=\"\" ltr=\"\" monospace=\"\" none=\"\" outline:=\"\" overflow:=\"\" position:=\"\" right:=\"\" sans=\"\" static=\"\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; background: none !important; border: 0px !important; margin: 0px !important; padding: 0px !important; vertical-align: baseline !important; font-size: 1em !important; line-height: 1.1em !important; font-family: Consolas, \" top:=\"\" vera=\"\" visible=\"\" width:=\"\">);</code></div>\r\n\r\n<p myriad=\"\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 1em 0px; padding: 0px; vertical-align: baseline; line-height: 21px; font-size: 14px; color: rgb(78, 78, 78); font-family: \" text-align:=\"\" trebuchet=\"\"><img alt=\"\" src=\"https://pemrogramanmatlab.com/2018/07/08/deteksi-titik-sudut-citra-untuk-identifikasi-bentuk/#more-6820\" /><img alt=\"\" src=\"https://pemrogramanmatlab.files.wordpress.com/2018/07/deteksi-bentuk-menggunakan-tranformasi-hough.jpg?w=768&amp;h=517\" style=\"width: 768px; height: 517px;\" /></p>\r\n\r\n<p myriad=\"\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 1em 0px; padding: 0px; vertical-align: baseline; line-height: 21px; font-size: 14px; color: rgb(78, 78, 78); font-family: \" text-align:=\"\" trebuchet=\"\">&nbsp;</p>\r\n\r\n<p myriad=\"\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 1em 0px; padding: 0px; vertical-align: baseline; line-height: 21px; font-size: 14px; color: rgb(78, 78, 78); font-family: \" text-align:=\"\" trebuchet=\"\">&nbsp;</p>\r\n\r\n<p myriad=\"\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin: 1em 0px; padding: 0px; vertical-align: baseline; line-height: 21px; font-size: 14px; color: rgb(78, 78, 78); font-family: \" text-align:=\"\" trebuchet=\"\">sumber :https://pemrogramanmatlab.com/2018/07/08/deteksi-titik-sudut-citra-untuk-identifikasi-bentuk/#more-6820</p>\r\n', 'matlab,PCD,imageprocessing', 'ganarqiz', 'Y', '2018-07-19 06:25:32', 3, 3, 7),
(5, 'Cara Hitung Sudut Pada Citra?', 'Tanya', '<p>Gimana ya cara menghiung tepi sudut pada citra?</p>\r\n\r\n<p><img alt=\"\" src=\"https://pemrogramanmatlab.files.wordpress.com/2018/07/deteksi-titik-sudut-menggunakan-transformasi-hough.jpg\" style=\"width: 871px; height: 586px;\" /></p>\r\n\r\n<p>source :&nbsp;https://pemrogramanmatlab.com/2018/07/08/deteksi-titik-sudut-citra-untuk-identifikasi-bentuk/#more-6820</p>\r\n', 'PCD,imageprocessing,matlab', 'ganarqiz', 'Y', '2018-07-19 06:23:53', 2, 5, 3),
(7, 'Cara decrypt dan encrypt di PHP?', 'Tanya', '<p>maaf gaes, numpang nanya caranya&nbsp;decrypt dan encrypt di PHP gmn ya?? makasih</p>\r\n', 'PHP,encrypt,decrypt', 'galang', 'Y', '2018-07-19 08:04:02', 1, 5, 4),
(8, 'Decrypt dan encrypt password dengan PHP', 'Info', '<p>Salah satu contoh dapat memakai base64 :</p>\r\n\r\n<p>untuk encrypt</p>\r\n\r\n<blockquote>\r\n<p>&lt;?php</p>\r\n\r\n<p>$str = &#39;This is an encoded string&#39;;</p>\r\n\r\n<p>echo base64_encode($str);</p>\r\n\r\n<p>?&gt;</p>\r\n</blockquote>\r\n\r\n<p>untuk decrypt</p>\r\n\r\n<blockquote>\r\n<p>&lt;?php&nbsp;</p>\r\n\r\n<p>$str = &#39;This is an encoded string&#39;;&nbsp;</p>\r\n\r\n<p>echo base64_decode($str);</p>\r\n\r\n<p>?&gt;</p>\r\n</blockquote>\r\n\r\n<p>silahkan dicoba</p>\r\n', 'PHP,web,encrypt,decrypt', 'galang', 'Y', '2018-07-17 08:08:04', 2, 2, 2),
(9, 'Cara bikin table pake HTML?', 'Tanya', '<p>maaf, mau tanya cara bikin table pake html&nbsp;</p>\r\n\r\n<p>tolong dibantu, makasih</p>\r\n', 'HTML,web,table', 'rambu', 'Y', '2018-07-19 08:13:30', 0, 4, 2),
(10, 'Buat table dengan html', 'Info', '<p>ni nih caranya</p>\r\n\r\n<blockquote>\r\n<p><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>table<span style=\"box-sizing: inherit; color: red;\">&nbsp;style<span style=\"box-sizing: inherit; color: mediumblue;\">=&quot;width:100%&quot;</span></span><span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>tr<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>th<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Firstname</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/th<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>th<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Lastname</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/th<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;</span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>th<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Age</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/th<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/tr<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>tr<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp; &nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Jill</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Smith</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;</span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">50</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/tr<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>tr<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Eve</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">Jackson</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;</span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">94</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/td<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span courier=\"\" font-size:=\"\" style=\"color: rgb(0, 0, 0); font-family: Consolas, \">&nbsp;&nbsp;</span><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/tr<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span><br courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Consolas, \" />\r\n<span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">&lt;</span>/table<span style=\"box-sizing: inherit; color: mediumblue;\">&gt;</span></span></p>\r\n</blockquote>\r\n\r\n<p><span color:=\"\" courier=\"\" font-size:=\"\" style=\"box-sizing: inherit; font-family: Consolas, \"><span style=\"box-sizing: inherit; color: mediumblue;\">silahkan coba</span></span></p>\r\n', 'HTML,table', 'rambu', 'Y', '2018-07-19 08:26:24', 1, 4, 1),
(11, 'Membuat Login Pake CI', 'Tanya', '<p>Cara&nbsp;Membuat Login Pake CI gmana ya??&nbsp;</p>\r\n\r\n<p>please help</p>\r\n', 'CI,web,php', 'anarqi', 'Y', '2018-07-18 08:30:36', 1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(3) NOT NULL,
  `nama_tipe` varchar(20) NOT NULL,
  `desc_tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `nama_tipe`, `desc_tipe`) VALUES
(11, 'Tanya', 'Pertanyaan'),
(12, 'Info', 'Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `usn` varchar(15) NOT NULL,
  `pass` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `bio` text NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `tgl_terdaftar` datetime NOT NULL,
  `logged_in` enum('TRUE','FALSE') NOT NULL,
  `t_login` datetime NOT NULL,
  `t_logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `usn`, `pass`, `nama`, `email`, `bio`, `level`, `tgl_terdaftar`, `logged_in`, `t_login`, `t_logout`) VALUES
(5, 'rambu', 'cmFtYnU=', 'rambu anarqi', 'ganarqiz@gmail.com', 'Image Processing Research, Game Dev, Unity user', 'user', '2018-06-11 03:16:13', 'FALSE', '2018-07-19 08:22:13', '2018-07-19 08:25:15'),
(22, 'anonymous', '', '', '', '', 'user', '2018-07-12 07:23:28', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'anarqi', 'MTIz', 'Anarqi Galang', 'anar@gmail.com', 'Game Dev, Belajar, masih newbie', 'user', '2018-07-19 05:36:19', 'TRUE', '2018-07-21 20:12:25', '2018-07-20 10:41:22'),
(29, 'galang', 'Z2FsYW5n', 'Galang Rambu Aarqi', 'galang@gmail.com', 'Sedang Belajar WEB', 'admin', '2018-07-19 05:57:50', 'FALSE', '2018-07-21 20:10:41', '2018-07-21 20:11:35'),
(30, 'ganarqiz', 'Z2FuYXJxaXo=', 'galang Anarqi', 'ganarqii@gmal.com', 'Newbie, pemula web design', 'user', '2018-07-19 06:17:20', 'FALSE', '2018-07-19 06:18:14', '2018-07-19 07:44:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_ibfk_1` (`id_konten`),
  ADD KEY `komentar_ibfk_2` (`nama`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`idkonten`),
  ADD KEY `KOMENUSN` (`pembuat`),
  ADD KEY `tipe` (`tipe`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`),
  ADD KEY `nama_tipe` (`nama_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `usn` (`usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `tag_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `idkonten` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_konten`) REFERENCES `konten` (`idkonten`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `user` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `USN` FOREIGN KEY (`pembuat`) REFERENCES `user` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`tipe`) REFERENCES `tipe` (`nama_tipe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
