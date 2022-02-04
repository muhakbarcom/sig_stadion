-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 07:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_stadion`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_stadion`
--

CREATE TABLE `data_stadion` (
  `id_stadion` int(8) NOT NULL,
  `nama_stadion` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `arsitek` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `url_gambar` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_stadion`
--

INSERT INTO `data_stadion` (`id_stadion`, `nama_stadion`, `kapasitas`, `pemilik`, `arsitek`, `alamat`, `url_gambar`, `provinsi`, `latitude`, `longitude`) VALUES
(1, 'Stadion Utama Gelora Bung Karno', 77193, 'Pemerintah Indonesia', 'Friedrich Silaban', 'Jl. Pintu Satu Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'https://i.ytimg.com/vi/45CQ4zBk1Ks/maxresdefault.jpg', 'DKI Jakarta', '-6.2185648', '106.7996082'),
(2, 'Stadion Si Jalak Harupat', 30000, 'Persib Bandung', 'Umuh Muchtar', 'Soreang Simpang Selegong Muara, Kopo, Kec. Kutawaringin, Kabupaten Bandung, Jawa Barat 40911', 'https://asset.kompas.com/crops/LWTVhon0RCopVyheSzRQhB7AGHw=/0x0:940x627/750x500/data/photo/2019/10/30/5db94315c58a7.jpg', 'Jawa Barat', '-6.9965893', '107.5296501'),
(5, 'Jakarta International Stadium (JIS)', 82000, 'Pemprov DKI Jakarta', 'Tiyok Prasetyoadi', 'VVF6+W4V, RT.1/RW.12, Papanggo, Tanjung Priok, North Jakarta City, Jakarta', 'https://thumb.viva.co.id/media/frontend/thumbs3/2021/11/10/618b20d2d958c-stadion-jakarta-international-stadium_665_374.jpg', 'DKI Jakarta', '-6.1249373', '106.8596779'),
(6, 'Stadion Kapten I Wayan Dipta Gianyar', 23000, 'Pemerintah Kabupaten Gianyar', '-', 'Buruan, Blahbatuh, Gianyar Regency, Bali 80581', 'https://asset.kompas.com/crops/44xvrm_2aZKjKJigytCN0Qr8Q74=/0x16:940x643/750x500/data/photo/2019/10/30/5db94324c6630.jpg', 'Bali', '-8.5468082', '115.3065482'),
(7, 'Stadion Maguwoharjo', 31700, 'Pemerintah Kabupaten Sleman', '-', 'Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'https://www.myjogja.id/gambar/place/place-stadion-maguwoharjo-14-l.jpg', 'PEMKAB Sleman', '-7.7505602', '110.4159943');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_stadion`
--
ALTER TABLE `data_stadion`
  ADD PRIMARY KEY (`id_stadion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_stadion`
--
ALTER TABLE `data_stadion`
  MODIFY `id_stadion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
