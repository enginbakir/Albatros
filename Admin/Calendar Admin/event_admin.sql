-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2018, 16:19:29
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
-- Tablo için tablo yapısı `event_admin`
--

CREATE TABLE `event_admin` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `admin_FK` int(11) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `event_admin`
--

INSERT INTO `event_admin` (`id`, `title`, `admin_FK`, `color`, `start`, `end`) VALUES
(1, 'İftar Yemeği', 1, '#40E0D0', '2018-06-04 00:00:00', '0000-00-00 00:00:00'),
(2, 'Yıldönümü', 1, '#FF0000', '2018-06-07 00:00:00', '2016-01-10 00:00:00'),
(3, 'Kontrol', 1, '#0071c5', '2018-06-09 16:00:00', '0000-00-00 00:00:00'),
(4, 'Konferans', 1, '#40E0D0', '2018-06-11 00:00:00', '2018-06-13 00:00:00'),
(5, 'DERNEK TOPLANTISI', 1, '#000', '2018-06-12 10:30:00', '2018-06-12 12:30:00'),
(6, 'Öğle Yemegi', 1, '#0071c5', '2018-06-19 12:00:00', '0000-00-00 00:00:00'),
(7, 'TOPLANTI', 1, '#0071c5', '2018-06-12 17:30:00', '0000-00-00 00:00:00'),
(8, 'Akşam Yemeği', 1, '#0071c5', '2018-06-12 20:00:00', '0000-00-00 00:00:00'),
(9, 'Doğum Günü Partisi', 1, '#FFD700', '2018-06-14 07:00:00', '2018-06-14 07:00:00'),
(10, 'Seyahat', 1, '#008000', '2018-06-28 00:00:00', '0000-00-00 00:00:00'),
(11, 'Hastane Kontrolü', 1, '#FF0000', '2018-06-21 00:00:00', '2018-06-22 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `event_admin`
--
ALTER TABLE `event_admin`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `event_admin`
--
ALTER TABLE `event_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
