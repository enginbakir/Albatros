-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 May 2018, 13:28:02
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
  `id_aylar` int(11) NOT NULL,
  `aylar` varchar(255) NOT NULL,
  `ödeme` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odeme_bilgileri`
--

INSERT INTO `odeme_bilgileri` (`id_aylar`, `aylar`, `ödeme`, `student_FK`) VALUES
(1, 'OCAK', 1, 1),
(2, 'ŞUBAT', 1, 1),
(3, 'MART', 1, 1),
(4, 'NİSAN', 1, 1),
(5, 'MAYIS', 0, 1),
(6, 'HAZİRAN', 1, 1),
(7, 'TEMMUZ', 0, 1),
(8, 'AĞUSTOS', 1, 1),
(9, 'EYLÜL', 1, 1),
(10, 'EKİM', 1, 1),
(11, 'KASIM', 0, 1),
(12, 'ARALIK', 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `odeme_bilgileri`
--
ALTER TABLE `odeme_bilgileri`
  ADD PRIMARY KEY (`id_aylar`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `odeme_bilgileri`
--
ALTER TABLE `odeme_bilgileri`
  MODIFY `id_aylar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
