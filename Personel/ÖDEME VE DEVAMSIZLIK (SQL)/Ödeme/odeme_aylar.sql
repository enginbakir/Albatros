-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Haz 2018, 01:08:29
-- Sunucu sürümü: 5.7.18-log
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `albatros`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_aylar`
--

CREATE TABLE `odeme_aylar` (
  `id` int(11) NOT NULL,
  `aylar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odeme_aylar`
--

INSERT INTO `odeme_aylar` (`id`, `aylar`) VALUES
(1, 'OCAK'),
(2, 'ŞUBAT'),
(3, 'MART'),
(4, 'NİSAN'),
(5, 'MAYIS'),
(6, 'HAZİRAN'),
(7, 'TEMMUZ'),
(8, 'AĞUSTOS'),
(9, 'EYLÜL'),
(10, 'EKİM'),
(11, 'KASIM'),
(12, 'ARALIK');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `odeme_aylar`
--
ALTER TABLE `odeme_aylar`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
