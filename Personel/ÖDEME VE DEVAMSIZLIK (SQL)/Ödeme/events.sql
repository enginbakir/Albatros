-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Haz 2018, 20:46:35
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
-- Tablo için tablo yapısı `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `title`, `student_FK`, `personel_FK`, `color`, `start`, `end`) VALUES
(19, 'Şeyma Yiğit - Okuma Yazma', 3, 2, '#FFD700', '2018-05-06 15:00:00', '2018-05-06 19:30:00'),
(26, 'Engin Bakır - Matematik', 2, 2, '#FF0000', '2018-05-03 13:00:00', '2018-05-03 13:00:00'),
(27, 'Merve Tunçel - Matematik', 1, 2, '#40E0D0', '2018-06-03 02:30:00', '2018-06-03 03:30:00'),
(29, 'Merve Tunçel - Matematik', 1, 2, '#40E0D0', '2018-05-03 09:00:00', '2018-05-03 11:00:00'),
(33, 'Merve Tunçel', 1, 2, '#008000', '2018-06-05 00:00:00', '2018-06-06 00:00:00'),
(40, 'Hatice Şeyma Yiğit', 3, 2, '#0071c5', '2018-05-28 00:00:00', '2018-05-29 00:00:00'),
(41, 'Engin Bakır', 2, 2, '#FF0000', '2018-06-11 00:00:00', '2018-06-12 00:00:00'),
(42, 'Hatice Şeyma Yiğit', 3, 2, '#FF8C00', '2018-06-12 00:00:00', '2018-06-13 00:00:00'),
(43, 'Hatice Şeyma Yiğit', 3, 23, '#0071c5', '2018-05-16 00:00:00', '2018-05-17 00:00:00'),
(44, 'Merve Tunçel', 1, 23, '#000', '2018-05-15 00:00:00', '2018-05-16 00:00:00'),
(45, 'Engin Bakır', 2, 23, '#000', '2018-05-17 00:00:00', '2018-05-18 00:00:00'),
(46, 'Hatice Şeyma Yiğit', 3, 23, '#0071c5', '2018-05-23 00:00:00', '2018-05-24 00:00:00'),
(47, 'Hatice Şeyma Yiğit', 3, 23, '#40E0D0', '2018-05-18 00:00:00', '2018-05-19 00:00:00'),
(48, 'Engin Bakır', 2, 23, '#0071c5', '2018-05-18 00:00:00', '2018-05-19 00:00:00'),
(49, 'Merve Tunçel', 1, 23, '#008000', '2018-05-24 00:00:00', '2018-05-25 00:00:00'),
(50, 'Engin Bakır', 2, 23, '#FF0000', '2018-05-16 00:00:00', '2018-05-17 00:00:00'),
(51, 'Engin Bakır', 2, 23, '#FFD700', '2018-05-13 00:00:00', '2018-05-14 00:00:00'),
(52, 'Hatice Şeyma Yiğit', 3, 2, '#FF8C00', '2018-05-21 00:00:00', '2018-05-22 00:00:00'),
(53, 'Merve Tunçel', 1, 2, '#0071c5', '2018-05-13 00:00:00', '2018-05-14 00:00:00'),
(54, 'Engin Bakır', 2, 2, '#0071c5', '2018-06-01 00:00:00', '2018-06-02 00:00:00'),
(55, 'Hatice Şeyma Yiğit', 3, 2, '#008000', '2018-06-01 00:00:00', '2018-06-02 00:00:00'),
(56, 'Merve Tunçel', 1, 2, '#FF0000', '2018-05-18 00:00:00', '2018-05-19 00:00:00'),
(57, 'Merve Tunçel', 1, 2, '#40E0D0', '2018-04-18 00:00:00', '2018-04-19 00:00:00'),
(58, 'Merve Tunçel', 1, 2, '#0071c5', '2018-04-30 00:00:00', '2018-05-01 00:00:00'),
(59, 'Hatice Şeyma Yiğit', 3, 2, '#FFD700', '2018-04-08 00:00:00', '2018-04-09 00:00:00'),
(60, 'Engin Bakır', 2, 2, '#FF8C00', '2018-04-19 00:00:00', '2018-04-20 00:00:00'),
(61, 'Engin Bakır', 2, 2, '#000', '2018-04-16 00:00:00', '2018-04-17 00:00:00'),
(62, 'Merve Tunçel', 1, 2, '#40E0D0', '2018-06-13 00:00:00', '2018-06-14 00:00:00'),
(63, 'Engin Bakır', 2, 2, '#FF0000', '2018-06-13 00:00:00', '2018-06-14 00:00:00'),
(64, 'Merve Tunçel', 1, 23, '#40E0D0', '2018-05-30 00:00:00', '2018-05-31 00:00:00'),
(65, 'Merve Tunçel', 1, 2, '#0071c5', '2018-06-06 00:00:00', '2018-06-07 00:00:00'),
(66, 'Merve Tunçel', 1, 2, '#40E0D0', '2018-06-07 00:00:00', '2018-06-08 00:00:00'),
(67, 'Engin Bakır', 2, 23, '#000', '2018-06-05 00:00:00', '2018-06-06 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `personel_FK` (`personel_FK`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`student_FK`) REFERENCES `student` (`student_PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`personel_FK`) REFERENCES `personel` (`personel_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
