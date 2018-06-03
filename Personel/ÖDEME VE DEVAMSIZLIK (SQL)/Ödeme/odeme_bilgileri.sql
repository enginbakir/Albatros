-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Haz 2018, 01:08:37
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
-- Tablo için tablo yapısı `odeme_bilgileri`
--

CREATE TABLE `odeme_bilgileri` (
  `id_o` int(11) NOT NULL,
  `bilgiler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `odeme_bilgileri`
--

INSERT INTO `odeme_bilgileri` (`id_o`, `bilgiler`) VALUES
(1, 'Ödendi'),
(2, 'Ödenmedi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `odeme_bilgileri`
--
ALTER TABLE `odeme_bilgileri`
  ADD PRIMARY KEY (`id_o`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
